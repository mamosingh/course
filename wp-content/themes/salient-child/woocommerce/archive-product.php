<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');
global $wp_query;
$args = array(
    'post_type' => 'product',
    'posts_per_page' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product_cat',
            'field' => 'id',
            'terms' => get_queried_object()->term_id,
        )
    ),
);
$current_products = get_posts($args);
$brands = [];
$creators = [];
$brand_ids = [];
$creator_ids = [];
foreach ($current_products as $current_product){
    $terms = wp_get_post_terms( $current_product->ID, 'product_cat' );
    $post_creators = wp_get_post_terms( $current_product->ID, 'creators' );
    foreach ($terms as $term){
        if(!in_array($term->term_id, $brand_ids) && $term->parent == 0){
            $brand_ids[] = $term->term_id;
            $brands[] = array(
                'id' => $term->term_id,
                'name' => $term->name,
            );
        }
    }
    foreach ($post_creators as $post_creator){
        if(!in_array($post_creator->term_id, $creator_ids)){
            $creator_ids[] = $post_creator->term_id;
            $creators[] = array(
                'id' => $post_creator->term_id,
                'name' => $post_creator->name,
            );
        }
    }
}

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
?>
    <header class="woocommerce-products-header">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action('woocommerce_archive_description');
        ?>
    </header>
    <form method="get" class="custom_filter">
        <?php if (isset($_GET['orderby'])): ?>
            <input type="hidden" value="<?php echo $_GET['orderby'] ?>" name="orderby">
        <?php endif;?>
        <div class="select_wrapper">
            <select name="brand">
                <option value="">Brands</option>
                <?php
                $g_brand = $_GET['brand'];
                foreach ($brands as $brand) { ?>
                    <option value="<?php echo $brand['id'] ?>" <?php echo (isset($g_brand) && $g_brand == $brand['id']) ? 'selected' : '' ?>><?php echo $brand['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="select_wrapper">
            <select name="creator">
                <option value="">Creators</option>
                <?php
                $g_creator = $_GET['creator'];
                foreach ($creators as $creator) { ?>
                    <option value="<?php echo $creator['id'] ?>" <?php echo (isset($g_creator) && $g_creator == $creator['id']) ? 'selected' : '' ?>><?php echo $creator['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <?php
        $orderby = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
            'popularity' => __( 'Sort by popularity', 'woocommerce' ),
            'date'       => __( 'Sort by newness', 'woocommerce' ),
            'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
            'price-desc' => __( 'Sort by price: high to low', 'woocommerce' )
        ) );
        ?>
        <div class="select_wrapper">
            <select name="orderby" class="orderby" aria-label="<?php esc_attr_e('Shop order', 'woocommerce'); ?>">
                <?php foreach ($catalog_orderby_options as $id => $name) : ?>
                    <option
                        value="<?php echo esc_attr($id); ?>" <?php selected($orderby, $id); ?>><?php echo esc_html($name); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <input type="hidden" name="paged" value="1"/>
    </form>
<?php
if (woocommerce_product_loop()) {

    /**
     * Hook: woocommerce_before_shop_loop.
     *
     * @hooked woocommerce_output_all_notices - 10
     * @hooked woocommerce_result_count - 20
     * @hooked woocommerce_catalog_ordering - 30
     */
    do_action('woocommerce_before_shop_loop');

    woocommerce_product_loop_start();

    if (wc_get_loop_prop('total')) {

        if (isset($_GET['brand']) && $_GET['brand'] != '' || isset($_GET['creator'])  && $_GET['creator'] != '') {
            if ($_GET['brand'] != '' && $_GET['creator'] != '') {
                $arr = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => get_queried_object()->term_id,
                    ),
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $_GET['brand'],
                    ),
                    array(
                        'taxonomy' => 'creators',
                        'field' => 'id',
                        'terms' => $_GET['creator'],
                    ),
                );
            } elseif ($_GET['brand'] != '') {
                $arr = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => get_queried_object()->term_id,
                    ),
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => $_GET['brand'],
                    )
                );
            } else {
                $arr = array(
                    'relation' => 'AND',
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'id',
                        'terms' => get_queried_object()->term_id,
                    ),
                    array(
                        'taxonomy' => 'creators',
                        'field' => 'id',
                        'terms' => $_GET['creator'],
                    )
                );
            }

            if($orderby == 'price'){
                $order_query = array(
                    'orderby'   => 'meta_value_num',
                    'meta_key'  => '_price',
                    'order' => 'asc'
                );
            }elseif ($orderby == 'price-desc'){
                $order_query = array(
                    'orderby'   => 'meta_value_num',
                    'meta_key'  => '_price',
                    'order' => 'desc'
                );
            }elseif ($orderby == 'popularity'){
                $order_query = array(
                    'orderby'   => 'meta_value_num',
                    'meta_key'  => 'total_sales',
                    'order' => 'desc'
                );
            }else{
                $order_query = array();
            }

            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 12,
                'tax_query' => $arr,
            );

            $data = array_merge($args, $order_query);

            query_posts($data);
        }

        while (have_posts()) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action('woocommerce_shop_loop');

            wc_get_template_part('content', 'product');
        }
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    if (isset($_GET['brand']) || isset($_GET['creator'])) {
        $pages = paginate_links(array(
            'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
            'format' => '?paged=%#%',
            'current' => max(1, get_query_var('paged')),
            'total' => $wp_query->max_num_pages,
            'type' => 'array',
        ));
        if (is_array($pages)) {
            $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
            echo '<nav class="woocommerce-pagination"><ul class="page-numbers">';
            foreach ($pages as $page) {
                echo "<li>$page</li>";
            }
            echo '</ul></nav>';
        }
    } else {
        do_action('woocommerce_after_shop_loop');
    }
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action('woocommerce_no_products_found');
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');

get_footer('shop');
