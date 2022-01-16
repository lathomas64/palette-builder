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

function pb_merge_terms($term_list, $taxonomy)
{
	$terms = [];
	foreach($term_list as $term) {
		$slugs = pb_search_term($term, $taxonomy);
		$terms = array_merge($terms, $slugs);
	}
	return $terms;
}
print_r(json_encode($_REQUEST));

//pb_filter();
$terms = pb_search_term('warm', 'tax_color_tag');
print_r($terms);
$terms2 = or_terms(array('08 Pink', '06 Indigo'), 'tax_color_tag');
print_r($terms2);

$filtered_terms = array_intersect($terms, $terms2);
print_r("\n<br><hr>");
$args = [
"post_type" => "cpt_shadow",
"post_status" => "publish",
"posts_per_page" => -1,
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

$subquery = array(
	'taxonomy' => 'tax_color_tag',
	'field' => 'slug',
	'terms' => $filtered_terms
	//'s' => 'warm'
);
$args['tax_query'][] = $subquery;
$filtered_shadows = [];
$shadows = new WP_Query($args);
$filtered_shadows = wp_list_pluck($shadows->posts, "post_title");

$result = json_encode($filtered_shadows);
echo $result;

?>
<hr>
and thats the end...
