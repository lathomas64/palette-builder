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
print('begin');

$args = [
"post_type" => "cpt_shadow",
"post_status" => "publish",
"posts_per_page" => 20,
"orderby" => "title",
"order" => "ASC",
"cat" => "home",
"tax_query" => array(
	'relation' => 'OR'
),
'meta_query' => array(
	'relation' => 'AND'
)
];
$terms = pb_merge_terms(explode(",",'warm'), 'tax_color_tag');
print_r($terms);
echo "<br><br>";
$args['tax_query'][] = array(
		'taxonomy' => 'tax_color_tag',
		'field' => 'slug',
		'terms' => $terms
);

print_r($args);
echo "<br><br>";
$shadows = new WP_Query($args);
while($shadows->have_posts())
{
	$shadows->the_post();
	echo "name:";
	echo the_title();
	echo "<br>price:";
	echo get_field('price');
	echo "<br>--<br><br>";
}
?>
<hr>
and thats the end...
