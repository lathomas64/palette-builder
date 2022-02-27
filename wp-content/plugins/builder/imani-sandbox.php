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
$args = [
"post_type" => "cpt_shadow",
"post_status" => "publish",
"posts_per_page" => 10,
"orderby" => $_GET['orderby'],
"order" => "DESC",
"cat" => "home",
"meta_key" => "price",
"tax_query" => array(
	'relation' => 'AND'
),
'meta_query' => array(
	'relation' => 'AND'
)
];


$shadows = new WP_Query($args);
$filtered_shadows = wp_list_pluck($shadows->posts, "ID");
print_r($filtered_shadows);
print("\n---\n");
print_r($_GET);
?>
<hr>
and thats the end...
