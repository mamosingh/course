var APMHandlerNG = function (data) {
	var parent = this;

	parent.button = document.getElementById('asp-payment-request-button');
	parent.submitBtnCont = document.getElementById('submit-btn-cont');
	parent.hideOnActive = ['name-email-cont', 'addr-switch-cont', 'addr-cont', 'card-cont'];

	parent.pmSelectClicked = function () {
		if (vars.data.currentPM !== "APM") {
			toggleRequiredElements(parent.hideOnActive, false);
		} else {
			toggleRequiredElements(parent.hideOnActive, true);
		}
	}

	parent.allAmountsUpdated = function () {
		if (vars.data.show_your_order !== 1) {
			jQuery('#apm-total-amount').html(formatMoney(vars.data.amount)).show();
		}
		if (parent.pr) {
			parent.readyToProceed();
		}
	}

	parent.genItemList = function () {
		var displayItems = [];
		if (typeof vars.data.item_price !== 'undefined') {
			var item = { label: vars.data.item_name + ' × ' + vars.data.quantity, amount: vars.data.item_price * vars.data.quantity };
			displayItems.push(item);
			if (vars.data.coupon) {
				item = { label: vars.data.coupon.code, amount: parseFloat(0 - vars.data.coupon.discount_amount) };
				displayItems.push(item);
			}
			if (vars.data.tax != 0) {
				item = { label: vars.str.strTax + ' ' + vars.data.tax + '%', amount: vars.data.taxAmount };
				displayItems.push(item);
			}
			if (vars.data.shipping != 0) {
				item = { label: vars.str.strShipping, amount: vars.data.shipping };
				displayItems.push(item);
			}
			if (typeof vars.data.variations.applied !== "undefined") {
				jQuery.each(vars.data.variations.applied, function (grpInd, itemInd) {
					varAmt = parseFloat(vars.data.variations.prices[grpInd][itemInd]);
					varAmt = varAmt * vars.data.quantity;
					varAmt = amount_to_cents(varAmt, vars.data.currency);
					item = { label: vars.data.variations.names[grpInd][itemInd], amount: varAmt };
					displayItems.push(item);
				});
			}
		}
		return displayItems;
	}

	parent.csRegenCompleted = function () {
		parent.csReady();
	}

	parent.csReady = function () {
		if (vars.data.buttonClicked === "APM") {
			vars.data.doNotProceed = true;
		}
	}

	parent.readyToProceed = function () {
		if (vars.data.isEvent) {
			return true;
		}
		var prOpts = {};
		calcTotal();
		prOpts = {
			currency: vars.data.currency.toLowerCase(),
			total: {
				label: vars.str.strTotal,
				amount: vars.data.amount
			}
		};

		var displayItems = parent.genItemList();

		if (displayItems.length !== 0) {
			prOpts.displayItems = displayItems;
		}

		if (prOpts.length !== 0) {
			parent.paymentRequest.update(prOpts);
		}
		return true;
	}

	parent.init = function () {
		vars.data.initShowPopup = false;
		var prOpts = {
			country: vars.data.apm_stripe_country,
			currency: vars.data.currency.toLowerCase(),
			requestShipping: false,
			requestPayerName: true,
			requestPayerEmail: true,
			total: {
				label: vars.str.strTotal,
				amount: vars.data.amount >= 0 ? vars.data.amount : 0
			}
		};
		if (vars.data.billing_address && vars.data.shipping_address) {
			prOpts.requestShipping = true;
			prOpts.shippingOptions = [{ id: 'shipping', label: vars.str.strShipping, detail: '', amount: vars.data.shipping }];
		}

		calcTotal();

		var displayItems = parent.genItemList();
		if (displayItems.length !== 0) {
			prOpts.displayItems = displayItems;
		}

		var paymentRequest = stripe.paymentRequest(prOpts);
		parent.paymentRequest = paymentRequest;
		if (typeof (vars.data.apm_btn_type) === "undefined") {
			vars.data.apm_btn_type = "default";
		}

		vars.data.apm_btn_type = vars.data.apm_btn_type === 'own' ? 'default' : vars.data.apm_btn_type;

		if (typeof (vars.data.apm_btn_type) !== "undefined") {
			if (vars.data.apm_btn_type_auto_donate && vars.data.amount_variable) {
				vars.data.apm_btn_type = 'donate';
			}
		}
		if (typeof (vars.data.apm_btn_style) === "undefined") {
			vars.data.apm_btn_style = "dark";
		}

		var emSize = parseFloat(jQuery("body").css("font-size"));
		vars.data.apm_btn_size = "34";
		if (jQuery(window).width() < (emSize * 48)) {
			vars.data.apm_btn_size = "50";
		}

		// Check the availability of the Payment Request API first.
		paymentRequest.canMakePayment().then(function (result) {
			if (result) {
				showPopup();
				parent.pr = paymentRequest;
				vars.data.apmPR = paymentRequest;
				parent.addPrActions();
				document.getElementById('asp-payment-request-button-container').style.display = "inline-block";
				var prButton = elements.create('paymentRequestButton', {
					paymentRequest: paymentRequest,
					style: {
						paymentRequestButton: {
							type: vars.data.apm_btn_type, // default || donate || buy. default: 'default'
							theme: vars.data.apm_btn_style, // dark || light || light-outline. default: 'dark'
							height: vars.data.apm_btn_size + 'px'
						}
					}
				});
				prButton.mount('#asp-payment-request-button');
				prButton.on('click', function (e) {
					vars.data.isEvent = true;
					vars.data.buttonClicked = "APM";
					if (!canProceed()) {
						e.preventDefault();
						vars.data.isEvent = false;
						return false;
					}
					parent.readyToProceed();
					smokeScreen(true);
					handlePayment();
				});
				parent.allAmountsUpdated();
				parent.prButton = prButton;
				jQuery('[data-pm-id="APM"]').trigger('click');
			} else {
				jQuery('[data-pm-id="def"]').trigger('click');
				jQuery('[data-pm-id="APM"]').prop('checked', false).parent().parent().remove();
				jQuery('[data-pm-id="def"]').prop('checked', true);

				vars.data.payment_methods.forEach(function (pm, ind) {
					if (pm.id === "APM") {
						vars.data.payment_methods.splice(ind, 1);
					}
				});
				if (vars.data.payment_methods.length === 1) {
					jQuery('#pm-select-cont').remove();
				}
				showPopup();
				console.log('[APM]: Cannot mount - payment method not supported by browser or device.');
			}
		});

	}

	parent.addPrActions = function () {
		parent.pr.on('cancel', function (ev) {
			submitBtn.disabled = false;
			vars.data.isEvent = false;
			smokeScreen(false);
		});

		parent.pr.on('paymentmethod', function (ev) {
			console.log('APM: updating PaymentIntent');
			var is_live = vars.data.is_live ? 1 : 0;
			var reqStr = "action=asp_apm_update_pi&is_live=" + is_live + "&pi_id=" + vars.data.pi_id + "&cust_id=" + vars.data.cust_id + "&ev_data=" + JSON.stringify(ev);
			new ajaxRequest(vars.ajaxURL, reqStr,
				function (res) {
					try {
						var resp = JSON.parse(res.responseText);
						console.log(resp);
						if (!resp.success) {
							parent.showError(resp.err);
							ev.complete('fail');
							return false;
						}
						ev.complete('success');
						console.log('Doing confirmCardPayment()');
						stripe.confirmCardPayment(vars.data.client_secret).then(function (result) {
							handleCardPaymentResult(result);
						});

					} catch (e) {
						console.log(e);
						parent.showError(errMsg);
					}
				},
				function (res, errMsg) {
					parent.showError(errMsg);
				}
			);
		});

		parent.pr.on('shippingaddresschange', function (ev) {
			ev.updateWith({
				status: 'success'
			});
		});
	}

	parent.showError = function (errMsg) {
		submitBtn.disabled = false;
		errorCont.innerHTML = errMsg;
		errorCont.style.display = 'block';
		smokeScreen(false);
	}

}