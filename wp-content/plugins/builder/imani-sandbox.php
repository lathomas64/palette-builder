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
print_r(json_encode($_REQUEST));
//pb_filter();
$brand_ids = array(7088,7093,7094,7095,7096,7104);
$args = [
"post_type" => "cpt_shadow",
"orderby" => "title",
"order" => "ASC",
'meta_query' => array(
	'relation' => 'AND',
	array(
		'key' => 'brand',
		'value' => $brand_ids,
		'compare' => '='
	)
)
];

$shadows = new WP_Query($args);
print_r($shadows);
$filtered_shadows = wp_list_pluck($shadows->posts, "post_title");

$result = json_encode($filtered_shadows);
print_r($brand_ids);
echo $result;
?>
<hr>
and thats the end...
