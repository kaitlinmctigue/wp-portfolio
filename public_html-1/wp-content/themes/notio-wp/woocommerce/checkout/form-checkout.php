<?php
/**
 * Checkout Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

wc_print_notices();

// If checkout registration is disabled and not logged in, the user cannot checkout
if ( ! $checkout->enable_signup && ! $checkout->enable_guest_checkout && ! is_user_logged_in() ) {
	echo apply_filters( 'woocommerce_checkout_must_be_logged_in_message', __( 'You must be logged in to checkout.', 'woocommerce' ) );
	return;
}

// filter hook for include new pages inside the payment method
$get_checkout_url = apply_filters( 'woocommerce_get_checkout_url', WC()->cart->get_checkout_url() ); ?>

<section class="my_woocommerce_page my_checkout">
	<div class="row no-padding">
		<div class="small-12 columns">
			<?php do_action( 'woocommerce_before_checkout_form', $checkout ); ?>
		</div>
	</div>
	<form name="checkout" method="post" class="checkout" action="<?php echo esc_url( $get_checkout_url ); ?>" enctype="multipart/form-data">
		<div class="row no-padding">
			<div class="small-12 medium-8 columns billing_shipping">
				<?php if ( sizeof( $checkout->checkout_fields ) > 0 ) : ?>
					<?php do_action( 'woocommerce_checkout_before_customer_details'); ?>
					<?php do_action( 'woocommerce_checkout_billing'); ?>
					<?php do_action( 'woocommerce_checkout_shipping'); ?>
					<?php do_action( 'woocommerce_checkout_after_customer_details'); ?>
				<?php endif; ?>
			</div>
			<div class="small-12 medium-4 columns your-order">
				<section class="section woocommerce-checkout-review-order" id="order_review">
					<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>
					<?php do_action('woocommerce_checkout_order_review'); ?>
					<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>
				</section>
			</div>
		</div>
	</form>
	
	<?php do_action( 'woocommerce_after_checkout_form', $checkout ); ?>
</section>