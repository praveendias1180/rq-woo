<?php
/**
 * Plugin Name:       RQ WooCommerce Pack
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       WooCommerce Modifications by RQ.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            RQ Woo Team
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       rq-woo
 * Domain Path:       /languages
 */

global $rq_variations;

add_action( 'woocommerce_before_single_product', 'rq_before_single_product', 10 );
add_action( 'woocommerce_before_variations_form', 'rq_before_variations_form', 10 );

function rq_before_single_product(){
    global $product;
    global $rq_variations;
    $variations = $product->get_available_variations();
    $attributes = wp_list_pluck( $variations, 'attributes' );
    $rq_variations = wp_list_pluck( $attributes, 'attribute_flavor' );
    $variations_id = wp_list_pluck( $variations, 'variation_id' );
}

function rq_before_variations_form(){
    global $rq_variations;
    echo "<pre>";
    var_dump($rq_variations);
    echo "</pre>";
}