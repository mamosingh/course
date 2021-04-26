<?php

class ASPAPM_admin_menu {

	public $plugin_slug;
	public $ASPAdmin;
	public $stripe_countries;

	public function __construct( $helper ) {
		$this->ASPAdmin    = AcceptStripePayments_Admin::get_instance();
		$this->plugin_slug = $this->ASPAdmin->plugin_slug;
		$this->helper      = $helper;
		add_action( 'admin_init', array( $this, 'register_settings' ) );
		add_action( 'asp-settings-page-after-styles', array( $this, 'after_styles' ) );
		add_action( 'asp-settings-page-after-tabs-menu', array( $this, 'after_tabs_menu' ) );
		add_action( 'asp-settings-page-after-tabs', array( $this, 'after_tabs' ) );
		add_filter( 'asp-admin-settings-addon-field-display', array( $this, 'field_display' ), 10, 2 );
		add_filter( 'apm-admin-settings-sanitize-field', array( $this, 'sanitize_settings' ), 10, 2 );

		$this->stripe_countries = array(
			'AU' => 'Australia',
			'AT' => 'Austria',
			'BE' => 'Belgium',
			'BR' => 'Brazil',
			'CA' => 'Canada',
			'CH' => 'Switzerland',
			'DE' => 'Germany',
			'DK' => 'Denmark',
			'EE' => 'Estonia',
			'ES' => 'Spain',
			'FI' => 'Finland',
			'FR' => 'France',
			'GB' => 'United Kingdom',
			'HK' => 'Hong Kong',
			'IE' => 'Ireland',
			'IN' => 'India',
			'IT' => 'Italy',
			'JP' => 'Japan',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'LV' => 'Latvia',
			'MX' => 'Mexico',
			'NL' => 'Netherlands',
			'NZ' => 'New Zealand',
			'NO' => 'Norway',
			'PH' => 'Philippines',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'RO' => 'Romania',
			'SE' => 'Sweden',
			'SG' => 'Singapore',
			'SK' => 'Slovakia',
			'US' => 'United States',
		);
		asort( $this->stripe_countries );
	}

	function sanitize_settings( $output, $input ) {
		$output['apm_enable_apm'] = empty( $input['apm_enable_apm'] ) ? 0 : 1;

		$output['apm_btn_type_auto_donate'] = empty( $input['apm_btn_type_auto_donate'] ) ? 0 : 1;

		$output['apm_stripe_country'] = sanitize_text_field( $input['apm_stripe_country'] );

		$output['apm_btn_type'] = sanitize_text_field( $input['apm_btn_type'] );

		$output['apm_btn_style'] = sanitize_text_field( $input['apm_btn_style'] );

		$output['apm_btn_size'] = intval( $input['apm_btn_size'] );

		return $output;
	}

	private function gen_custom_dropdown( $options, $field, $field_value ) {
		$out = '<select name="AcceptStripePayments-settings[' . $field . ']">' . "\r\n";

		foreach ( $options as $key => $value ) {
			$out .= '<option value="' . $key . '"' . ( $field_value === $key ? ' selected' : '' ) . '>' . $value . '</option>' . "\r\n";
		}

		$out .= '</select>' . "\r\n";
		return $out;
	}

	function field_display( $field, $field_value ) {
		$ret = array();
		switch ( $field ) {
			case 'apm_enable_apm':
			case 'apm_btn_type_auto_donate':
				$ret['field']      = 'checkbox';
				$ret['field_name'] = $field;
				break;
			case 'apm_stripe_country':
				$ret['field']      = 'custom';
				$ret['field_name'] = $field;
				if ( empty( $field_value ) ) {
					$field_value = 'US';
				}
				$ret['field_data'] = $this->gen_custom_dropdown( $this->stripe_countries, $field, $field_value );
				break;
			case 'apm_btn_type':
				$ret['field']      = 'custom';
				$ret['field_name'] = $field;
				$ret['field_data'] = $this->gen_custom_dropdown(
					array(
						'own'     => 'Default',
						'default' => 'Stripe\'s Default',
						'donate'  => 'Stripe\'s Donate',
						'buy'     => 'Stripe\'s Buy',
					),
					$field,
					$field_value
				);
				break;
			case 'apm_btn_style':
				$ret['field']      = 'custom';
				$ret['field_name'] = $field;
				$ret['field_data'] = $this->gen_custom_dropdown(
					array(
						'dark'          => 'Dark',
						'light'         => 'Light',
						'light-outline' => 'Light-Outline',
					),
					$field,
					$field_value
				);
				break;
		}
		if ( ! empty( $ret ) ) {
			return $ret;
		} else {
			return $field;
		}
	}

