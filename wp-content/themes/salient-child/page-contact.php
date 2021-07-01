<?php
/**
 * The template for displaying pages.
 * Template Name: Contact Page
 * @package Salient WordPress Theme
 * @version 10.5
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
nectar_page_header( $post->ID );
$nectar_fp_options = nectar_get_full_page_options();

?>

    <div class="container-wrap">
        <div class="<?php if ( $nectar_fp_options['page_full_screen_rows'] !== 'on' ) { echo 'container'; } ?> main-content">
            <div class="row">

                <?php

                nectar_hook_before_content();

                if ( have_posts() ) :
                    while ( have_posts() ) :

                        the_post();
                        the_content();

                    endwhile;
                endif;

                nectar_hook_after_content();

                ?>

            </div><!--/row-->
        </div><!--/container-->
    </div><!--/container-wrap-->


    <style>
        .subtitle-product {
            font-size: 20px;
        }


        @media (max-width: 992px) {
            .subtitle-product {
                font-size: 16px;
            }
        }
    </style>

<script>
    window.addEventListener('DOMContentLoaded', function () {
        const link = findGetParameter('link');
        const name = findGetParameter('productName');

        if (link) {
            document.getElementById('interestedProduct').value = link;
        }

            console.log(name);
        if (name) {
            let title =  document.getElementById('EnquireForm').innerHTML;
            document.getElementById('EnquireForm').innerHTML = title + '<p class="subtitle-product">about ' + name + '</p>';
        }
        function findGetParameter(parameterName) {
            var result = null,
                tmp = [];
            location.search
                .substr(1)
                .split("&")
                .forEach(function (item) {
                    tmp = item.split("=");
                    if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
                });
            return result;
        }
    })
</script>
<?php get_footer(); ?>