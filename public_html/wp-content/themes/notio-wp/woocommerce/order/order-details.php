<?php
/**
 * Order details
 *
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.4.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
$order = wc_get_order( $order_id );
?>
<?php if (!is_checkout()) { ?>
<section class="order-information">
	<div class="row">
		<div class="small-12 medium-8 medium-centered columns">
<?php } ?>
<div class="row order-detail-page">
	<div class="small-12 columns">
		<h2><?php _e( 'Order Details','bronx' ); ?></h2>
		<table class="shopping_bag order_table">
			<thead>
				<tr>
					<th class="product-name"><?php _e( 'Product','bronx' ); ?></th>
					<th class="product-subtotal"><?php _e( 'Total','bronx' ); ?></th>
				</tr>
			</thead>
			<tbody>
				<?php
						foreach( $order->get_items() as $item_id => $item ) {
							wc_get_template( 'order/order-details-item.php', array(
								'order'   => $order,
								'item_id' => $item_id,
								'item'    => $item,
								'product' => apply_filters( 'woocommerce_order_item_product', $order->get_product_from_item( $item ), $item )
							) );
						}
					?>
				<?php do_action( 'woocommerce_order_items_table', $order ); ?>
			</tbody>
			<tfoot>
				<?php
						foreach ( $order->get_order_item_totals() as $key => $total ) {
							?>
							<tr>
								<th scope="row"><?php echo $total['label']; ?></th>
								<td><?php echo $total['value']; ?></td>
							</tr>
							<?php
						}
					?>
			</tfoot>
		</table>

		<?php do_action( 'woocommerce_order_details_after_order_table', $order ); ?>

	</div>
	<div class="small-12 columns">
		<h2><?php _e( 'Customer details','bronx' ); ?></h2>
		<div class="row">
			<div class="small-12 medium-6 columns">
				<dl class="customer_details">
					<?php
						if ( $order->customer_note ) echo '<dt>' . __( 'Note:', 'bronx') . '</dt><dd>' . wptexturize( $order->customer_note ) . '</dd>';
						if ( $order->billing_email ) echo '<dt>' . __( 'Email:', 'bronx') . '</dt><dd>' . $order->billing_email . '</dd>';
						if ( $order->billing_phone ) echo '<dt>' . __( 'Telephone:', 'bronx') . '</dt><dd>' . $order->billing_phone . '</dd>';
				
						// Additional customer details hook
						do_action( 'woocommerce_order_details_after_customer_details', $order );
					?>
				</dl>
			</div>
			<div class="small-12 medium-6 columns">
				<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>
			
				<div class="row addresses">
			
					<div class="small-6 columns address">
			
				<?php endif; ?>
			
						<label><?php _e( 'Billing Address','bronx' ); ?></label>
						<address><p>
							<?php echo ( $address = $order->get_formatted_billing_address() ) ? $address : __( 'N/A', 'bronx' ); ?>
						</p></address>
			
				<?php if ( ! wc_ship_to_billing_address_only() && $order->needs_shipping_address() ) : ?>
			
					</div><!-- /.col-1 -->
			
					<div class="small-6 columns address">
			
						<label><?php _e( 'Shipping Address','bronx' ); ?></label>
						<address><p>
							<?php echo ( $address = $order->get_formatted_shipping_address() ) ? $address : __( 'N/A', 'bronx' ); ?>
						</p></address>
			
					</div><!-- /.col-2 -->
			
				</div><!-- /.col2-set -->
			
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
<?php if (!is_checkout()) { ?>
		</div>
	</div>
</section>
<?php } ?>