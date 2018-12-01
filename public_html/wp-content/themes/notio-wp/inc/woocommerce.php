<?php
/* Hide Admin bar for users */
function remove_admin_bar() {
	if (!current_user_can('administrator') && !is_admin()) {
	  	show_admin_bar(false);
	}
}

add_action('after_setup_theme', 'remove_admin_bar');


/* Side Cart */
function thb_side_cart() {
 	echo '<nav id="side-cart"></nav>';
}
add_action( 'thb_side_cart', 'thb_side_cart',3 );

/* Side Cart Update */
function thb_woocomerce_side_cart_update($fragments) {
	ob_start();
	?>
	<nav id="side-cart">
		<div id="cart-container" class="cart-container <?php if (WC()->cart->cart_contents_count < 1) { ?>empty<?php } ?>">
		 	<header class="item">
		 		<h6><?php _e('SHOPPING BAG','bronx'); ?></h6>
		 		<a href="#" class="panel-close"></a>
		 	</header>
			<?php if (WC()->cart->cart_contents_count>0) : ?>
				<ul class="custom_scroll">
				<?php foreach (WC()->cart->cart_contents as $cart_item_key => $cart_item) :
				    $_product = $cart_item['data'];
				    if ($_product->exists() && $cart_item['quantity']>0) :?>
					<li class="item cf">
						<figure>
							<?php   echo '<a class="cart_list_product_img" href="'.get_permalink($cart_item['product_id']).'">' . $_product->get_image().'</a>'; ?>
						</figure>
			
						<?php echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf('<a href="%s" class="remove" title="%s">×</a>', esc_url( WC()->cart->get_remove_url( $cart_item_key ) ), __('Remove this item','bronx') ), $cart_item_key ); ?>
			
						<div class="list_content">
							<?php
							 $product_title = $_product->get_title();
						       echo '<h5><a href="'.get_permalink($cart_item['product_id']).'">' . apply_filters('woocommerce_cart_widget_product_title', $product_title, $_product) . '</a></h5>';
						       echo '<span class="quantity">'.$cart_item['quantity'].'</span><span class="cross">×</span>';
						       echo '<div class="price">'.woocommerce_price($_product->get_price()).'</div>';
							?>
						</div>
					</li>
				<?php endif; endforeach; ?>
				</ul>
				<div class="subtotal item">
				    <?php _e('Subtotal', 'bronx'); ?><?php echo WC()->cart->get_cart_total(); ?>
				</div>
			
				<div class="buttons item">
					<a href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>"><i class="fa fa-chevron-left"></i> <?php _e('Continue', 'bronx'); ?></a>
			
					<a href="<?php echo esc_url( WC()->cart->get_checkout_url() ); ?>"><?php _e('Checkout', 'bronx'); ?> <i class="fa fa-chevron-right"></i></a>
				</div>
			</div>
			<?php else: ?>
				<div class="table">
					<div>
						<div class="cart-empty text-center">
							<figure class="item"></figure>
							<p class="message item"><?php _e( 'Your cart is currently empty.', 'bronx') ?></p>
							<?php do_action( 'woocommerce_cart_is_empty' ); ?>
						
							<p class="return-to-shop item"><a class="button wc-backward" href="<?php echo apply_filters( 'woocommerce_return_to_shop_redirect', get_permalink( wc_get_page_id( 'shop' ) ) ); ?>"><?php _e( 'Return To Shop', 'bronx' ) ?></a></p>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		<div class="spacer"></div>
	</nav>
	<script type="text/javascript">
		// <![CDATA[
		jQuery(function($){
			window.SITE.quickCart.start();
		});// ]]>
	</script>
	<?php
	$fragments['#side-cart'] = ob_get_clean();
	return $fragments;

}
add_filter('add_to_cart_fragments', 'thb_woocomerce_side_cart_update');

