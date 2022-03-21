<?php
    function pb_search_term($query, $taxonomy)
    {
      $terms = get_terms(
        array(
          'taxonomy' => $taxonomy,
          'name__like' => $query
        )
      );
      $slugs = wp_list_pluck($terms, 'slug');
      return $slugs;
    }

    

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
          $args = [
          "post_type" => "cpt_shadow",
          "post_status" => "publish",
          "posts_per_page" => 20,
          "paged" => $filters["page"],
          "orderby" => "title",
          "order" => "ASC",
          "cat" => "home",
          "tax_query" => array(
            'relation' => 'AND'
          ),
          'meta_query' => array(
            'relation' => 'AND'
          )
          ];
          if(array_key_exists('colors', $filters)){
            //color filter stuff will go here;
            $subquery = array(
              'taxonomy' => 'tax_color_family',
              'field' => 'name',
              'terms' => $filters['colors']
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('temperature', $filters)){
            /*
              if no colors set or neutral is set, get all color_tags with temperature in them.
              slug like temperature
              if colors are set, get all color tags with temperature AND color in them.
              slug like temperature AND name like colors
            */
            //color filter stuff will go here;
            // $subquery = array(
            //   'taxonomy' => 'tax_color_tag',
            //   'field' => 'slug',
            //   'terms' => $filters['temperature']
            // );
            // TODO check if this handles the neutral case
            $temp_terms = pb_merge_terms($filters['temperature'], 'tax_color_tag');
            if(array_key_exists('colors', $filters))
            {
              $color_terms = pb_merge_terms($filters['colors'], 'tax_color_tag');
              $terms = array_intersect($temp_terms, $color_terms);
            }
            else {
              $terms = $temp_terms;
            }

            $subquery = array(
              'taxonomy' => 'tax_color_tag',
              'field' => 'slug',
              'terms' => $terms
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('vividness', $filters)){
            //color filter stuff will go here;
            $subquery = array(
              'taxonomy' => 'tax_vividness',
              'field' => 'slug',
              'terms' => $filters['vividness']
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('lightness', $filters)){
            //color filter stuff will go here;
            $subquery = array(
              'taxonomy' => 'tax_lightness',
              'field' => 'slug',
              'terms' => $filters['lightness']
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('shift', $filters)){
            //color filter stuff will go here;
            $subquery = array(
              'taxonomy' => 'tax_shift',
              'field' => 'name',
              'terms' => $filters['shift']
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('size', $filters)){
            //color filter stuff will go here;
            $subquery = array(
              'taxonomy' => 'pan-width',
              'field' => 'slug',
              'terms' => $filters['size']
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('shape', $filters)){
            //color filter stuff will go here;
            $subquery = array(
              'taxonomy' => 'pan-shape',
              'field' => 'slug',
              'terms' => $filters['shape']
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('demographics', $filters)){
            $brand_args = [
            "post_type" => "cpt_brand",
            "post_status" => "publish",
            "posts_per_page" => -1,
            "orderby" => "title",
            "order" => "ASC",
            "cat" => "home",
            "tax_query" => array(
              'relation' => 'AND',
              array(
                'taxonomy' => 'tax_demographics',
                'field' => 'slug',
                'terms' => $filters['demographics']
              )
            )
            ];
            $brands = new WP_Query($brand_args);
            $brand_shadows = wp_list_pluck($brands->posts, "shadows");
            $shadows = array();
            foreach($brand_shadows as $shadow_list)
            {
              if(gettype($shadow_list) == "array"){
              	$merge = array_merge($shadows, $shadow_list);
              	$shadows = $merge;
              }
            }
            $shadows = array_unique($shadows);
            if($shadows == null)
            {
              echo "[]";
              die();
            }
            // TODO make this work with multiple values trying to do this.
            if(array_key_exists("post__in", $args)){
              $args["post__in"] = array_intersect($args["post__in"], $shadows);
            } else {
                $args["post__in"] = $shadows;
            }
          }
          //brands should be ids of brands
          if(array_key_exists('brand', $filters)){
            $brand_args = [
            "post_type" => "cpt_brand",
            "post_status" => "publish",
            "posts_per_page" => -1,
            "orderby" => "title",
            "order" => "ASC",
            "cat" => "home",
            "post__in" => $filters['brand'],
            ];
            $brands = new WP_Query($brand_args);
            $brand_shadows = wp_list_pluck($brands->posts, "shadows");
            $shadows = array();
            foreach($brand_shadows as $shadow_list)
            {
              if(gettype($shadow_list) == "array"){
              	$merge = array_merge($shadows, $shadow_list);
              	$shadows = $merge;
              }
            }
            $shadows = array_unique($shadows);
            if($shadows == null)
            {
              echo "[]";
              die();
            }
            // TODO make this work with multiple values trying to do this.
            if(array_key_exists("post__in", $args)){
              $args["post__in"] = array_intersect($args["post__in"], $shadows);
            } else {
                $args["post__in"] = $shadows;
            }
          }
          if(array_key_exists('shipping_country', $filters)){
            if(!in_array('worldwide', $filters['shipping_country'])){
              array_push($filters['shipping_country'], 'worldwide');
            }
            //TODO I don't think this one will work how do we get around this?
            $brand_args = [
            "post_type" => "cpt_brand",
            "post_status" => "publish",
            "posts_per_page" => -1,
            "orderby" => "title",
            "order" => "ASC",
            "cat" => "home",
            "tax_query" => array(
              'relation' => 'AND',
              array(
                'taxonomy' => 'tax_shipping',
                'field' => 'slug',
                'terms' => array_map('urldecode', $filters['shipping_country'])
              )
            )
            ];
            $brands = new WP_Query($brand_args);
            $brand_ids = wp_list_pluck($brands->posts, "ID");
            //print_r($brand_ids);
            //die();
            $brand_shadows = wp_list_pluck($brands->posts, "shadows");
            $shadows = array();
            foreach($brand_shadows as $shadow_list)
            {
              if(gettype($shadow_list) == "array"){
              	$merge = array_merge($shadows, $shadow_list);
              	$shadows = $merge;
              }
            }
            $shadows = array_unique($shadows);
            if($shadows == null)
            {
              echo "[]";
              die();
            }
            //print_r($shadows);
            //die();
            // TODO make this work with multiple values trying to do this.
            if(array_key_exists("post__in", $args)){
              $args["post__in"] = array_intersect($args["post__in"], $shadows);
            } else {
                $args["post__in"] = $shadows;
            }
          }
          if(array_key_exists('finishes', $filters)){
            //color filter stuff will go here;
            $subquery = array(
              'taxonomy' => 'tax_finish',
              'field' => 'name',
              'terms' => $filters['finishes']
            );
            $args['tax_query'][] = $subquery;
          }
          if(array_key_exists('characteristics', $filters)){
            $brand_args = [
            "post_type" => "cpt_brand",
            "post_status" => "publish",
            "posts_per_page" => -1,
            "orderby" => "title",
            "order" => "ASC",
            "cat" => "home",
            "tax_query" => array(
              'relation' => 'AND'
            )
            ];
            // Doing this to AND instead of OR
            foreach($filters['characteristics'] as $slug)
            {
              $characteristic = array(
                'taxonomy' => 'tax_brand_characteristic',
                'field' => 'slug',
                'terms' => $slug
              );
              $brand_args["tax_query"][] = $characteristic;
            }
            $brands = new WP_Query($brand_args);
            $brand_shadows = wp_list_pluck($brands->posts, "shadows");
            $shadows = array();
            foreach($brand_shadows as $shadow_list)
            {
              if(gettype($shadow_list) == "array"){
              	$merge = array_merge($shadows, $shadow_list);
              	$shadows = $merge;
              }
            }
            $shadows = array_unique($shadows);
            if($shadows == null)
            {
              echo "[]";
              die();
            }
            // TODO make this work with multiple values trying to do this.
            if(array_key_exists("post__in", $args)){
              $args["post__in"] = array_intersect($args["post__in"], $shadows);
            } else {
                $args["post__in"] = $shadows;
            }

          }
          if($filters['price_min'] != -1){
            $subquery = array(
              'key' => 'price',
              'value' => (int) $filters['price_min'],
              'compare' => '>='
            );
            $args['meta_query'][] = $subquery;
          }
          if($filters['price_max'] != -1){
            $subquery = array(
              'key' => 'price',
              'value' => (int) $filters['price_max'],
              'compare' => '<='
            );
            $args['meta_query'][] = $subquery;
          }
          $filtered_shadows = [];
          $shadows = new WP_Query($args);
          $filtered_shadows = wp_list_pluck($shadows->posts, "ID");

          $result = json_encode($filtered_shadows);
          echo $result;
        }
        die();
    }
?>
