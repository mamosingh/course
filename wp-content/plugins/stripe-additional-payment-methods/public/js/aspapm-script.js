jQuery(document).ready(function ($) {
    jQuery('input[data-stripe-button-uid]').each(function (ind, obj) {
	var uid = jQuery(obj).data('stripeButtonUid');
	if (typeof (window['stripehandler' + uid]) !== 'undefined') {
	    if (!window['stripehandler' + uid].data.asp_attached) {
		wp_asp_apm_attach(window['stripehandler' + uid].data);
		window['stripehandler' + uid].data.asp_attached = true;
	    }
	}
    });

    function wp_asp_apm_gen_items_list(data) {
	var displayItems = [];
	if (typeof data.item_price !== 'undefined' && data.item_price != 0) {
	    var item = {label: data.quantity + ' x ' + data.name, amount: data.item_price * data.quantity};
	    displayItems.push(item);
	    if (typeof data.couponCode !== "undefined") {
		item = {label: data.couponCode, amount: parseFloat(0 - data.discountAmount)};
		displayItems.push(item);
	    }
	    if (data.tax != 0) {
		var tax_amount = Math.round(stripehandler.apply_coupon(data.item_price * data.quantity, data) * parseFloat(data.tax) / 100);
		item = {label: stripehandler.strTax + ' ' + data.tax + '%', amount: tax_amount};
		displayItems.push(item);
	    }
	    if (data.shipping != 0) {
		item = {label: stripehandler.strShipping, amount: data.shipping};
		displayItems.push(item);
	    }
	    if (typeof data.variations.applied !== "undefined") {
		jQuery.each(data.variations.applied, function (grpInd, itemInd) {
		    varAmt = parseFloat(data.variations.prices[grpInd][itemInd]);
		    varAmt = varAmt * data.quantity;
		    varAmt = stripehandler.amount_to_cents(varAmt, data.currency);
		    item = {label: data.variations.names[grpInd][itemInd], amount: varAmt};
		    displayItems.push(item);
		});
	    }
	}
	return displayItems;
    }

    function wp_asp_apm_attach(data) {
	var prOpts = {
	    country: data.apm_stripe_country,
	    currency: data.currency.toLowerCase(),
	    requestShipping: false,
	    requestPayerName: true,
	    requestPayerEmail: true,
	    total: {
		label: stripehandler.strTotal,
		amount: data.amount
	    }
	};
	if (data.shippingAddress && data.billingAddress) {
	    prOpts.requestShipping = true;
	    prOpts.shippingOptions = [{id: 'shipping', label: stripehandler.strShipping, detail: '', amount: data.shipping}];
	}
	var displayItems = wp_asp_apm_gen_items_list(data);
	if (displayItems.length !== 0) {
	    prOpts.displayItems = displayItems;
	}
	var key;
	if (typeof (data.is_live) === "undefined" || data.is_live) {
	    key = stripehandler.key;
	} else {
	    key = stripehandler.key_test;
	}
	var stripe = Stripe(key);
	var paymentRequest = stripe.paymentRequest(prOpts);
	if (typeof (data.apm_btn_type) === "undefined") {
	    data.apm_btn_type = "default";
	}
	if (typeof (data.apm_btn_type) !== "undefined") {
	    if (data.apm_btn_type_auto_donate && data.variable) {
		data.apm_btn_type = 'donate';
	    }
	}
	if (typeof (data.apm_btn_style) === "undefined") {
	    data.apm_btn_style = "dark";
	}
	if (typeof (data.apm_btn_size) === "undefined") {
	    data.apm_btn_size = "32";
	}

	// Check the availability of the Payment Request API first.
	paymentRequest.canMakePayment().then(function (result) {
	    if (result) {
		if (data.apm_btn_type === "own") {
		    $('#asp-payment-request-button-' + data.uniq_id).show();
		} else {
		    var elements = stripe.elements();
		    var prButton = elements.create('paymentRequestButton', {
			paymentRequest: paymentRequest,
			style: {
			    paymentRequestButton: {
				type: data.apm_btn_type, // default || donate || buy. default: 'default'
				theme: data.apm_btn_style, // dark || light || light-outline. default: 'dark'
				height: data.apm_btn_size + 'px'
			    }
			}
		    });
		    prButton.mount('#asp-payment-request-button-' + data.uniq_id);
		    $('#asp-payment-request-button-' + data.uniq_id).show();
		    $('#asp-payment-request-button-' + data.uniq_id).css('display: inline-block;');
		    prButton.on('click', function (e) {
			return asp_apm_pr_click(e, prButton);
		    });
		}
	    } else {
		stripehandler.log('[ASPAPM]#' + data.uniq_id, 'Cannot mount - payment method not supported by browser or device.');
	    }
	});

	function asp_apm_pr_click(e, btn) {
	    if (typeof wp_asp_can_proceed === 'function') {
		data.buttonClicked = btn;
		if (!wp_asp_can_proceed(data, false)) {
		    e.preventDefault();
		    return false;
		}
	    }

	    var prOpts = {};
	    var custom_quantity;

	    if (typeof data.totalAmount !== "undefined") {
		//we have total amount set by core plugin
		amount = data.totalAmount;
	    } else {
		//we need to calculate total amount
		custom_quantity = wp_asp_validate_custom_quantity(data);
		if (custom_quantity !== false) {
		    data.quantity = custom_quantity;
		}
		amount = data.item_price * data.quantity;

		if (typeof stripehandler.apply_coupon !== "undefined") {
		    amount = stripehandler.apply_coupon(amount, data);
		}

		amount = stripehandler.apply_tax_and_shipping(amount, data);
	    }

	    prOpts = {
		currency: data.currency.toLowerCase(),
		total: {
		    label: stripehandler.strTotal,
		    amount: amount
		}
	    };

	    var displayItems = wp_asp_apm_gen_items_list(data);

	    if (displayItems.length !== 0) {
		prOpts.displayItems = displayItems;
	    }

	    if (prOpts.length !== 0) {
		paymentRequest.update(prOpts);
	    }
	    return true;
	}

	paymentRequest.on('token', function (ev) {
	    ev.complete('success');
	    var args = {addonName: "APM", email: ev.payerEmail};
	    if (data.shippingAddress && data.billingAddress) {
		args.ShippingName = ev.shippingAddress.recipient;
		args.ShippingAddressZip = ev.shippingAddress.postalCode;
		args.ShippingAddressCity = ev.shippingAddress.city;
		args.ShippingAddressCountry = ev.shippingAddress.country;
		args.ShippingAddressState = ev.shippingAddress.region;
		args.ShippingAddressLine1 = ev.shippingAddress.addressLine[0];
	    }
	    wp_asp_hadnle_token(data, ev.token, args);
	});

	paymentRequest.on('shippingaddresschange', function (ev) {
	    ev.updateWith({
		status: 'success'
	    });
	});

	$('#asp-apm-button-' + data.uniq_id).click(function (e) {
	    var res = asp_apm_pr_click(e, $(this));
	    if (res) {
		paymentRequest.show();
	    }
	    return res;
	});
    }
});