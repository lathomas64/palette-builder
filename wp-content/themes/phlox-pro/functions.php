<?php
/**
 *  Functions and definitions for auxin framework
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2021
 * @link       http://averta.net
 */

/*-----------------------------------------------------------------------------------*/
/*  Add your custom functions here -  We recommend you to use "code-snippets" plugin instead
/*  https://wordpress.org/plugins/code-snippets/
/*-----------------------------------------------------------------------------------*/

/*-----------------------------------------------------------------------------------*/
/*  Init theme framework
/*-----------------------------------------------------------------------------------*/
require( 'auxin/auxin-include/auxin.php' );
/*-----------------------------------------------------------------------------------*/
/*
 * This action hook allows to add a new empty column
 */
add_filter('manage_cpt_shadow_posts_columns', 'misha_featured_image_column');
function misha_featured_image_column( $column_array ) {

	// I want to add my column at the beginning, so I use array_slice()
	// in other cases $column_array['featured_image'] = 'Featured Image' will be enough
	$column_array = array_slice( $column_array, 0, 1, true )
	+ array('featured_image' => 'Featured Image') // our new column for featured images
	+ array_slice( $column_array, 1, NULL, true );
 
	return $column_array;
}
 
/*
 * This hook will fill our column with data
 */
add_action('manage_posts_custom_column', 'misha_render_the_column', 10, 2);
function misha_render_the_column( $column_name, $post_id ) {

	if( $column_name == 'featured_image' ) {

		// if there is no featured image for this post, print the placeholder
		if( has_post_thumbnail( $post_id ) ) {
			
			// I know about get_the_post_thumbnail() function but we need data-id attribute here
			$thumb_id = get_post_thumbnail_id( $post_id );
			echo '<img data-id="' . $thumb_id . '" src="' . wp_get_attachment_url( $thumb_id ) . '" />';
			
		} else {
			
			// data-id should be "-1" I will explain below
			echo '<img data-id="-1" src="' . get_stylesheet_directory_uri() . '/placeholder.png" />';
			
		}
		
	}

}
add_action( 'admin_head', 'misha_custom_css' );
function misha_custom_css(){

	echo '<style>
		#featured_image{
			width:40px;
		}
		td.featured_image.column-featured_image img{
			max-width: 100%;
			height: auto;
		}

		/* some styles to make Quick Edit meny beautiful */
		#misha_featured_image .title{margin-top:10px;display:block;}
		#misha_featured_image a.misha_upload_featured_image{
			display:inline-block;
			margin:10px 0 0;
		}
		#misha_featured_image img{
			display:block;
			max-width:200px !important;
			height:auto;
		}
		#misha_featured_image .misha_remove_featured_image{
			display:none;
		}
	</style>';

}