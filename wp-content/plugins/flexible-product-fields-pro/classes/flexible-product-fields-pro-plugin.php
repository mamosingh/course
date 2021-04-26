<?php

/**
 * Class Flexible_Product_Fields_PRO_Plugin
 */
class Flexible_Product_Fields_PRO_Plugin extends \FPFProVendor\WPDesk\PluginBuilder\Plugin\AbstractPlugin {

	/**
	 * Scripts version string.
	 *
	 * @var string
	 */
	private $script_version = '9';

	/**
	 * Flexible_Product_Fields_PRO_Plugin constructor.
	 *
	 * @param FPFProVendor\WPDesk_Plugin_Info $plugin_info Plugin data.
	 */
	public function __construct( FPFProVendor\WPDesk_Plugin_Info $plugin_info ) {
		$this->plugin_info = $plugin_info;
		parent::__construct( $this->plugin_info );
	}

	/**
	 * Init base variables for plugin
	 */
	public function init_base_variables() {
		$this->plugin_url = $this->plugin_info->get_plugin_url();

		$this->plugin_path = $this->plugin_info->get_plugin_dir();
		$this->template_path = $this->plugin_info->get_text_domain();

		$this->plugin_text_domain = $this->plugin_info->get_text_domain();
		$this->plugin_namespace = $this->plugin_info->get_text_domain();
		$this->template_path = $this->plugin_info->get_text_domain();
		$this->default_settings_tab = 'main';

		$this->settings_url = admin_url( 'edit.php?post_type=fpf_fields' );

		$this->default_view_args = array(
			'plugin_url' => $this->get_plugin_url()
		);
	}


	/**
	 * Initialize plugin
	 */
	public function init() {
		parent::init();
		$this->fpf_pro = new FPF_PRO( $this );
		$duplicate     = new FPF_PRO_Duplicate( $this );
		$duplicate->hooks();
	}

	/**
	 * Enqueue scripts
	 */
	public function wp_enqueue_scripts() {
		if ( ! defined( 'WC_VERSION' ) ) {
			return;
		}
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		if ( is_product() ) {
			wp_enqueue_style( 'jquery-ui-style', '//ajax.googleapis.com/ajax/libs/jqueryui/' . '1.9.2' . '/themes/smoothness/jquery-ui.css' );

			wp_enqueue_script( 'jquery' );
			wp_enqueue_script( 'jquery-ui' );
			wp_enqueue_script( 'jquery-ui-datepicker' );
			add_action( 'wp_enqueue_scripts', array( $this, 'wp_localize_jquery_ui_datepicker' ), 1000 );

			wp_enqueue_script( 'flexible_product_fields_front_js', trailingslashit( $this->get_plugin_assets_url() ) . '/js/front.js', array( 'jquery' ), $this->script_version );
		}
	}

	public function wp_localize_jquery_ui_datepicker() {
		global $wp_locale;
		global $wp_version;

		if ( ! wp_script_is( 'jquery-ui-datepicker', 'enqueued' ) || version_compare( $wp_version, '4.6' ) != -1 ) {
			return;
		}

		// Convert the PHP date format into jQuery UI's format.
		$datepicker_date_format = str_replace(
			array(
				'd', 'j', 'l', 'z', // Day.
				'F', 'M', 'n', 'm', // Month.
				'Y', 'y'            // Year.
			),
			array(
				'dd', 'd', 'DD', 'o',
				'MM', 'M', 'm', 'mm',
				'yy', 'y',
			),
			get_option( 'date_format' )
		);

		$datepicker_defaults = wp_json_encode( array(
			'closeText'       => __( 'Close' ),
			'currentText'     => __( 'Today' ),
			'monthNames'      => array_values( $wp_locale->month ),
			'monthNamesShort' => array_values( $wp_locale->month_abbrev ),
			'nextText'        => __( 'Next' ),
			'prevText'        => __( 'Previous' ),
			'dayNames'        => array_values( $wp_locale->weekday ),
			'dayNamesShort'   => array_values( $wp_locale->weekday_abbrev ),
			'dayNamesMin'     => array_values( $wp_locale->weekday_initial ),
			'dateFormat'      => $datepicker_date_format,
			'firstDay'        => absint( get_option( 'start_of_week' ) ),
			'isRTL'           => $wp_locale->is_rtl(),
		) );

		wp_add_inline_script( 'jquery-ui-datepicker', "jQuery(document).ready(function(jQuery){jQuery.datepicker.setDefaults({$datepicker_defaults});});" );
	}

	public function links_filter( $links ) {
		$pl = get_locale() === 'pl_PL';
		$domain = $pl ? 'pl' : 'net';
		$utm_source = $this->plugin_info->get_text_domain();
		$utm_medium = 'quick-link';

		$plugin_links = array();
		$plugin_links[] = '<a href="' . $this->settings_url . '">' . __( 'Settings', 'flexible-product-fields-pro' ) . '</a>';
		$plugin_links[] = '<a href="https://www.wpdesk.' . $domain . '/docs/flexible-product-fields-woocommerce/?utm_source=' . $utm_source . '&utm_medium=' . $utm_medium . '&utm_campaign=docs-quick-link" target="_blank">' . __( 'Docs', 'flexible-product-fields-pro' ) . '</a>';
		$plugin_links[] = '<a href="https://www.wpdesk.' . $domain . '/support/" target="_blank">' . __( 'Support', 'flexible-product-fields-pro' ) . '</a>';

		return array_merge( $plugin_links, $links );
	}
}

