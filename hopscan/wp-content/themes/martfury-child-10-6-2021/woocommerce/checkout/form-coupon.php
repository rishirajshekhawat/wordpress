<?php
/**
 * Checkout coupon form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-coupon.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 3.4.4
 */

defined( 'ABSPATH' ) || exit;

if ( ! wc_coupons_enabled() ) { // @codingStandardsIgnoreLine.
	return;
}

$css_class = 'col-md-5';
if ( is_user_logged_in() || 'no' === get_option( 'woocommerce_enable_checkout_login_reminder' ) ) {
	$css_class = 'col-md-12';
}
?>
<div class="col-xs-12 col-sm-12 col-form-coupon <?php echo esc_attr( $css_class ); ?>">
	<div class="woocommerce-form-coupon-toggle">
		<?php wc_print_notice( apply_filters( 'woocommerce_checkout_coupon_message', esc_html__( 'Have a coupon?', 'martfury' ) . ' <a href="#" class="showcoupon">' . esc_html__( 'Click here to enter your code', 'martfury' ) . '</a>' ), 'notice' ); ?>
	</div>
	<form class="checkout_coupon woocommerce-form-coupon" method="post" style="display:none">

		<p><?php esc_html_e( 'If you have a coupon code, please apply it below.', 'martfury' ); ?></p>

		<p class="form-row form-row-first">
			<input type="text" name="coupon_code" class="input-text" placeholder="<?php esc_attr_e( 'Coupon code', 'martfury' ); ?>" id="coupon_code" value="" />
		</p>

		<p class="form-row form-row-last">
			<button type="submit" class="button" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'martfury' ); ?>" ><?php esc_html_e( 'Apply coupon', 'martfury' ); ?></button>
		</p>

		<div class="clear"></div>
	</form>
	


	<form name="checkout" method="post" class="checkout woocommerce-checkout" action="<?php echo esc_url( wc_get_checkout_url() ); ?>" enctype="multipart/form-data">

		<div class="row">

			<?php 

			if(is_user_logged_in())
			{
				$left_sec = 'col-md-7';
				$right_sec = 'col-md-5';

			}
			else{
				$right_sec =  $left_sec = 'col-md-12';

				?>
				<style>
				#ddwc_pro_user_sms_updates_checkbox_field{display:none}
				</style>
				<?php
			}
			?>
			<div class="col-xs-12 col-sm-12 <?php echo $left_sec; ?> col-woo-checkout-details">

				<?php if ( $checkout->get_checkout_fields() ) : ?>



					<?php do_action( 'woocommerce_checkout_before_customer_details' ); ?>



					<div id="customer_details">

						<div class="checkout-shipping">

							<?php do_action( 'woocommerce_checkout_shipping' ); ?>

						</div>



						<div class="checkout-billing">

							
							<?php do_action( 'woocommerce_checkout_billing' ); ?>

						</div>

					</div>



					<?php do_action( 'woocommerce_checkout_after_customer_details' ); ?>



				<?php endif; ?>

			</div>

			<div class="col-xs-12 col-sm-12 <?php echo $right_sec; ?>">

				



				<?php do_action( 'woocommerce_checkout_before_order_review' ); ?>



				<div id="order_review" class="woocommerce-checkout-review-order">
					<h3 id="order_review_heading"><?php esc_html_e( 'Your order', 'martfury' ); ?></h3>
					

					<?php do_action( 'woocommerce_checkout_order_review' ); ?>

				</div>



				<?php do_action( 'woocommerce_checkout_after_order_review' ); ?>

			</div>

		</div>



	</form>
</div>
