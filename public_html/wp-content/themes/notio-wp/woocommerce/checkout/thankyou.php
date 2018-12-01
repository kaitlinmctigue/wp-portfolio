<?php
/**
 * Thankyou page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>
<div class="your-order-header parallax_bg" data-stellar-background-ratio="0.2">
	<div class="row">
		<div class="small-12 medium-8 medium-centered columns" data-equal=".order-details">
			<div class="order-container">
				<?php _e( 'Order','bronx' ); ?><span><?php echo $order->get_order_number(); ?></span>
			</div>
			<div class="small-12 medium-4 columns order-details"><label><?php _e( 'Date','bronx' ); ?></label>
			<?php echo date_i18n( get_option( 'date_format' ), strtotime( $order->order_date ) ); ?></div>
			<div class="small-12 medium-4 columns order-details"><label><?php _e( 'Total','bronx' ); ?></label>
			<?php echo $order->get_formatted_order_total(); ?></div>
			<div class="small-12 medium-4 columns order-details"><label><?php _e( 'Payment method','bronx' ); ?></label>
			<?php echo $order->payment_method_title; ?></div>
			
			<div class="status<?php if ( $order->has_status( 'failed' ) ) : ?> failed<?php endif; ?>">
				<h6><?php if ( $order->has_status( 'failed' ) ) : ?>
					<?php _e( 'Unfortunately your order cannot be processed.','bronx' ); ?>
				<?php else : ?>
					<?php echo apply_filters( 'woocommerce_thankyou_order_received_text', __( 'Thank you. Your order has been received.','bronx'  ), $order ); ?>
				<?php endif; ?></h6>
			</div>
		</div>
	</div>
</div>
<div class="row order-information">
	<?php if ( $order->has_status( 'failed' ) ) : ?>
		<div class="small-12 medium-8 medium-centered columns">
			<p><?php
				if ( is_user_logged_in() )
					_e( 'Please attempt your purchase again or go to your account page.','bronx' );
				else
					_e( 'Please attempt your purchase again.','bronx' );
			?></p>
	
			<p>
				<a href="<?php echo esc_url( $order->get_checkout_payment_url() ); ?>" class="button pay"><?php _e( 'Pay','bronx' ) ?></a>
				<?php if ( is_user_logged_in() ) : ?>
				<a href="<?php echo esc_url( get_permalink( wc_get_page_id( 'myaccount' ) ) ); ?>" class="button pay"><?php _e( 'My Account','bronx' ); ?></a>
				<?php endif; ?>
			</p>
		</div>
	<?php endif; ?>
		
	<div class="small-12 medium-8 medium-centered columns">
		<?php do_action( 'woocommerce_thankyou_' . $order->payment_method, $order->id ); ?>
		<?php do_action( 'woocommerce_thankyou', $order->id ); ?>
	</div>
</div>