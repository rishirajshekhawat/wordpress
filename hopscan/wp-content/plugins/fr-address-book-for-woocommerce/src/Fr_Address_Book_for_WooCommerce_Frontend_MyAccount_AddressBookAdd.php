<?php

/**
 * Front end my-account/address-book-add page.
 *
 * @since 1.0.0
 * @author Fahri Rusliyadi <fahri.rusliyadi@gmail.com>
 */
class Fr_Address_Book_for_WooCommerce_Frontend_MyAccount_AddressBookAdd extends Fr_Address_Book_for_WooCommerce_Frontend_MyAccount_BaseEndpoint {
    /**
     * Endpoint name.
     * 
     * @since 1.0.0
     * @var string
     */
    protected $endpoint_name = 'address-book-add';
    
    /**
     * Display edit address form.
     * 
     * @link https://github.com/woocommerce/woocommerce/blob/c01b7287989eaa0de7e80d2da9ca3cedf37971e4/includes/shortcodes/class-wc-shortcode-my-account.php#L158-L197
     * 
     * @since 1.0.0
     * @param string $value Endpoint query var value.
     */
    protected function display_endpoint_content($value) {
        $address_fields = wc()->countries->get_address_fields(get_user_meta(get_current_user_id(), 'billing_country', true));

        // Enqueue scripts.
        wp_enqueue_script('wc-country-select');
        wp_enqueue_script('wc-address-i18n');

        fr_address_book_for_woocommerce()->Frontend_Template->load('add-address.php', compact('address_fields'));
    }
    
    /**
     * Change endpoint title.
     * 
     * @since 1.0.0
     * @global WP_Query $wp_query
     * @param string $title
     * @return string
     */
    protected function change_endpoint_title($title) {
        global $wp_query;

	$is_endpoint = isset($wp_query->query_vars[$this->endpoint_name]);

	if (function_exists('wc') && $is_endpoint && !is_admin() && is_main_query() && in_the_loop() && is_account_page()) {
            // New page title.
            $title = __('Add Address', 'fr-address-book-for-woocommerce');

            remove_filter('the_title', array($this, 'filter_the_title'));
	} 

	return $title;
    }
}
