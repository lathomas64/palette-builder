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
"post_type" => "cpt_story",
'author' => $current_user->ID,
"post_status" => "publish",
"posts_per_page" => -1,
"orderby" => "title",
"order" => "ASC",
];
print_r($args);
echo "<br>";
$user = wp_get_current_user();
print_r($user);
echo "<br>";
print_r($current_user);

$story_query = new WP_Query($args);
$stories = extract_stories($story_query);

$result = json_encode($stories);
echo $result;
?>
<hr>
and thats the end...
