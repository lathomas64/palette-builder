<h1>just a page to try out php things on the server</h1>
<?php
if ( ! defined('ABSPATH') ) {
    /** Set up WordPress environment */
    require_once( '/usr/share/wordpress/wp-load.php' );
}
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
wp_enqueue_script('jquery');
$args = [
	"post_type" => "cpt_shadow",
	"post_status" => "publish",
	"posts_per_page" => -1,
	"orderby" => "title",
	"order" => "ASC",
	"cat" => "home",
];

$shadows = new WP_Query($args);
$shadows->the_post();

$the_tax = get_the_taxonomies(0, array('term_template' => '%1$s'));
$series = $the_tax['tax_series'];
$explode = explode("=", $series);
$slug = $explode[1];
$series = substr($slug, 0,-1);

$details = get_terms('tax_series', array('slug'=>$series));
$shape = get_field('shape', $details[0]);
?>
<hr>
and thats the end...
