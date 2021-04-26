=== Stripe Additional Payment Methods Addon ===
Contributors: alexanderfoxc
Donate link: https://stripe-plugins.com
Tags: stripe
Requires at least: 4.7
Tested up to: 5.5
Stable tag: 2.0.15

Easily accept Apple Pay and Pay with Google payments.

== Description ==

Easily accept Apple Pay and Pay with Google payments.

== Changelog ==

= 2.0.15 =
* Core plugin version 2.0.38 support.

= 2.0.14 =
* All-off coupons are properly handled now.
* Removed additional code execution if payment method is not supported by browser or device.

= 2.0.13 =
* Add-on updates are handled by core plugin now.

= 2.0.12 =
* Added recurring payments support.
Requires Stripe Payments 2.0.29+ and Subscriptions Addon 2.0.13+.
* Added internal Stripe API wrapper support.
Requires Stripe Payments 2.0.29+.

= 2.0.11 =
* Latest stripe.js version support.

= 2.0.10 =
* Proper frontend error messages are now displayed instead of "Ojbect object".

= 2.0.9 =
* Fixed variations weren't properly updated in APM checkout.

= 2.0.8 =
* Added compatability with reCAPTCHA addon's "Use Invisible reCAPTCHA Badge" option.

= 2.0.7 =
* Fixed issue with tax products.

= 2.0.6 =
* Replaced deprecated stripe.js functions.

= 2.0.5 =
* Added frontend scripts prefetch support (requires Stripe Payments 2.0.13+).
* Better addon update check handling.

= 2.0.4 =
* Added icon for payment popup.

= 2.0.3 =
* Fixed "shipping address error" for some Apple Pay payments.

= 2.0.2 =
* Fixed minor visual issue.

= 2.0.1 =
* Fixed Apple Pay button interaction issue on some devices.
* Frontend errors should be more informative now.

= 2.0.0 =
* Added support for new payment popup (new API) (requires Stripe Payments 2.0.8+).
* Fixed domain autoapproval with Apple issue.

= 1.2.4 =
* Fixed variable subscription currency was ignored.

= 1.2.3 =
* Fixed Stripe mode wasn't considered under some circumstances.

= 1.2.2 =
* Hopefully fixed billing\shipping address catching for Google Pay.

= 1.2.1 =
* Total amount calculation is now handled by core plugin if possible.

= 1.2.0 =
* Fixed improper tax value calculation under some circumstances.

= 1.1.9 =
* Added support for upcoming variations.

= 1.1.8 =
* Fixed button was not responding to clicks under some circumstances.

= 1.1.7 =
* Billing and\or Shipping addresses are now properly collected (thanks to nourrirsafoi for reporting).
* Coupon discount is displayed and considered during total amount calculation (requires Stripe Payments 1.9.1+).

= 1.1.6 =
* Fixed total amount display for donate button shortcode.

= 1.1.5 =
* Some compatability changes for upcoming core plugin version 1.8.5.

= 1.1.4 =
* Fixed tax and shipping amounts calculation and display (requires Stripe Payments 1.8.2+).
* Tax and shipping details are now displayed in the payment info (requires Stripe Payments 1.8.2+).
* Not ignoring mandatory custom field now (requires Stripe Payments 1.8.2+).

= 1.1.3 =
* Fixed conflicts with some visual page builders.

= 1.1.2 =
* Fixed minor error in autoapproval code.

= 1.1.1 =
* Improved domain autoapproval code.

= 1.1 =
* Adds [APM] to order title if the payment was made using the addon (requires Stripe Payments 1.7.4+).

= 0.0.3 =
* Added automatic domain approvement with Stripe for Apple Pay (corresponding button in addon settings).
* Added SSL check on Settings page.

= 0.0.2 =
* Added Settings link on plugins page.

= 0.0.1 =
* First public test release.