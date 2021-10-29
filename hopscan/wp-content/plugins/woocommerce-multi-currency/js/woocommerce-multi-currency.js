jQuery(document).ready(function ($) {
    'use strict';
    window.woocommerce_multi_currency = {

        init: function () {
            this.design();
            this.checkPosition();
            this.cacheCompatible();
            this.ajaxComplete();
        },

        disableCurrentCurrencyLink() {
            $('.wmc-active a').on('click', function (e) {
                e.preventDefault();
                e.stopImmediatePropagation();
            });
        },

        design: function () {
            var windowsize = jQuery(window).width();
            if (windowsize <= 768) {
                jQuery('.woocommerce-multi-currency.wmc-sidebar').on('click', function () {
                    jQuery(this).toggleClass('wmc-hover');
                    if (jQuery(this).hasClass('wmc-hover')) {
                        jQuery('html').css({'overflow': 'hidden'});
                    } else {
                        jQuery('html').css({'overflow': 'visible'});
                    }
                })
            } else {
                /*replace hover with mouseenter mouseleave in some cases to work correctly*/
                jQuery('.woocommerce-multi-currency.wmc-sidebar').on('mouseenter', function () {
                    let $this = jQuery(this);
                    $this.addClass('wmc-hover');
                });
                jQuery('.woocommerce-multi-currency.wmc-sidebar').on('mouseleave', function () {
                    let $this = jQuery(this);
                    $this.removeClass('wmc-hover');
                })
            }
        },

        checkPosition: function () {
            jQuery('.woocommerce-multi-currency .wmc-currency-wrapper').on('mouseenter', function () {
                if (this.getBoundingClientRect().top / $(window).height() > 0.5) {
                    $('.woocommerce-multi-currency .wmc-sub-currency').addClass('wmc-show-up');
                } else {
                    $('.woocommerce-multi-currency .wmc-sub-currency').removeClass('wmc-show-up');
                }
            });
        },

        cacheCompatible() {
            if (wooMultiCurrencyParams.enableCacheCompatible === '1') {

                if (typeof wc_checkout_params !== 'undefined') {
                    if (parseInt(wc_checkout_params.is_checkout) === 1) return;
                }

                if (typeof wc_add_to_cart_params !== 'undefined') {
                    if (parseInt(wc_add_to_cart_params.is_cart) === 1) return;
                }

                let pids = [];
                let simpleCache = $('.wmc-cache-pid');
                if (simpleCache.length) {
                    simpleCache.each(function (i, element) {
                        pids.push($(element).data('wmc_product_id'));
                    });
                }

                let variationCache = $('.variations_form');
                if (variationCache.length) {
                    variationCache.each(function (index, variation) {
                        let data = $(variation).data('product_variations');
                        if (data.length) {
                            data.forEach((element) => {
                                pids.push(element.variation_id);
                            });
                        }
                    });
                }

                let currentShortcode = $('.woocommerce-multi-currency.wmc-shortcode').not('.wmc-list-currency-rates');
                if (pids.length) pids = [...new Set(pids)]; //remove duplicate element

                let exchangePrice = [];
                $('.wmc-cache-value').each(function (i, element) {
                    exchangePrice.push({value: $(element).data('value'), currency: $(element).data('currency')});
                });
                exchangePrice = [...new Set(exchangePrice.map(JSON.stringify))].map(JSON.parse);

                $.ajax({
                    url: wooMultiCurrencyParams.ajaxUrl,
                    type: 'POST',
                    data: {
                        action: 'wmc_get_products_price',
                        pids: pids,
                        shortcode: currentShortcode.data('layout'),
                        flag_size: currentShortcode.data('flag_size'),
                        wmc_current_url: currentShortcode.find('.wmc-current-url').val(),
                        exchange: exchangePrice
                    },
                    success(res) {
                        if (res.success) {
                            let prices = res.data.prices || '',
                                currentCurrency = res.data.current_currency || '',
                                exSc = res.data.exchange || '';

                            currentShortcode.replaceWith(res.data.shortcode);

                            if (wooMultiCurrencyParams.switchByJS !== '1') {
                                $('.wmc-currency a').unbind();
                            }

                            if (currentCurrency) {
                                /*Sidebar*/
                                $('.wmc-sidebar .wmc-currency').removeClass('wmc-active');
                                $(`.wmc-sidebar .wmc-currency[data-currency=${currentCurrency}]`).addClass('wmc-active');
                                /***Currency switcher in product page***/
                                $('.wmc-price-switcher .wmc-current-currency i').removeClass().addClass('vi-flag-64 flag-' + res.data.current_country);
                                $(`.wmc-price-switcher .wmc-currency[data-currency=${currentCurrency}]`).hide();

                                $(`select.wmc-nav option[data-currency=${currentCurrency}]`).prop('selected', true);
                            }
                            // woocommerce_multi_currency.disableCurrentCurrencyLink();
                            if (typeof woocommerce_multi_currency_switcher !== 'undefined') {
                                woocommerce_multi_currency_switcher.init();
                            }


                            if (prices) {
                                for (let id in prices) {
                                    $(`.wmc-cache-pid[data-wmc_product_id=${id}]`).replaceWith(prices[id]);
                                }

                                $('.variations_form').each((i, form) => {
                                    let data = $(form).data('product_variations');
                                    if (data) {
                                        data.map((element) => {
                                            let pid = element.variation_id;
                                            element.price_html = prices[pid];
                                            return element
                                        });
                                        $(form).data('product_variations', data);
                                    }
                                });
                            }

                            if (exSc) {
                                for (let i in exSc) {
                                    if (exSc[i]['currency']) {
                                        $(`.wmc-cache-value[data-value=${exSc[i]['value']}][data-currency=${exSc[i]['currency']}]`).replaceWith(exSc[i]['shortcode']);
                                    } else {
                                        $(`.wmc-cache-value[data-value=${exSc[i]['value']}][data-currency='']`).replaceWith(exSc[i]['shortcode']);
                                    }
                                }
                            }
                        }
                    }
                });
            }
        },

        ajaxComplete() {
            $(document).on('append.infiniteScroll', () => {
                this.cacheCompatible();
            });
        }
    };

    woocommerce_multi_currency.init();
});
