<?php
/**
 * Variable product add to cart
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $product;

$attribute_keys = array_keys( $attributes );

do_action( 'woocommerce_before_add_to_cart_form' ); ?>

<form class="variations_form cart cf" method="post" enctype='multipart/form-data' data-product_id="<?php echo absint( $product->id ); ?>" data-product_variations="<?php echo esc_attr( json_encode( $available_variations ) ) ?>">
	<?php do_action( 'woocommerce_before_variations_form' ); ?>
	<?php if ( empty( $available_variations ) && false !== $available_variations ) : ?>
		<p class="stock out-of-stock"><?php _e( 'This product is currently out of stock and unavailable.', 'bronx' ); ?></p>
	<?php else : ?>
	<div class="small-12 medium-10 medium-centered large-8 columns">
		<div class="variations">
			<?php $loop = 0; foreach ( $attributes as $attribute_name => $options ) : $loop++; ?>
					<div class="select-wrapper">
						<?php
								$selected = isset( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) ? wc_clean( $_REQUEST[ 'attribute_' . sanitize_title( $attribute_name ) ] ) : $product->get_variation_default_attribute( $attribute_name );
								wc_dropdown_variation_attribute_options( array( 'options' => $options, 'attribute' => $attribute_name, 'product' => $product, 'selected' => $selected ) );
							?>
				</div>
	  	<?php endforeach;?>
		</div>	
		
		
		<?php do_action('woocommerce_before_add_to_cart_button'); ?>
		<div class="single_variation_wrap">
	
			<?php do_action( 'woocommerce_before_single_variation' ); ?>
			<?php do_action( 'woocommerce_single_variation' ); ?>
			<?php do_action( 'woocommerce_after_single_variation' ); ?>
		</div>
		<?php do_action( 'woocommerce_after_add_to_cart_button' ); ?>
		
	</div>
	<?php endif; ?>

</form>

<?php do_action('woocommerce_after_add_to_cart_form'); ?>