<?php
/**
 * Login Form
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.6
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<?php do_action('woocommerce_before_customer_login_form'); ?>
<div class="row" id="customer_login">
	<?php wc_print_notices();  ?>
		<div class="small-12 medium-6 columns login-section first">
			<div class="small-12 medium-10 large-8 medium-centered columns">
				<div class="table full-height-content text-center">
					<div>
						<div class="largetitle"><?php _e( "LOGIN" ,'bronx' ); ?></div>
						<h5><?php _e( "I'm an existing customer and <br>would like to login." ,'bronx' ); ?></h5>
						<form method="post" class="login row text-center">
							<div class="small-12 columns">
								<label for="username"><?php _e( 'Username or email','bronx' ); ?> <span class="required">*</span></label>
								<input type="text" class="input-text full" name="username" id="username" />
							</div>
							<div class="small-12 columns">
								<label for="password"><?php _e( 'Password','bronx' ); ?> <span class="required">*</span></label>
								<input class="input-text full" type="password" name="password" id="password" />
							</div>
							<div class="small-6 columns">
								<div class="remember">
									<input name="rememberme" type="checkbox" id="rememberme" value="forever" class="custom_check"/> <label for="rememberme" class="checkbox custom_label"><?php _e( 'Remember me','bronx' ); ?></label>
								</div>
							</div>
							<div class="small-6 columns">
								<a class="lost_password" href="<?php echo esc_url( wc_lostpassword_url() ); ?>"><?php _e( 'Lost Password?','bronx' ); ?></a>
							</div>
							<div class="small-12 columns text-center">
								<?php wp_nonce_field( 'woocommerce-login' ); ?>
								<input type="submit" class="button" name="login" value="<?php _e( 'Login','bronx' ); ?>" />
								<?php if($_SERVER['HTTP_HOST'] === 'notio.fuelthemes.net') {?>
								<p>Try our demo account -  <strong>username:</strong> demo <strong>password</strong> demo</p>
								<?php } ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php if (get_option('woocommerce_enable_myaccount_registration')=='yes') : ?>
		<div class="small-12 medium-6 columns login-section second">
			<span class="line"></span>
			<span class="or"><?php _e( "OR" ,'bronx' ); ?></span>
			<div class="small-12 medium-10 large-8 medium-centered columns">
				<div class="table full-height-content text-center">
					<div>
						<div class="largetitle"><?php _e( "REGISTER" ,'bronx' ); ?></div>
						<h5><?php _e( "I'm a new customer and <br>would like to register." ,'bronx' ); ?></h5>
						<form method="post" class="register row text-center">
							<?php do_action( 'woocommerce_register_form_start' ); ?>
							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>
								<div class="small-12 columns">
									<label for="reg_username"><?php _e( 'Username','bronx' ); ?> <span class="required">*</span></label>
									<input type="text" class="input-text full" name="username" id="reg_username" value="<?php if (isset($_POST['username'])) echo esc_attr($_POST['username']); ?>" />
								</div>
				
							<?php endif; ?>
							<div class="small-12 columns">
								<label for="reg_email"><?php _e( 'Email','bronx' ); ?> <span class="required">*</span></label>
								<input type="email" class="input-text full" name="email" id="reg_email" value="<?php if (isset($_POST['email'])) echo esc_attr($_POST['email']); ?>" />
							</div>
							<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>
							<div class="small-12 columns">
								<label for="reg_password"><?php _e( 'Password','bronx' ); ?> <span class="required">*</span></label>
								<input type="password" class="input-text full" name="password" id="reg_password" value="<?php if (isset($_POST['password'])) echo esc_attr($_POST['password']); ?>" />
							</div>
							<?php endif; ?>
							<!-- Spam Trap -->
							<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>
				
							<?php do_action( 'woocommerce_register_form' ); ?>
							<?php do_action( 'register_form' ); ?>
				
							<div class="small-12 columns">
								<?php wp_nonce_field( 'woocommerce-register'); ?>
								<input type="submit" class="button" name="register" value="<?php _e( 'Register','bronx' ); ?>" />
							</div>
							<?php do_action( 'woocommerce_register_form_end' ); ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div>
<?php do_action('woocommerce_after_customer_login_form'); ?>