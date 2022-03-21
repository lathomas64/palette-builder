<h1>just a page to try out php things on the server</h1>
<?php
ini_set("display_errors", "1");
ini_set("display_startup_errors", "1");
error_reporting(E_ALL);
$brand_list = array();
if (!defined("ABSPATH")) {
	/** Set up WordPress environment */
	require_once "/usr/share/wordpress/wp-load.php";
}
$brand = 20855;
$brand_args = [
"post_type" => "cpt_brand",
"post_status" => "publish",
"posts_per_page" => -1,
"orderby" => "title",
"order" => "ASC",
"cat" => "home",
"post__in" => [$brand],
];
print_r($brand_args);
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
print_r($shadows);

$filtered_shadows = wp_list_pluck($shadows->posts, "brand");
print('filtered shadows made.');
print_r($filtered_shadows);
print("<br>\n---<br>\n");
?>
<hr>
and thats the end...