	function register_settings() {
		if ( is_ssl() ) {
			$ssl_msg = '<i class="dashicons dashicons-yes" style="color:green;"></i> ' . __( 'Your website is using SSL.', 'asp-apm' );
		} else {
			$ssl_msg = '<i class="dashicons dashicons-no-alt" style="color: red;"></i> ' . __( 'Your website is not using SSL.', 'asp-apm' );
		}

		$opts = get_option( 'AcceptStripePayments-settings' );

		if ( isset( $opts['apm_domain_approved'] ) && $opts['apm_domain_approved'] === true ) {
			$domain_msg = '<i class="dashicons dashicons-yes" style="color:green;"></i> ' . __( 'Your domain seems to be approved. You can re-approve it if needed using the button below.', 'asp-apm' );
		} else {
			$domain_msg = sprintf( __( 'Plugin can attempt to do this automatically for you. Please click the button below. If this fails, you would need to do it manually. %s to read instructions.', 'asp-apm' ), '<a href="https://stripe.com/docs/stripe-js/elements/payment-request-button#verifying-your-domain-with-apple-pay" target="_blank">' . __( 'Click here', 'asp-apm' ) . '</a>' );
		}

		$autoapprove_btn  = '<span id="aspapm-msg-cont"></span>';
		$autoapprove_btn .= '<button id="aspapm-autoapprove-domain-btn" class="button">Autoapprove Domain</button>';
		add_settings_section( 'AcceptStripePayments-apm-apple-pay-section', __( 'Additional Payment Methods Settings', 'asp-apm' ), null, $this->plugin_slug . '-apm-apple-pay' );
		add_settings_field(
			'apm_enable_apm',
			__( 'Enable Additional Payment Methods', 'asp-apm' ),
			array( &$this->ASPAdmin, 'settings_field_callback' ),
			$this->plugin_slug . '-apm-apple-pay',
			'AcceptStripePayments-apm-apple-pay-section',
			array(
				'field' => 'apm_enable_apm',
				'desc'  => __( 'Enables Apple Pay, Pay with Google and Payment Request API methods.', 'asp-apm' ) .
				'<br/>' . __( 'Corresponding method is automatically detected. For example, if a user is viewing your site via Android-based device, additional button to pay using Pay with Google will be displayed.', 'asp-apm' ) .
				'<br /><br />' .
				'<b>' . __( 'Requirements:', 'asp-apm' ) . '</b> ' .
				__( 'Valid SSL certificate.', 'asp-apm' ) . '<br>' . $ssl_msg . '<br/><br/>' .
				'<b>Apple Pay:</b> ' . __( 'Before using it, you must approve you domain with Apple first.', 'asp-apm' ) .
				'<br>' . $domain_msg . '<br><br>' . $autoapprove_btn,
			)
		);
		add_settings_field(
			'apm_stripe_country',
			__( 'Stripe Account Country', 'asp-apm' ),
			array( &$this->ASPAdmin, 'settings_field_callback' ),
			$this->plugin_slug . '-apm-apple-pay',
			'AcceptStripePayments-apm-apple-pay-section',
			array(
				'field' => 'apm_stripe_country',
				'desc'  => sprintf( __( 'Select country of your Stripe account. Those are all countries currently supported by Stripe. For more details, please refer to this page: %s', 'asp-apm' ), sprintf( '<a href="https://stripe.com/global" target="_blank">%s</a>', __( 'Stripe: In your country', 'stripe_payments' ) ) ),
			)
		);

		add_settings_field(
			'apm_btn_type',
			__( 'Button Type', 'asp-apm' ),
			array( &$this->ASPAdmin, 'settings_field_callback' ),
			$this->plugin_slug . '-apm-apple-pay',
			'AcceptStripePayments-apm-apple-pay-section',
			array(
				'field' => 'apm_btn_type',
				'desc'  => __( 'Select button type.', 'stripe_payments' ),
			)
		);

		add_settings_field(
			'apm_btn_type_auto_donate',
			__( 'Auto Change to "Donate"', 'asp-apm' ),
			array( &$this->ASPAdmin, 'settings_field_callback' ),
			$this->plugin_slug . '-apm-apple-pay',
			'AcceptStripePayments-apm-apple-pay-section',
			array(
				'field' => 'apm_btn_type_auto_donate',
				'desc'  => __( 'Automatically change to "Donate" button type if product or button has variable price.', 'stripe_payments' ),
			)
		);

		add_settings_field(
			'apm_btn_style',
			__( 'Button Style', 'asp-apm' ),
			array( &$this->ASPAdmin, 'settings_field_callback' ),
			$this->plugin_slug . '-apm-apple-pay',
			'AcceptStripePayments-apm-apple-pay-section',
			array(
				'field' => 'apm_btn_style',
				'desc'  => __( 'Select button style.', 'stripe_payments' ),
			)
		);

		add_settings_field(
			'apm_btn_size',
			__( 'Button Height', 'asp-apm' ),
			array( &$this->ASPAdmin, 'settings_field_callback' ),
			$this->plugin_slug . '-apm-apple-pay',
			'AcceptStripePayments-apm-apple-pay-section',
			array(
				'field' => 'apm_btn_size',
				'size'  => 10,
				'desc'  => __( 'Enter button height in pixels.', 'stripe_payments' ),
			)
		);
	}

