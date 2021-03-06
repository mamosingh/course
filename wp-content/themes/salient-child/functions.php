<?php

add_action( 'wp_enqueue_scripts', 'salient_child_enqueue_styles', 100);

function salient_child_enqueue_styles() {

    $nectar_theme_version = nectar_get_theme_version();
    wp_enqueue_style( 'salient-child-style', get_stylesheet_directory_uri() . '/style.css', '', $nectar_theme_version );

    if ( is_rtl() ) {
   		wp_enqueue_style(  'salient-rtl',  get_template_directory_uri(). '/rtl.css', array(), '1', 'screen' );
    }

    wp_enqueue_style('child-selectric', 'https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/selectric.css');
    wp_enqueue_script('child-selectric', 'https://cdn.jsdelivr.net/npm/selectric@1.13.0/public/jquery.selectric.min.js');
    wp_enqueue_script('child-custom', get_stylesheet_directory_uri() . '/assets/js/child_custom.js');
}

/**
 * Disable Comments
 */

 // Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
	$post_types = get_post_types();
	foreach ($post_types as $post_type) {
		if(post_type_supports($post_type, 'comments')) {
			remove_post_type_support($post_type, 'comments');
			remove_post_type_support($post_type, 'trackbacks');
		}
	}
}
add_action('admin_init', 'df_disable_comments_post_types_support');

// Close comments on the front-end
function df_disable_comments_status() {
	return false;
}
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);

// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
	$comments = array();
	return $comments;
}
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);

// Remove comments page in menu
function df_disable_comments_admin_menu() {
	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'df_disable_comments_admin_menu');

// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
	global $pagenow;
	if ($pagenow === 'edit-comments.php') {
		wp_redirect(admin_url()); exit;
	}
}
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');

// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
	remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'df_disable_comments_dashboard');

// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
	if (is_admin_bar_showing()) {
		remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60);
	}
}
add_action('init', 'df_disable_comments_admin_bar');



// New Tab contents / Materials
add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tabs' );
function woo_custom_product_tabs( $tabs ) {
    //Attribute materials tab
    global $post;
    $materialfield = get_post_meta($post->ID, 'material_description', true);
    if (!empty($materialfield)) {
        $tabs['attrib_materials_tab'] = array(
            'title'     => __( 'Materials', 'woocommerce' ),
            'priority'  => 10,
            'callback'  => 'woo_attrib_materials_tab_content'
        );
    }
    return $tabs;
}
// Showing the content
function woo_attrib_materials_tab_content() {
	global $post;
    $content = apply_filters('the_content', get_post_meta($post->ID,'material_description', true));
    echo'<div class="material-description-inner">'.$content.'</div>';

}

function wpse_add_custom_meta_box_2() {
   add_meta_box(
       'material_description',
       'Material description',
       'material_description_meta_box',
       'product',
       'normal',
       'high'
   );
}
add_action('add_meta_boxes', 'wpse_add_custom_meta_box_2');
// Adding meta box / Rich editor
function material_description_meta_box() {
    global $post;
    wp_nonce_field( basename( __FILE__ ), 'wpse_our_nonce' );
	$meta = get_post_meta($post->ID, 'material_description', true);
    wp_editor( $meta, 'content-id', array( 'textarea_name' => 'material_description' ) );
}
// Save editor changes
function save_wp_editor_fields(){
    global $post;
    update_post_meta($post->ID, 'material_description', $_POST['material_description']);
}
add_action( 'save_post', 'save_wp_editor_fields' );
// Rename product data tabs
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {
    $tabs['additional_information']['title'] = __( 'Delivery information' );
    return $tabs;
}
add_filter( 'woocommerce_product_additional_information_heading', 'misha_additional_info_heading' );
function misha_additional_info_heading( $heading ){
    return 'Delivery information';
}

/* Filter by brand and creators */

function creators_taxonomy() {

  $labels = array(
    'name' => _x( 'Creators', 'taxonomy general name' ),
    'singular_name' => _x( 'Creator', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Creators' ),
    'all_items' => __( 'All Creators' ),
    'parent_item' => __( 'Parent Creator' ),
    'parent_item_colon' => __( 'Parent Creator:' ),
    'edit_item' => __( 'Edit Creator' ),
    'update_item' => __( 'Update Creator' ),
    'add_new_item' => __( 'Add New Creator' ),
    'new_item_name' => __( 'New Creator Name' ),
    'menu_name' => __( 'Creators' ),
  );

  register_taxonomy('creators',array('product'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'creator' ),
  ));

}
add_action( 'init', 'creators_taxonomy', 0 );