/* Header Cart */
function thb_quick_cart() {
 if(class_exists('woocommerce')) {
 ?>
<a id="quick_cart" href="<?php echo esc_url( WC()->cart->get_cart_url() ); ?>" title="<?php _e('View your shopping cart','bronx'); ?>">
	<svg version="1.1" id="cart_icon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
		 width="22px" height="24px" viewBox="0 0 22 24" enable-background="new 0 0 22 24" xml:space="preserve">
		<g class="handle">
			<path class="change-handle"  d="M6.182,7.733c0,0,0.147,0,0.147-0.001c0.328-3.788,1.901-6.344,4.669-6.344c2.771,0,4.517,2.672,4.657,6.344
				c0,0,0.181,0,0.181,0.001h1.013c0,0,0,0,0-0.001c0-4.185-2.692-7.576-5.854-7.576c-3.159,0-5.832,3.392-5.832,7.576
				c0,0,0,0,0,0.001H6.182z"/>
			<circle class="change-color" fill="none" stroke="#151515" stroke-width="0.7" stroke-miterlimit="10" cx="5.655" cy="8.811" r="1.077"/>
			<circle class="change-color" fill="none" stroke="#151515" stroke-width="0.7" stroke-miterlimit="10" cx="16.374" cy="8.811" r="1.077"/>
		</g>
		<rect class="change-color" x="1.028" y="5.419" fill="none" stroke="#151515" stroke-width="2" stroke-miterlimit="10" width="20" height="17.359"/>
	</svg>
	<span class="float_count" id="float_count"><?php echo WC()->cart->cart_contents_count; ?></span>
</a>
<?php }
}
add_action( 'thb_quick_cart', 'thb_quick_cart',3 );

/* Header Wishlist */
function thb_quick_wishlist() {
 global $yith_wcwl;
 ?>
	<?php if ($yith_wcwl) { ?>
		<a href="<?php echo $yith_wcwl->get_wishlist_url(); ?>" title="<?php _e('Wishlist', 'bronx'); ?>" id="quick_wishlist"><i class="fa fa-heart-o"></i></a>
	<?php } ?>
<?php
}
add_action( 'thb_quick_wishlist', 'thb_quick_wishlist',3 );

/* Product Badges */
function thb_product_badge() {
 global $post, $product;
 	if (thb_out_of_stock()) {
		echo '<span class="badge out-of-stock">' . __( 'Out of Stock', 'bronx' ) . '</span>';
	} else if ( $product->is_on_sale() ) {
		echo apply_filters('woocommerce_sale_flash', '<span class="badge onsale">'.__( 'Sale','bronx' ).'</span>', $post, $product);
	}  else {
		$postdate 		= get_the_time( 'Y-m-d' );			// Post date
		$postdatestamp 	= strtotime( $postdate );			// Timestamped post date
		$newness = ot_get_option('shop_newness', 7);
		if ( ( time() - ( 60 * 60 * 24 * $newness ) ) < $postdatestamp) { // If the product was published within the newness time frame display the new badge
			echo '<span class="badge new">' . __( 'Just Arrived', 'bronx' ) . '</span>';
		}
		
	}
}
add_action( 'thb_product_badge', 'thb_product_badge',3 );

/* WOOCOMMERCE CART LINK */
function thb_woocomerce_ajax_cart_update($fragments) {
	if(class_exists('woocommerce')) {
		ob_start();
		?>
			<span class="float_count" id="float_count"><?php echo WC()->cart->cart_contents_count; ?></span>
		<?php
		$fragments['#float_count'] = ob_get_clean();
		return $fragments;
	}
}
add_filter('add_to_cart_fragments', 'thb_woocomerce_ajax_cart_update');


/* Image Dimensions */
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'thb_woocommerce_image_dimensions', 1 );

function thb_woocommerce_image_dimensions() {
  	$catalog = array(
		'width' 	=> '350',	// px
		'height'	=> '435',	// px
		'crop'		=> 1 		// true
	);

	$single = array(
		'width' 	=> '650',	// px
		'height'	=> '750',	// px
		'crop'		=> 1 		// true
	);

	$thumbnail = array(
		'width' 	=> '90',	// px
		'height'	=> '90',	// px
		'crop'		=> 1 		// false
	);

	// Image sizes
	update_option( 'shop_catalog_image_size', $catalog ); 		// Product category thumbs
	update_option( 'shop_single_image_size', $single ); 		// Single product image
	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
}

