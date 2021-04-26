<?php
/**
 * Plugin Name: Stripe Payments Addons Update Checker
 * Plugin URI: https://s-plugins.com/
 * Description: Checks for Stripe Payments add-ons updates.
 * Version: 1.0.0
 * Author: Tips and Tricks HQ, alexanderfoxc
 * Author URI: https://s-plugins.com/
 * License: GPL2
 */
class ASP_Addons_Update_Checker {

	public $helper;
	public $file            = __FILE__;
	public $MIN_ASP_VER     = '2.0.41t1';
	public $SLUG            = 'stripe-payments-addons-update-checker';
	public $ADDON_FULL_NAME = 'Stripe Payments Addons Update Checker';

	public function __construct() {
		add_action( 'plugins_loaded', array( $this, 'plugins_loaded' ) );
	}

	public function plugins_loaded() {
		if ( class_exists( 'AcceptStripePayments' ) ) {
			$this->asp_main = AcceptStripePayments::get_instance();
			$this->helper   = new ASP_Addons_Helper( $this );
			if ( $this->helper->check_ver() ) {
				$this->helper->init_tasks();
			};
		}
	}

	public static function set_request_options( $options ) {
		$options['timeout'] = 5;
		return $options;
	}

	public static function check_updates( $slug, $file ) {
		if ( ! class_exists( 'Puc_v4_Factory' ) ) {
			require_once  plugin_dir_path( __FILE__ ) . '/lib/plugin-update-checker/plugin-update-checker.php';
		}
		// change timeout from default 10 seconds to 5
		add_filter( 'puc_request_info_options-' . $slug, array( 'ASP_Addons_Update_Checker', 'set_request_options' ) );
		Puc_v4_Factory::buildUpdateChecker(
			'https://s-plugins.com/updates/?action=get_metadata&slug=' . $slug,
			$file,
			$slug
		);
	}

}

new ASP_Addons_Update_Checker();