	function after_styles() {
		?>
<style>
.asp-apm-container p.description span {
	font-style: normal;
	background: #e3e3e3;
	padding: 2px 5px;
}

span#aspapm-msg-cont {
	clear: both;
	margin-bottom: 10px;
	padding: 5px 10px;
	display: none;
}

span#aspapm-msg-cont.error {
	background-color: #f2f2a8;
	border-left: 5px solid red;
	border-radius: 2px;
}

span#aspapm-msg-cont.success {
	background-color: #fff;
	border-left: 5px solid green;
}
</style>
		<?php
	}

	function after_tabs_menu() {
		?>
<a href="#apm" data-tab-name="apm" class="nav-tab"><?php echo __( 'Additional Payment Methods', 'asp-apm' ); ?></a>
		<?php
	}

	function after_tabs() {
		?>
<div class="wp-asp-tab-container asp-apm-container" data-tab-name="apm">
		<?php do_settings_sections( $this->plugin_slug . '-apm-apple-pay' ); ?>
</div>
<script>
jQuery(function($) {
	function asp_apm_hide_additional_fields(hide) {
		var inp1 = $('input[name="AcceptStripePayments-settings[apm_btn_type_auto_donate]"]').closest('tr');
		var inp2 = $('select[name="AcceptStripePayments-settings[apm_btn_style]"]').closest('tr');
		var inp3 = $('input[name="AcceptStripePayments-settings[apm_btn_size]"]').closest('tr');
		if (hide) {
			inp1.hide();
			inp2.hide();
			inp3.hide();
		} else {
			inp1.show();
			inp2.show();
			inp3.show();
		}
	}
	$('select[name="AcceptStripePayments-settings[apm_btn_type]"]').change(function(e) {
		if ($(this).val() === 'own') {
			asp_apm_hide_additional_fields(true);
		} else {
			asp_apm_hide_additional_fields(false);
		}
	});
	$('select[name="AcceptStripePayments-settings[apm_btn_type]"]').change();
	$('#aspapm-autoapprove-domain-btn').click(function(e) {
		e.preventDefault();
		$('#aspapm-msg-cont').css("display", "none");
		var btn = $(this);
		var btn_html = $(this).html();
		btn.html('Working...');
		btn.prop('disabled', true);
		$.ajax({
				url: ajaxurl,
				data: {
					action: 'apm_autoapprove_domain'
				}
			})
			.done(function(response) {
				console.log(response);
				if (response) {
					if (response.err_msg !== '') {
						$('#aspapm-msg-cont').removeClass('success');
						$('#aspapm-msg-cont').addClass('error');
						$('#aspapm-msg-cont').html('<b>Error occurred:</b><br>' + response.err_msg);
						$('#aspapm-msg-cont').css("display", "block");
					} else if (response.success) {
						$('#aspapm-msg-cont').removeClass('error');
						$('#aspapm-msg-cont').addClass('success');
						$('#aspapm-msg-cont').html('<b>Success!</b><br>' + response.success_msg);
						$('#aspapm-msg-cont').css("display", "block");
						btn.remove();
					}
				}
				btn.html(btn_html);
				btn.prop('disabled', false);
			})
			.fail(function(e) {
				alert('Error occurred: ' + e.statusText);
				btn.html(btn_html);
				btn.prop('disabled', false);
			});
	});
});
</script>
		<?php
	}

}
