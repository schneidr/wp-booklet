<?php
/*
Plugin Name: WP Booklet
Plugin URI: http://schneidr.de
Description: blah, blah
Author: Gerald Schneider
Version: 0.1
Author URI: http://schneidr.de/
*/

function wp_booklet_load_scripts() {
	wp_enqueue_script( 'jquery-ui-core' );
	wp_enqueue_script( 'jquery-easing',
		plugins_url( 'jquery.easing.1.3.js', __FILE__ ),
		array( 'jquery-ui-core', 'jquery-ui-draggable' )
	);
	wp_enqueue_script( 'jquery-booklet',
		plugins_url( 'jquery.booklet.1.4.0.min.js', __FILE__ ),
		array( 'jquery-easing' )
	);
	wp_register_style( 'booklet-style', plugins_url('jquery.booklet.1.4.0.css', __FILE__) );
	wp_enqueue_style( 'booklet-style' );
}
add_action( 'wp_enqueue_scripts', 'wp_booklet_load_scripts' );

function wp_booklet_shortcode( $atts, $content = null ) {
	global $wp_booklet_settings;
	$wp_booklet_settings = shortcode_atts( array(
		'id' => 'booklet',
		'dir' => null,
		'closed' => false
	) , $atts );
	extract( $wp_booklet_settings );

	$return = "<div id=\"${id}\">";
	if ( $dir !== null ) {
		$basedir = realpath( ABSPATH . '/' . $dir );
		$baseurl = get_bloginfo('wpurl') . '/' . $dir;
		$files = glob("$basedir/*.jpg");
		sort($files);
		foreach ($files as $file) {
			$return .= "<div>";
			$return .= "<img src=\"".$baseurl."/".basename($file)."\" />";
			$return .= "</div>";
		}
	}
	else if ( $content !== null ) {
		$return .= strip_tags( $content, "<img><div>" );
	}
	$return .= "</div>";

	add_action('wp_footer', 'wp_booklet_footer');

	return $return;
}
add_shortcode( 'booklet', 'wp_booklet_shortcode' );


function wp_booklet_footer() {
	global $wp_booklet_settings;
    echo "<script type=\"text/javascript\">
    jQuery(function() {
    jQuery('#${wp_booklet_settings['id']}').booklet({
        closed: ${wp_booklet_settings['closed']}
    });
	});
	</script>";
}
?>