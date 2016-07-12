<?php
/**
 * Enqueue style of child theme
 */
function snssimen_child_enqueue_styles() {
    wp_enqueue_style( 'snssimen-child-style', get_stylesheet_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'snssimen_child_enqueue_styles', 100000 );

@ini_set( 'upload_max_size' , '64M' );

@ini_set( 'post_max_size', '64M');

@ini_set( 'max_execution_time', '300' );
function wc_remove_related_products( $args ) {
	return array();
}
add_filter( 'woocommerce_related_products_args','wc_remove_related_products', 10 );
?>
