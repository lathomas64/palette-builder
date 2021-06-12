<?php
/**
 * Plugin Name: Tweak HTML Edit
 * Description: Just some tweaks to make editing easier for me 
 * Plugin URI:  https://example.com
 * Author:      Imani
 * Author URI:  https://example.com
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );