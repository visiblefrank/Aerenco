<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php
	/**
	 * woocommerce_before_single_product hook
	 *
	 * @hooked wc_print_notices - 10
	 */
	 do_action( 'woocommerce_before_single_product' );

	 if ( post_password_required() ) {
	 	echo get_the_password_form();
	 	return;
	 }
?>

<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="primary_block row clearfix">
		<div class="entry-img col-md-3 col-sm-6">
			<div class="inner">
		<?php
			/**
			 * woocommerce_before_single_product_summary hook
			 *
			 * @hooked woocommerce_show_product_sale_flash - 10
			 * @hooked woocommerce_show_product_images - 20
			 */
			do_action( 'woocommerce_before_single_product_summary' );
		?>
			</div>
		</div>
		<div class="summary entry-summary col-md-9 col-sm-6">

			<?php
				/**
				 * woocommerce_single_product_summary hook
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 */
				remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
				add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 6);
				do_action( 'woocommerce_single_product_summary' );
			?>

		</div><!-- .summary -->
	</div> <!-- /.primary_block -->
	<div class="second_block row clearfix">
		<?php 
		$col_tab_products_block = 12;
		$col_prod_sidebar = 0;
		
		if ( is_active_sidebar( 'product-sidebar' ) ) :
			$col_tab_products_block = 9;
			$col_prod_sidebar = 3;
		endif;
		
		?>

		<div class="sns_tab_products_block col-md-<?php echo $col_tab_products_block; ?> col-md-push-<?php echo $col_prod_sidebar; ?> col-sm-12">
			<?php
				/**
				 * woocommerce_after_single_product_summary hook
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
				//remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
				remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
				do_action( 'woocommerce_after_single_product_summary' );
			?>
	
			<meta itemprop="url" content="<?php the_permalink(); ?>" />
		</div>

		<?php if( $col_prod_sidebar > 0): ?>
		<div id="sns-product-sidebar" class="minner-sidebar col-md-<?php echo $col_prod_sidebar; ?> col-md-pull-<?php echo $col_tab_products_block; ?> col-sm-12">
			<?php dynamic_sidebar( 'product-sidebar' ); ?>
		</div>
		<?php endif; ?>

	</div> <!--  second_block -->
</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>
