jQuery(document).ready(function() {

    function fpf_variation_price() {
        jQuery.each(fpf_fields,function(i,val){
            if ( val.has_price && val.price_type == 'percent' && val.price != 0 ) {
                val.price_value = fpf_product_price * val.price / 100;
                var price_display = accounting.formatMoney( val.price_value, {
                    symbol 		: fpf_product.currency_format_symbol,
                    decimal 	: fpf_product.currency_format_decimal_sep,
                    thousand	: fpf_product.currency_format_thousand_sep,
                    precision 	: fpf_product.currency_format_num_decimals,
                    format		: fpf_product.currency_format
                } );
                val.price_display = val.price_value;
                var selector = '#'+val.id+'_price';
                jQuery(selector).html('(' + price_display + ')');
            }
            if (val.has_options) {
                jQuery.each(val.options, function (i, val_option) {
                    if ( val_option.price_type == 'percent' ) {
                        val_option.price_value = fpf_product_price * val_option.price / 100;
                        var price_display = accounting.formatMoney( val_option.price_value, {
                            symbol 		: fpf_product.currency_format_symbol,
                            decimal 	: fpf_product.currency_format_decimal_sep,
                            thousand	: fpf_product.currency_format_thousand_sep,
                            precision 	: fpf_product.currency_format_num_decimals,
                            format		: fpf_product.currency_format
                        } );
                        val_option.price_display = val_option.price_value;
                        if ( val.type == 'select' ) {
                            var option_selector = '#' + val.id + ' option[value="'+val_option.value+'"]';
                            jQuery(option_selector).text( val_option.label + ' (' + price_display + ')' );
                        }
                        if (val.type == 'radio') {
                            var option_selector = '#' + val.id + '_' + val_option.value + '_price';
                            jQuery(option_selector).text( '(' + price_display + ')' );
                        }
                    }
                });
            }
        });
    }

    function fpf_price_options( field ) {
        var qty = jQuery('input.qty').val(),
            wrap = jQuery('#fpf_totals');
        wrap.empty();
        var adjust_price = 0;
        var adjusted_price = false;
        jQuery.each(fpf_fields,function(i,val){
            var price_display = false;
            var price_value = 0;
            var calculate_price = true;
            if ( typeof fpf_product.fields_rules[val.id] !== 'undefined' ) {
                if ( !fpf_product.fields_rules[val.id].enabled ) {
                    calculate_price = false;
                }
            }
            if ( calculate_price ) {
                if (!val.has_options && val.has_price && val.price_value != 0) {
                    if (val.type == 'text' || val.type == 'textarea' || val.type == 'fpfdate') {
                        var field_val = jQuery('#' + val.id).val();
                        if (field_val != '') {
                            price_value = val.price_value;
                            price_display = val.price_display;
                        }
                    }
                    if (val.type == 'checkbox') {
                        if (jQuery('#' + val.id).is(':checked')) {
                            price_value = val.price_value;
                            price_display = val.price_display;
                        }
                    }
                }
                if (val.has_options) {
                    jQuery.each(val.options, function (i, val_option) {
                        if (val.type == 'select') {
                            var field_val = jQuery('#' + val.id).val();
                            if (field_val == val_option.value) {
                                price_value = val_option.price_value;
                                price_display = val_option.price_display;
                            }
                        }
                        if (val.type == 'radio') {
                            var field_val = jQuery('input[name=' + val.id + ']:checked').val()
                            if (field_val == val_option.value) {
                                price_value = val_option.price_value;
                                price_display = val_option.price_display;
                            }
                        }
                    });
                }
            }
            if ( price_display ) {
                price_value = price_display * qty;
                price_display = accounting.formatMoney( price_value, {
                    symbol 		: fpf_product.currency_format_symbol,
                    decimal 	: fpf_product.currency_format_decimal_sep,
                    thousand	: fpf_product.currency_format_thousand_sep,
                    precision 	: fpf_product.currency_format_num_decimals,
                    format		: fpf_product.currency_format
                } );
                wrap.append('<dt>' + val.title + ':</dt>');
                wrap.append('<dd>' + price_display + '</dd>');
                adjust_price += price_value;
                adjusted_price = true;

            }
        });
        if ( adjusted_price ) {
            var total_price = ( qty * fpf_product_price ) + adjust_price;
            total_price = accounting.formatMoney( total_price, {
                symbol 		: fpf_product.currency_format_symbol,
                decimal 	: fpf_product.currency_format_decimal_sep,
                thousand	: fpf_product.currency_format_thousand_sep,
                precision 	: fpf_product.currency_format_num_decimals,
                format		: fpf_product.currency_format
            } );
            wrap.append('<dt>' + fpf_product.total + ':</dt>');
            wrap.append('<dd>' + total_price + '</dd>');
        }
    }

    if ( typeof fpf_fields != 'undefined' ) {
        fpf_price_options();
    }
    jQuery(document).on("change",".fpf-input-field,input.qty",function() {
       fpf_price_options(this);
    });
    jQuery(document).on("keyup",".fpf-input-field,input.qty,.variations select",function() {
        fpf_price_options(this);
    });

    jQuery(document).on( 'found_variation', 'form.cart', function( event, variation ) {
        fpf_product_price = variation.display_price;
        fpf_variation_price();
        fpf_price_options();
    })
})
