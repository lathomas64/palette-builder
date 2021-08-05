<?php
    function hex_to_hsl($color){
        $r = intval(substr($color, 1,2), 16);
        $g = intval(substr($color, 3,2), 16);
        $b = intval(substr($color, 5,2), 16);
        return rgb_to_hsl($r, $g, $b);
    }

    function rgb_to_hsl($r, $g, $b){
        $r /= 255;
        $g /= 255;
        $b /= 255;
        $max = max($r,$g,$b);
        $min = min($r,$g,$b);
        $h = $s = $l = ($max+$min)/2;
        if($max == $min){
            $h = $s = 0;
        }
        else {
            $d = $max - $min;
            $s = $l > 0.5 ? $d / (2 - $max - $min) : $d / ($max + $min);
            switch($max){
                case $r: 
                    $h = ($g - $b) / $d + ($g < $b ? 6: 0);
                    break;
                case $g:
                    $h = ($b - $r) / $d + 2;
                    break;
                case $b:
                    $h = ($r - $g) / $d + 4;
                    break;
            }
            $h /= 6;
        }
        $s = $s * 100;
        $s = round($s);
        $l = $l * 100;
        $l = round($l);
        $h = round(360 * $h);
        $result = ['h'=>$h, 's'=>$s, 'l'=>$l];
        return $result;
    }

    function filter_red($colors){
        if($colors){
            foreach ($colors as $color){
                $hsl = hex_to_hsl($color);
                if ($hsl['h'] < 15 or $hsl['h'] > 345){
                    return true;
                }
            }
        }
        return false;
    }

    function filter_orange($colors){
        if($colors){
            foreach ($colors as $color){
                $hsl = hex_to_hsl($color);
                if (20 < $hsl['h'] and $hsl['h'] < 40){
                    return true;
                }
            }
        }
        return false;
    }

    function filter_yellow($colors){
        if($colors){
            foreach ($colors as $color){
                $hsl = hex_to_hsl($color);
                if (40 < $hsl['h'] and $hsl['h'] < 60){
                    return true;
                }
            }
        }
        return false;
    }

    function filter_color($colors, $filters) {
        //echo 'filter_color reached';
        foreach ($filters as $filter) {
            $func = 'filter_' . strtolower($filter);
            if($func($colors)) {
                return True;
            }
        }
        return False;
    }

    function pb_filter()
    {
        if ( isset($_REQUEST) ) {
            $filters = $_REQUEST;
            $flatten_filters = json_encode($filters);
            $cache_file = plugin_dir_path(__FILE__)."cache/".hash('md5', $flatten_filters).".html";
            if (file_exists($cache_file) && (filemtime($cache_file) > (time() - 86400 ))) {
                $file = file_get_contents($cache_file); // Get the file from the cache.
                echo $file; // echo the file out to the browser.
            } else {
                $args = [
                "post_type" => "cpt_shadow",
                "post_status" => "publish",
                "posts_per_page" => -1,
                "orderby" => "title",
                "order" => "ASC",
                "cat" => "home",
                ];
                $filtered_shadows = [];
                $shadows = new WP_Query($args);
                
                $filtered_shadows = [];
                $shadows = new WP_Query($args);
                while ($shadows->have_posts()):
                    $shadows->the_post();
                    $shadow_id = get_the_ID();
                    if ( array_key_exists('colors',$filters)) {
                        $colors = get_field("colors");
                        if(!filter_color($colors, $filters['colors'])) {
                            //If we don't match on color filter skip to the next shadow
                            continue;
                        }
                    }
                    array_push($filtered_shadows, $shadow_id);
                endwhile;
                $result = json_encode($filtered_shadows);
                file_put_contents($cache_file, $result, LOCK_EX);
                echo $result;
            }
        }
        die();
    }
?>