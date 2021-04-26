<?php
/**
 * Plugin Name: Stripe Additional Payment Methods Addon
 * Plugin URI: https://s-plugins.com/stripe-additional-payment-methods-addon/
 * Description: Easily accept Apple Pay and Pay with Google payments.
 * Version: 2.0.15
 * Author: Tips and Tricks HQ, alexanderfoxc
 * Author URI: https://s-plugins.com/
 * License: GPL2
 * Text Domain: asp-apm
 * Domain Path: /languages
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; //Exit if accessed directly
}

class ASPAPM_main {

	const ADDON_VER = '2.0.15';

	protected $asp_main;
	protected $apm_enabled;

	public $file              = __FILE__;
	public $textdomain        = 'asp-apm';
	public $ADDON_SHORT_NAME  = 'APM';
	public $ADDON_FULL_NAME   = '';
	public $MIN_ASP_VER       = '1.9.9';
	public $SLUG              = 'stripe-additional-payment-methods';
	public $SETTINGS_TAB_NAME = 'apm';

	const NEW_API_MIN_CORE_VER = '2.0.8t9';

	private $pre_2029 = true;
	private $pre_2038 = true;

	public function __construct() {
		$this->ADDON_FULL_NAME = __( 'Additional Payment Methods', 'stripe-payments' );
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
		register_activation_hook( __FILE__, array( 'ASPAPM_main', 'activate' ) );
	}

	public function approve_domain_with_apple() {

		$opt = get_option( 'AcceptStripePayments-settings' );
		if ( isset( $opt['apm_domain_approved'] ) && false !== $opt['apm_domain_approved'] ) {
			$opt['apm_domain_approved'] = false;
			unregister_setting( 'AcceptStripePayments-settings-group', 'AcceptStripePayments-settings' );
			update_option( 'AcceptStripePayments-settings', $opt );
		}

		$ret = array( 'err_msg' => '' );
		if ( ! is_ssl() ) {
			$ret['err_msg'] = __( 'You website is not using SSL.', 'asp-apm' );
			wp_send_json( $ret );
		}

		$sk_live = $this->asp_main->get_setting( 'api_secret_key' );
		if ( empty( $sk_live ) ) {
			$ret['err_msg'] = __( 'You need to set Live Stripe Secret Key in order to approve your domain.', 'asp-apm' );
			wp_send_json( $ret );
		}

		$url_parts             = wp_parse_url( get_site_url() );
		$domain                = $url_parts['host'];
		$verification_file_url = 'https://' . $domain . '/.well-known/apple-developer-merchantid-domain-association';
		$cert                  = wp_remote_get( $verification_file_url );
		if ( is_wp_error( $cert ) ) {
			$err_msg = $cert->get_error_message();
			// Translators: %s is URL to verification file
			$ret['err_msg'] = sprintf( __( 'Failed to retreive domain verification file at %s', 'asp-apm' ), '<a href="' . $verification_file_url . '" target="_blank">' . $verification_file_url . '</a>' ) . '<br>' . sprintf( __( 'Following error occurred: %s.', 'asp-apm' ), $err_msg );
			wp_send_json( $ret );
		}

		$apple_cert = file_get_contents( plugin_dir_path( __FILE__ ) . 'apple-developer-merchantid-domain-association' );

		$doc_root = rtrim( $_SERVER['DOCUMENT_ROOT'], '/' ) . '/';

		$resp_code = wp_remote_retrieve_response_code( $cert );
		if ( 200 !== $resp_code ) {
			//probably file not found, let's try to put it there
			if ( ! file_exists( $doc_root . '.well-known' ) ) {
				//attempting to create directory
				if ( ! mkdir( $doc_root . '.well-known', 0755 ) ) {
					// Translators: %s is directory path
					$ret['err_msg'] = sprintf( __( "Can't create directory %s", 'asp-apm' ), $doc_root . '.well-known' );
					wp_send_json( $ret );
				}
			}
			//attempting to write file
			if ( file_put_contents( $doc_root . '.well-known/apple-developer-merchantid-domain-association', $apple_cert ) === false ) { //phpcs:ignore
				// Translators: %s is file name
				$ret['err_msg'] = sprintf( __( "Can't write file %s", 'asp-apm' ), $doc_root . '.well-known/apple-developer-merchantid-domain-association' );
				wp_send_json( $ret );
			}
			//all should be set, let's try to fetch the file again
			$cert = wp_remote_get( $verification_file_url );
			if ( is_wp_error( $cert ) ) {
				$err_msg = $cert->get_error_message();
				// Translators: %s is URL to verification file
				$ret['err_msg'] = sprintf( __( 'Failed to retreive domain verification file at %s', 'asp-apm' ), '<a href="' . $verification_file_url . '" target="_blank">' . $verification_file_url . '</a>' ) . '<br>' . sprintf( __( 'Following error occurred: %s.', 'asp-apm' ), $err_msg );
				wp_send_json( $ret );
			}
			$resp_code = wp_remote_retrieve_response_code( $cert );
			if ( 200 !== $resp_code ) {
				// Translators: %s is URL to verification file
				$ret['err_msg'] = sprintf( __( 'Failed to retreive domain verification file at %s', 'asp-apm' ), '<a href="' . $verification_file_url . '" target="_blank">' . $verification_file_url . '</a>' ) . '<br>' . sprintf( __( 'Got following HTTP Responce Code: %s', 'asp-apm' ), $resp_code );
				wp_send_json( $ret );
			}
		}

		$cert = wp_remote_retrieve_body( $cert );
		if ( $cert !== $apple_cert ) {
			//attempting to write file
			file_put_contents( $doc_root . '.well-known/apple-developer-merchantid-domain-association', $apple_cert ); //phpcs:ignore
			$cert = wp_remote_get( $verification_file_url );
			$cert = wp_remote_retrieve_body( $cert );
			if ( $cert !== $apple_cert ) {
				$ret['err_msg'] = __( 'Your Apple domain association file mismatches the one required by Stripe.', 'asp-apm' );
				wp_send_json( $ret );
			}
		}

		ASPMain::load_stripe_lib();
		\Stripe\Stripe::setApiKey( $sk_live );

		try {
			if ( method_exists( 'ASP_Utils', 'use_internal_api' ) && ASP_Utils::use_internal_api() ) {
				$api = ASP_Stripe_API::get_instance();
				$api->set_api_key( $sk_live );

				$res = $api->post( 'apple_pay/domains', array( 'domain_name' => $domain ) );

				if ( false === $res ) {
					$err            = $api->get_last_error();
					$ret['err_msg'] = $err['message'];
					wp_send_json( $ret );
				}
			} else {
				\Stripe\ApplePayDomain::create(
					array(
						'domain_name' => $domain,
					)
				);
			}
		} catch ( EXCEPTION $e ) {
			$ret['err_msg'] = $e->getMessage();
			wp_send_json( $ret );
		}

		//if code execution got this far, it means everything is ok.
		$opt                        = get_option( 'AcceptStripePayments-settings' );
		$opt['apm_domain_approved'] = true;
		unregister_setting( 'AcceptStripePayments-settings-group', 'AcceptStripePayments-settings' );
		update_option( 'AcceptStripePayments-settings', $opt );

		$ret['success'] = true;
		// Translators: %s is domain name
		$ret['success_msg'] = sprintf( __( 'Your domain %s has been successfully approved. You can accept Apple Pay payments now.', 'asp-apm' ), $domain );
		wp_send_json( $ret );
	}

	public static function activate() {
		$opt      = get_option( 'AcceptStripePayments-settings' );
		$defaults = array(
			'apm_stripe_country'       => 'US',
			'apm_btn_type'             => 'default',
			'apm_btn_type_auto_donate' => 1,
			'apm_btn_style'            => 'dark',
			'apm_btn_size'             => 32,
		);
		$new_opt  = array_merge( $defaults, $opt );
		// unregister setting to prevent main plugin from sanitizing our new values
		unregister_setting( 'AcceptStripePayments-settings-group', 'AcceptStripePayments-settings' );
		update_option( 'AcceptStripePayments-settings', $new_opt );
	}

	public function plugins_loaded() {
		if ( class_exists( 'AcceptStripePayments' ) ) {
			$this->asp_main    = AcceptStripePayments::get_instance();
			$this->apm_enabled = $this->asp_main->get_setting( 'apm_enable_apm' );

			$this->helper = new ASPAddonsHelper( $this );
			//check minimum required core plugin version
			if ( ! $this->helper->check_ver() ) {
				return false;
			}
			$this->helper->init_tasks();

			if ( '/.well-known/apple-developer-merchantid-domain-association' === strtolower( $_SERVER['REQUEST_URI'] ) ) {
				readfile( dirname( __FILE__ ) . '/apple-developer-merchantid-domain-association' ); //phpcs:ignore
				exit();
			}

			if ( wp_doing_ajax() ) {
				add_filter( 'asp_ng_sub_confirm_token_customer_opts', array( $this, 'ng_sub_confirm_token_customer_opts' ) );
				add_action( 'wp_ajax_apm_autoapprove_domain', array( $this, 'approve_domain_with_apple' ) );
				add_action( 'wp_ajax_asp_apm_update_pi', array( $this, 'ng_update_payment_intent' ) );
				add_action( 'wp_ajax_nopriv_asp_apm_update_pi', array( $this, 'ng_update_payment_intent' ) );
			}

			if ( ! is_admin() ) {
				add_filter( 'asp-button-output-additional-styles', array( $this, 'output_styles' ) );
				add_filter( 'asp-button-output-data-ready', array( $this, 'data_ready' ), 10, 2 );
				add_filter( 'asp-button-output-after-button', array( $this, 'after_button' ), 10, 3 );
				add_action( 'asp-button-output-register-script', array( $this, 'register_script' ) );
				add_action( 'asp-button-output-enqueue-script', array( $this, 'enqueue_script' ) );

				if ( $this->apm_enabled ) {
					if ( version_compare( WP_ASP_PLUGIN_VERSION, self::NEW_API_MIN_CORE_VER ) >= 0 ) {
						if ( version_compare( WP_ASP_PLUGIN_VERSION, '2.0.29t2' ) >= 0 ) {
							$this->pre_2029 = false;
						}
						if ( version_compare( WP_ASP_PLUGIN_VERSION, '2.0.37' ) >= 0 ) {
							$this->pre_2038 = false;
						}
						add_filter( 'asp_ng_pp_data_ready', array( $this, 'ng_data_ready' ), 10, 2 );
						add_filter( 'asp_ng_button_output_after_button', array( $this, 'ng_button_output_after_button' ), 10, 3 );
					}
					add_filter( 'asp_order_before_insert', array( $this, 'order_before_insert' ), 10, 3 );
				}
			} else {
				include_once plugin_dir_path( __FILE__ ) . 'admin/asp-apm-admin-menu.php';
				new ASPAPM_admin_menu( $this->helper );
			}
		}
	}

	public function ng_button_output_after_button( $output, $data, $class ) {
		$prefetch = $this->asp_main->get_setting( 'frontend_prefetch_scripts' );
		if ( $prefetch ) {
			if ( empty( $this->asp_main->sc_scripts_prefetched ) ) {
				if ( ! isset( $this->asp_main->footer_scripts ) ) {
					$this->asp_main->footer_scripts = '';
				}
				$this->asp_main->footer_scripts .= '<link rel="prefetch" href="' . plugins_url( '', __FILE__ ) . '/public/js/asp-apm-ng.js?ver=' . self::ADDON_VER . '" />';
			}
		}
		return $output;
	}

	public function ng_add_scripts( $scripts ) {
		if ( $this->pre_2029 ) {
			$scripts[] = array(
				'footer' => true,
				'src'    => plugins_url( '', __FILE__ ) . '/public/js/asp-apm-ng_pre_2.0.29.js?ver=' . self::ADDON_VER,
			);
		} elseif ( $this->pre_2038 ) {
			$scripts[] = array(
				'footer' => true,
				'src'    => plugins_url( '', __FILE__ ) . '/public/js/asp-apm-ng_pre_2.0.38.js?ver=' . self::ADDON_VER,
			);
		} else {
			$scripts[] = array(
				'footer' => true,
				'src'    => plugins_url( '', __FILE__ ) . '/public/js/asp-apm-ng.js?ver=' . self::ADDON_VER,
			);
		}
		return $scripts;
	}

	public function output_styles( $output ) {
		ob_start();
		if ( $this->apm_enabled ) {
			?>

<style>
.asp-payment-request-button {
	display: none;
	width: 130px;
	vertical-align: middle;
}

.asp-payment-request-button.asp-payment-request-button-default {
	width: auto;
}

.asp-payment-request-button-container {
	display: inline-block;
	width: auto;
	vertical-align: middle;
	margin-left: 5px;
}

.asp-payment-request-button-container.asp-payment-request-button-default-container {
	vertical-align: inherit;
}

@media (max-width: 500px) {
	.asp-payment-request-button-container {
		display: block;
		margin-left: 0;
		margin-top: 10px;
		text-align: center;
		width: 100%;
	}

	.asp-payment-request-button {
		margin: 0 auto;
	}
}
</style>
			<?php
		}
		$output .= ob_get_clean();
		return $output;
	}

	public function ng_after_button( $output, $data, $class ) {
		if ( ! $this->apm_enabled ) {
			return $output;
		}
		$btn_type = $this->asp_main->get_setting( 'apm_btn_type' );
		ob_start();
		?>
<style>
.asp-payment-request-button {
	display: inline-block;
	width: 200px;
	min-width: 200px;
	vertical-align: middle;
}

#apm-total-amount {
	display: none;
	margin-bottom: 7px;
}

.asp-payment-request-button.asp-payment-request-button-default {
	width: auto;
}

.asp-payment-request-button-container {
	margin-top: 5px;
	display: none;
}

.asp-payment-request-button-container.asp-payment-request-button-default-container {
	vertical-align: inherit;
}

@media screen and (max-width: 48em) {
	.asp-payment-request-button {
		width: 90%;
		margin: .7em 0 0;
	}
}
</style>
<div id="asp-payment-request-button-container" data-pm-name="APM" class="pure-u-5-5 centered asp-payment-request-button-container">
	<div id="apm-total-amount"></div>
	<div id="asp-payment-request-button" class="asp-payment-request-button">
	</div>
</div>
		<?php
		$output .= ob_get_clean();
		return $output;
	}

	public function after_button( $output, $data, $class ) {
		if ( ! $this->apm_enabled ) {
			return $output;
		}
		$btn_type = $this->asp_main->get_setting( 'apm_btn_type' );
		ob_start();
		?>
<div class="asp-payment-request-button-container<?php echo 'own' === $btn_type ? ' asp-payment-request-button-default-container' : ''; ?>">
	<div id="asp-payment-request-button-<?php echo esc_attr( $data['uniq_id'] ); ?>" class="asp-payment-request-button<?php echo 'own' === $btn_type ? ' asp-payment-request-button-default' : ''; ?>">
		<?php
		if ( 'own' === $btn_type ) {
			?>
		<button type="button" id="asp-apm-button-<?php echo esc_attr( $data['uniq_id'] ); ?>" class="apm-button <?php echo esc_attr( $class ); ?>">
			<span> <?php echo esc_html( $data['button_text'] ); ?></span>
		</button>
		<?php } ?>
	</div>
</div>
		<?php
		$output .= ob_get_clean();
		return $output;
	}

	public function ng_sub_confirm_token_customer_opts( $cust_opts ) {
		$ev_data = filter_input( INPUT_POST, 'ev_data', FILTER_SANITIZE_STRING );

		if ( empty( $ev_data ) ) {
			return $cust_opts;
		}

		$ev_data = html_entity_decode( $ev_data );
		$ev      = json_decode( $ev_data, true );

		$cust_opts['name']    = $ev['payerName'];
		$cust_opts['email']   = $ev['payerEmail'];
		$cust_opts['address'] = $ev['paymentMethod']['billing_details']['address'];

		if ( isset( $ev['shippingAddress'] ) && ! empty( $ev['shippingAddress'] ) ) {
			$cust_opts['shipping'] = array(
				'address' => array(
					'line1'       => ! empty( $ev['shippingAddress']['addressLine'][0] ) ? $ev['shippingAddress']['addressLine'][0] : null,
					'city'        => ! empty( $ev['shippingAddress']['city'] ) ? $ev['shippingAddress']['city'] : null,
					'country'     => ! empty( $ev['shippingAddress']['country'] ) ? $ev['shippingAddress']['country'] : null,
					'postal_code' => ! empty( $ev['shippingAddress']['postalCode'] ) ? $ev['shippingAddress']['postalCode'] : null,
					'state'       => ! empty( $ev['shippingAddress']['region'] ) ? $ev['shippingAddress']['region'] : null,
				),
				'name'    => ! empty( $ev['shippingAddress']['recipient'] ) ? $ev['shippingAddress']['recipient'] : null,
			);
			if ( ! empty( $ev['shippingAddress']['phone'] ) ) {
				$cust_opts['shipping']['phone'] = $ev['shippingAddress']['phone'];
			}
		}
		return $cust_opts;
	}

	public function ng_data_ready( $data, $atts ) {
		if ( $this->asp_main->get_setting( 'apm_enable_apm' ) ) {
			$plan_id = get_post_meta( $data['product_id'], 'asp_sub_plan_id', true );
			// Subscriptions addon 2.0.13+ required for recurring payments support
			// No support for subscriptions to Stripe Payments 2.0.29
			if ( ! empty( $plan_id ) && ( $this->pre_2029 || ( class_exists( 'ASPSUB_main' ) && version_compare( ASPSUB_main::ADDON_VER, '2.0.13' ) < 0 ) ) ) {
				return $data;
			}
			$addon            = array(
				'name'    => 'APM',
				'handler' => 'APMHandlerNG',
			);
			$data['addons'][] = $addon;

			if ( ! empty( $data['payment_methods'] ) ) {
				array_unshift(
					$data['payment_methods'],
					array(
						'id'           => 'APM',
						'title'        => __( 'Pay from your device', 'asp-apm' ),
						'before_title' => ' <svg id="i-mobile" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5px">
							<path d="M21 2 L11 2 C10 2 9 3 9 4 L9 28 C9 29 10 30 11 30 L21 30 C22 30 23 29 23 28 L23 4 C23 3 22 2 21 2 Z M9 5 L23 5 M9 27 L23 27" />
						</svg>',
					)
				);
			}

			add_filter( 'asp_ng_pp_after_button', array( $this, 'ng_after_button' ), 10, 3 );
			add_action( 'asp_ng_pp_output_add_scripts', array( $this, 'ng_add_scripts' ) );
		}
		return $data;
	}

	public function data_ready( $data, $atts ) {
		if ( $this->asp_main->get_setting( 'apm_enable_apm' ) ) {
			$data['apm_stripe_country']       = $this->asp_main->get_setting( 'apm_stripe_country' );
			$data['apm_btn_type']             = $this->asp_main->get_setting( 'apm_btn_type' );
			$data['apm_btn_style']            = $this->asp_main->get_setting( 'apm_btn_style' );
			$data['apm_btn_size']             = $this->asp_main->get_setting( 'apm_btn_size' );
			$data['apm_btn_type_auto_donate'] = $this->asp_main->get_setting( 'apm_btn_type_auto_donate' );
		}

		return $data;
	}

	public function register_script() {
		if ( $this->apm_enabled ) {
			wp_register_script( 'aspapm-stripe-script', 'https://js.stripe.com/v3/', array(), null, true ); //phpcs:ignore
			wp_register_script( 'aspapm-stripe-handler', plugins_url( '', __FILE__ ) . '/public/js/aspapm-script.js', array( 'stripe-handler', 'jquery' ), WP_ASP_PLUGIN_VERSION, true );
		}
	}

	public function enqueue_script() {
		if ( $this->apm_enabled ) {
			wp_enqueue_script( 'aspapm-stripe-script' );
			wp_enqueue_script( 'aspapm-stripe-handler' );
		}
	}

	public function order_before_insert( $post, $order_details, $charge_details ) {
		if ( isset( $order_details['addonName'] ) && strpos( $order_details['addonName'], 'APM' ) !== false ) {
			$post['post_title'] = '[APM]' . $post['post_title'];
		}
		// NG
		$pm = filter_input( INPUT_POST, 'asp_pm', FILTER_SANITIZE_STRING );
		if ( isset( $pm ) && ( 'APM' === $pm ) ) {
			$post['post_title'] = '[APM]' . $post['post_title'];
		}
		return $post;
	}

	public function ng_update_payment_intent() {
		$out['success'] = false;

		$ev_data = filter_input( INPUT_POST, 'ev_data', FILTER_SANITIZE_STRING );

		if ( empty( $ev_data ) ) {
			$out['err'] = 'No data provided';
			wp_send_json( $out );
		}

		$cust_id = filter_input( INPUT_POST, 'cust_id', FILTER_SANITIZE_STRING );

		$is_live = filter_input( INPUT_POST, 'is_live', FILTER_SANITIZE_NUMBER_INT );

		try {
			$ev_data = html_entity_decode( $ev_data );
			$ev      = json_decode( $ev_data, true );

			ASPMain::load_stripe_lib();
			$key = $is_live ? $this->asp_main->APISecKey : $this->asp_main->APISecKeyTest;
			\Stripe\Stripe::setApiKey( $key );

			$cust_opts = array(
				'name'    => $ev['payerName'],
				'email'   => $ev['payerEmail'],
				'address' => $ev['paymentMethod']['billing_details']['address'],
			);

			if ( isset( $ev['shippingAddress'] ) && ! empty( $ev['shippingAddress'] ) ) {
				$cust_opts['shipping'] = array(
					'address' => array(
						'line1'       => ! empty( $ev['shippingAddress']['addressLine'][0] ) ? $ev['shippingAddress']['addressLine'][0] : null,
						'city'        => ! empty( $ev['shippingAddress']['city'] ) ? $ev['shippingAddress']['city'] : null,
						'country'     => ! empty( $ev['shippingAddress']['country'] ) ? $ev['shippingAddress']['country'] : null,
						'postal_code' => ! empty( $ev['shippingAddress']['postalCode'] ) ? $ev['shippingAddress']['postalCode'] : null,
						'state'       => ! empty( $ev['shippingAddress']['region'] ) ? $ev['shippingAddress']['region'] : null,
					),
					'name'    => ! empty( $ev['shippingAddress']['recipient'] ) ? $ev['shippingAddress']['recipient'] : null,
				);
				if ( ! empty( $ev['shippingAddress']['phone'] ) ) {
					$cust_opts['shipping']['phone'] = $ev['shippingAddress']['phone'];
				}
			}

			if ( empty( $cust_id ) || 'null' === $cust_id ) { // intended string 'null'
				if ( method_exists( 'ASP_Utils', 'use_internal_api' ) && ASP_Utils::use_internal_api() ) {
					$api = ASP_Stripe_API::get_instance();
					$api->set_api_key( $key );

					$cust = $api->post( 'customers', $cust_opts );
				} else {
					$cust = \Stripe\Customer::create(
						$cust_opts
					);
				}
				$cust_id = $cust->id;
			} else {
				if ( method_exists( 'ASP_Utils', 'use_internal_api' ) && ASP_Utils::use_internal_api() ) {
					$api = ASP_Stripe_API::get_instance();
					$api->set_api_key( $key );

					$cust = $api->post( 'customers/' . $cust_id, $cust_opts );
				} else {
					\Stripe\Customer::update(
						$cust_id,
						$cust_opts
					);
				}
			}

			$pi_id = filter_input( INPUT_POST, 'pi_id', FILTER_SANITIZE_STRING );

			if ( ! empty( $pi_id ) ) {

				if ( method_exists( 'ASP_Utils', 'use_internal_api' ) && ASP_Utils::use_internal_api() ) {
					$res = $api->post(
						'payment_intents/' . $pi_id,
						array(
							'customer'       => $cust_id,
							'payment_method' => $ev['paymentMethod']['id'],
						)
					);

					if ( false === $res ) {
						$err        = $api->get_last_error();
						$out['err'] = __( 'Error occurred:', 'stripe-payments' ) . ' ' . $err['message'];
						wp_send_json( $out );
					}
				} else {
					\Stripe\PaymentIntent::update(
						$pi_id,
						array(
							'customer'       => $cust_id,
							'payment_method' => $ev['paymentMethod']['id'],
						)
					);
				}
			}
		} catch ( \Exception $e ) {
			$out['err'] = __( 'Error occurred:', 'stripe-payments' ) . ' ' . $e->getMessage();
			wp_send_json( $out );
		} catch ( \Throwable $e ) {
			$out['err'] = __( 'Error occurred:', 'stripe-payments' ) . ' ' . $e->getMessage();
			wp_send_json( $out );
		}

		$out['success'] = true;
		wp_send_json( $out );
	}

}

new ASPAPM_main();
