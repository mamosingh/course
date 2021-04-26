<?php

/**
 * Salient functions and definitions.
 *
 * @package Salient
 * @since 1.0
 */
 
 
 /**
  * Define Constants.
  */
define( 'NECTAR_THEME_DIRECTORY', get_template_directory() );
define( 'NECTAR_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/nectar/' );
define( 'NECTAR_THEME_NAME', 'salient' );


if ( ! function_exists( 'get_nectar_theme_version' ) ) {
	function nectar_get_theme_version() {
		return '12.1.2';
	}
}


/**
 * Load text domain.
 */
add_action( 'after_setup_theme', 'nectar_lang_setup' );

if ( ! function_exists( 'nectar_lang_setup' ) ) {
	function nectar_lang_setup() {
		load_theme_textdomain( 'salient', get_template_directory() . '/lang' );
	}
}


/**
 * General WordPress.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/wp-general.php';


/**
 * Get Salient theme options.
 */
function get_nectar_theme_options() {

	$legacy_options  = get_option( 'salient' );
	$current_options = get_option( 'salient_redux' );

	if ( ! empty( $current_options ) ) {
		return $current_options;
	} elseif ( ! empty( $legacy_options ) ) {
		return $legacy_options;
	} else {
		return $current_options;
	}
}

$nectar_options                    = get_nectar_theme_options();
$nectar_get_template_directory_uri = get_template_directory_uri();



/**
 * Register/Enqueue theme assets.
 */
require_once NECTAR_THEME_DIRECTORY . '/includes/class-nectar-element-assets.php';
require_once NECTAR_THEME_DIRECTORY . '/includes/class-nectar-element-styles.php';
require_once NECTAR_THEME_DIRECTORY . '/includes/class-nectar-lazy.php';
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/enqueue-scripts.php';
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/enqueue-styles.php';
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/dynamic-styles.php';


/**
 * Salient Plugin notices.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/plugin-notices/salient-plugin-notices.php';


/**
 * Salient welcome page.
 */
 require_once NECTAR_THEME_DIRECTORY . '/nectar/welcome/welcome-page.php';
 

/**
 * Theme hooks & actions.
 */
function nectar_hooks_init() {
	
	require_once NECTAR_THEME_DIRECTORY . '/nectar/hooks/hooks.php';
	require_once NECTAR_THEME_DIRECTORY . '/nectar/hooks/actions.php';
	
} 

add_action( 'after_setup_theme', 'nectar_hooks_init', 10 );


/**
 * Post category meta.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/meta/category-meta.php';


/**
 * Media and theme image sizes.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/media.php';


/**
 * Navigation menus
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/assets/functions/wp-menu-custom-items/menu-item-custom-fields.php';
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/nav-menus.php';


/**
 * TGM Plugin inclusion.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/tgm-plugin-activation/class-tgm-plugin-activation.php';
require_once NECTAR_THEME_DIRECTORY . '/nectar/tgm-plugin-activation/required_plugins.php';


/**
 * WPBakery functionality.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/wpbakery-init.php';


/**
 * Theme skin specific class and assets.
 */
$nectar_theme_skin    = ( ! empty( $nectar_options['theme-skin'] ) ) ? $nectar_options['theme-skin'] : 'original';
$nectar_header_format = ( ! empty( $nectar_options['header_format'] ) ) ? $nectar_options['header_format'] : 'default';

if ( 'centered-menu-bottom-bar' === $nectar_header_format ) {
	$nectar_theme_skin = 'material';
}

add_filter( 'body_class', 'nectar_theme_skin_class' );

function nectar_theme_skin_class( $classes ) {
	global $nectar_theme_skin;
	$classes[] = $nectar_theme_skin;
	return $classes;
}


function nectar_theme_skin_css() {
	global $nectar_theme_skin;
	wp_enqueue_style( 'skin-' . $nectar_theme_skin );
}

add_action( 'wp_enqueue_scripts', 'nectar_theme_skin_css' );



/**
 * Search related.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/search.php';


/**
 * Register Widget areas.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/widget-related.php';


/**
 * Header navigation helpers.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/header.php';


/**
 * Blog helpers.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/blog.php';


/**
 * Page helpers.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/page.php';
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/footer.php';

/**
 * Theme options panel (Redux).
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/redux-salient.php';


/**
 * WordPress block editor helpers (Gutenberg).
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/gutenberg.php';


/**
 * Admin assets.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/admin-enqueue.php';


/**
 * Pagination Helpers.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/pagination.php';


/**
 * Page header.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/page-header.php';


/**
 * Third party.
 */
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/wpml.php';
require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/woocommerce.php';


/**
 * v10.5 update assist.
 */
 require_once NECTAR_THEME_DIRECTORY . '/nectar/helpers/update-assist.php';

// Change WooCommerce "Related Products" default text

add_filter('gettext', 'woocommerce_related_text', 10, 3);
add_filter('ngettext', 'woocommerce_related_text', 10, 3);
function woocommerce_related_text($translated, $text, $domain)
{
     if ($text === 'Related products' && $domain === 'woocommerce') {
         $translated = esc_html__('get inspired', $domain);
     }
     return $translated;
}


/**
 * @snippet - Display Order Delivery Date Time Picker @ WooCommerce Checkout
 */
  
// -------------------------------
// 1. Display Checkout Calendar if Shipping Selected
  
add_action( 'woocommerce_review_order_before_payment', 'silva_echo_acf_date_picker' );
  
