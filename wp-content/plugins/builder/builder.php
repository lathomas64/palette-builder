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

function build_builder_redirect()
{
    add_rewrite_rule( 'builder.php$', 'wp-content/plugins/builder/src/index.php', 'top' );
}