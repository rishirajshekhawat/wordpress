jQuery(document).ready(function () {
    'use strict';
    woocommerce_multi_currency_switcher.use_session = _woocommerce_multi_currency_params.use_session;
    woocommerce_multi_currency_switcher.ajax_url = _woocommerce_multi_currency_params.ajax_url;
    woocommerce_multi_currency_switcher.init();
});

var woocommerce_multi_currency_switcher = {
    use_session: 0,
    ajax_url: '',
    init: function () {
        jQuery('body').on('click', 'a.wmc-currency-redirect', function (e) {
            e.stopPropagation();
            e.preventDefault();
            var currency = jQuery(this).data('currency');
            if (currency) {
                wmcSwitchCurrency(currency);
            }
        });

        jQuery('.wmc-select-currency-js').on('change', function (e) {
            e.preventDefault();
            var currency = jQuery(this).val();
            if (currency) {
                wmcSwitchCurrency(currency);
            }
        })
    },

    setCookie: function (cname, cvalue, expire) {
        var d = new Date();
        d.setTime(d.getTime() + (expire * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    },
};

var wmcSwitchCurrency = function (currency) {
    if (woocommerce_multi_currency_switcher.use_session == 1) {
        jQuery.ajax({
            type: 'GET',
            data: 'action=wmc_currency_switcher&wmc-currency=' + currency,
            url: woocommerce_multi_currency_switcher.ajax_url,
            xhrFields: {withCredentials: true},
            success: function (data) {
                if (typeof wc_cart_fragments_params === 'undefined' || wc_cart_fragments_params === null) {
                } else {
                    sessionStorage.removeItem(wc_cart_fragments_params.fragment_name);
                }
                jQuery.when(jQuery('body').trigger("wc_fragment_refresh")).done(function () {
                    location.reload();
                });
            },
            error: function (html) {
            }
        })
    } else {
        woocommerce_multi_currency_switcher.setCookie('wmc_current_currency', currency, 86400);
        woocommerce_multi_currency_switcher.setCookie('wmc_current_currency_old', currency, 86400);
        if (typeof wc_cart_fragments_params === 'undefined' || wc_cart_fragments_params === null) {
        } else {
            sessionStorage.removeItem(wc_cart_fragments_params.fragment_name);
        }
        jQuery.when(jQuery('body').trigger("wc_fragment_refresh")).done(function () {
            location.reload();
        });
    }
};