function silva_echo_acf_date_picker( $checkout ) {
     
   echo '<div id="show-if-shipping" style="display:none"><h3>Collection Date</h3>';
     
   woocommerce_form_field( 'delivery_date', array(
        'type'          => 'text',
        'class'         => array('form-row-wide'),
        'id'            => 'datepicker',
        'required'      => false,
        'label'         => __('Book before 12pm, collect the same day.'),
        'placeholder'       => __('Click to open calendar'),
        ));
     
   echo '</div>';
     
}
  
add_action( 'woocommerce_after_checkout_form', 'silva_show_hide_calendar' );
   
function silva_show_hide_calendar( $available_gateways ) {
     
?>
  
<script type="text/javascript">

	jQuery('#datepicker').val(' ');
     
   function show_calendar( val ) {
      if ( val.match("^local_pickup") ) {
         jQuery('#show-if-shipping').fadeIn();
      } else {
         jQuery('#show-if-shipping').fadeOut();
      }   
   }
     
   jQuery(document).ajaxComplete(function() {
       var val = jQuery('input[name^="shipping_method"]:checked').val();
       show_calendar( val );
   });
     
</script>
  
<?php
     
}
  
add_action( 'woocommerce_checkout_process', 'silva_validate_new_checkout_fields' );
   
function silva_validate_new_checkout_fields() {   
     
   if ( isset( $_POST['delivery_date'] ) && empty( $_POST['delivery_date'] ) ) wc_add_notice( __( 'Please select the Collection Date' ), 'error' );
   
}
  
// -------------------------------
// 2. Load JQuery Datepicker
  
add_action( 'woocommerce_after_checkout_form', 'silva_enable_datepicker', 10 );
   
function silva_enable_datepicker() {
     
  ?>
  
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">

	<style>
	.xdsoft_datetimepicker .xdsoft_calendar td, .xdsoft_datetimepicker .xdsoft_calendar th {
		background: #FFF;
		color: #000;	
	}
	.xdsoft_datetimepicker .xdsoft_calendar td:hover {
		background: #000 !important;
		color: #FFF !important;
	}	
	.xdsoft_datetimepicker .xdsoft_calendar td:hover, .xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box >div >div:hover {
	    background: #000;
	    color: #FFF;	
	}
	.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_default, .xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_current, .xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box >div >div.xdsoft_current {
	    	background: #000;
	    	box-shadow: none;
	}

	.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box >div >div.xdsoft_current {
		color: #FFF;
	}
	.xdsoft_datetimepicker .xdsoft_calendar td.xdsoft_today {
		color: #000;
		background: #FFF;
	}
	.xdsoft_datetimepicker .xdsoft_timepicker .xdsoft_time_box >div >div:hover {
		background: #000 !important;
	}
	</style>
	  
  <?php    
     
}
  
// -------------------------------
// 3. Load Calendar Dates
  
add_action( 'woocommerce_after_checkout_form', 'silva_load_calendar_dates', 20 );
   
function silva_load_calendar_dates( $available_gateways ) {
  
   ?>
  
   <script type="text/javascript">

		var checkPastTime = function(currentDateTime) {

		var d = new Date();
		var todayDate = d.getDate();


		if (currentDateTime.getDate() == todayDate) { // check today date
		    this.setOptions({		    	
		        minTime: d.getHours() + '1:00' //here pass current time hour		        		;
		    });
		} else
		    this.setOptions({
		        minTime: false
		    });

		if(currentDateTime.getDate() == todayDate && d.getHours() >= 17) {
		    this.setOptions({		    	
		        minDate:'+1970/01/02',
		        minTime: '09:00',
		        defaultTime: '09:00'
		    });		
		}	

		};

      jQuery(document).ready(function($) {

      	jQuery.datetimepicker.setLocale('en'); 

      	var d = new Date();
		var todayDate = d.getDate();


		if(todayDate == d.getDay() + 1) {
			var ahead = d.getHours() + 1;
		} else {
			var ahead = '9';
		}

		jQuery('#datepicker').datetimepicker({
			//beforeShowDay: $.datepicker.noWeekends,
  		    format: 'd/m/Y H:i a',
  			minDate: 0, 
		    onChangeDateTime: checkPastTime,
		    onShow: checkPastTime, 
		    defaultTime: ahead + ':00',
  			step: "30",
			 allowTimes:[
			  '09:00', '09:30', '10:00', '10:30', '11:00', '11:30', '12:00', '12:30',
			  '13:00', '13:30', '14:00', '14:30', '15:00', '15:30', '16:00', '16:30', '17:00'
			 ]  			
		});      	
  
      });      
  
   </script>
  
   <?php
   
}
  
// -------------------------------
// 4. Save & show date as order meta
  
add_action( 'woocommerce_checkout_update_order_meta', 'silva_save_date_weight_order' );
  
function silva_save_date_weight_order( $order_id ) {
     
    global $woocommerce;
     
    if ( $_POST['delivery_date'] ) update_post_meta( $order_id, '_delivery_date', esc_attr( $_POST['delivery_date'] ) );
     
}
  
add_action( 'woocommerce_admin_order_data_after_billing_address', 'silva_delivery_weight_display_admin_order_meta' );
   
function silva_delivery_weight_display_admin_order_meta( $order ) {    
     
   echo '<p><strong>Collection Date:</strong> ' . get_post_meta( $order->get_id(), '_delivery_date', true ) . '</p>';
     
}


add_filter('woocommerce_thankyou_order_received_text', 'woo_change_order_received_text', 10, 2 );
function woo_change_order_received_text( $str, $order ) {
	if ($order->delivery_date) {
	    $new_str = '<p>Thank you. Your order has been received.</p>';
	    $new_str .= '<p><strong>Collection Date:</strong> ' . $order->delivery_date . '</p>';
	    return $new_str;
	}
}