/* Products per Page */
function thb_ppp_setup() {

	if( isset( $_GET['show_products']) ){
		$getproducts = $_GET['show_products'];
		if ($getproducts == "all") {
	    	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return -1;' ) );
	    } else {
	    	add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$getproducts.';' ) );
	    }
	} else {
	    $products_per_page = ot_get_option('shop_product_count', 12);
	    add_filter( 'loop_shop_per_page', create_function( '$cols', 'return ' . $products_per_page . ';' ), 20 );
	}
}
add_action( 'after_setup_theme', 'thb_ppp_setup' );

/* Product Page - Move Tabs/Accordion next to image */
add_action( 'woocommerce_after_single_product', 'woocommerce_output_product_data_tabs', 31 );

/* Product Page - Remove breadcrumbs */
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20, 0);

/* Product Page - Remove Sale Flash */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash' , 10);

/* Product Page - Remove Tabs */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs' , 10);

/* Product Page - Remove Related Products */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 69 );

/* Product Page - Move Upsells */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
add_action( 'woocommerce_after_single_product', 'woocommerce_upsell_display', 70 );

/* Product Page - Move Product Rating */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 0 );

/* Product Page - Move Sharing to top */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 35 );


/* Review Tab */
function thb_review_setup() {
	if ( ot_get_option('review_tab', 'on') !== "on"  ) {
		function thb_remove_reviews_tab($tabs) {
			unset($tabs['reviews']);
			return $tabs;
		}
		add_filter( 'woocommerce_product_tabs', 'thb_remove_reviews_tab', 98);	
	}
}
add_action( 'after_setup_theme', 'thb_review_setup' );

/* Product Page - Catalog Mode */
function thb_catalog_setup() {
	$catalog_mode = ot_get_option('shop_catalog_mode', 'off');
	if ($catalog_mode == 'on') {
		remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
		remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
	}
}
add_action( 'after_setup_theme', 'thb_catalog_setup' );

/* Custom Metabox for Category Pages */
if(function_exists('get_term_meta')){
	function thb_taxonomy_meta_field($term) {

		$t_id = $term->term_id;
		$term_meta = get_term_meta($t_id,'cat_meta');
		if(!$term_meta){$term_meta = add_term_meta($t_id, 'cat_meta', '');}
		 ?>
		<tr>
		<th scope="row" valign="top"><label for="term_meta[cat_header]"><?php _e( 'Category Header', 'bronx' ); ?></label></th>
			<td>
					<?php
					$content = esc_attr( $term_meta[0]['cat_header'] ) ? esc_attr( $term_meta[0]['cat_header'] ) : '';

					wp_editor(
					  $content,
					  "term_meta[cat_header]",
					  array(
					    'wpautop'       => true,
					    'media_buttons' => true,
					    'textarea_name' => "term_meta[cat_header]",
					    'textarea_rows' => "6",
					    'tinymce'       => true
					  )
					);
				  ?>
				<p class="description"><?php _e( 'This content will be displayed at the top of this category. You can use your shortcodes here. <small>You can create your content using visual composer and then copy its text here</small>','bronx' ); ?></p>
			</td>
		</tr>
	<?php
	}
	add_action( 'product_cat_edit_form_fields', 'thb_taxonomy_meta_field', 10, 2 );

	/* Save Custom Meta Data */
	function thb_save_taxonomy_custom_meta( $term_id ) {
		if ( isset( $_POST['term_meta'] ) ) {
			$t_id = $term_id;
			$term_meta = get_term_meta($t_id,'cat_meta');
			$cat_keys = array_keys( $_POST['term_meta'] );
			foreach ( $cat_keys as $key ) {
				if ( isset ( $_POST['term_meta'][$key] ) ) {
					$term_meta[$key] = $_POST['term_meta'][$key];
				}
			}
			update_term_meta($term_id, 'cat_meta', $term_meta);

		}
	}
	add_action( 'edited_product_cat', 'thb_save_taxonomy_custom_meta', 10, 2 );
}

/* Redirect to Homepage when customer log out */
add_filter('logout_url', 'thb_logout_url', 10, 2);
function thb_logout_url($logouturl, $redir) {
	$redirect = get_option('siteurl');
	return $logouturl . '&amp;redirect_to=' . urlencode($redirect);
}

?>
