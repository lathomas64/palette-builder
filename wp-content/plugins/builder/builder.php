<?php /**
 * Plugin Name:       Firedrake Beauty Labs Palette Builder
 * Description:       Palette Builder created by Firedrake Beauty Labs
 * Version:           0.1.0
 * Plugin URI:  https://pb.rainbowcapitalism.com
 * Author:            Imani Thomas
 * Author URI:  https://rainbowcapitalism.com
 */
 remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
add_action('init', 'build_builder_redirect');
add_action('wp_ajax_palette_builder_filter', 'pb_filter');
add_action('wp_ajax_nopriv_palette_builder_filter', 'pb_filter');
add_action('wp_ajax_user_stories', 'user_stories');
add_action('wp_ajax_community_stories', 'community_stories');
add_action('wp_ajax_nopriv_community_stories', 'community_stories');
add_action('wp_ajax_save_story', 'save_story');
add_action('wp_ajax_delete_story', 'delete_story');

function build_builder_redirect()
{
    add_rewrite_rule( 'builder.php$', 'wp-content/plugins/builder/src/index.php', 'top' );
}

include 'src/actions/filters.php';
include 'src/actions/stories.php';

?>
