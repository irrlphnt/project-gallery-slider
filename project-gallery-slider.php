<?php
/**
 * Plugin Name: ACF Gallery Slider
 * Description: Gutenberg block that renders a Swiper slideshow from an ACF Gallery field on the “Project” post-type.
 * Author: BadApples.tech
 * Version: 1.1.0
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * License: GPL-2.0-or-later
 */

// Abort if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

add_action( 'init', 'pgs_register_block' );

// Enqueue Swiper assets for both editor and front-end when the block is present.
add_action( 'enqueue_block_assets', 'pgs_enqueue_assets' );

/**
 * Enqueue Swiper and block-specific assets.
 */
function pgs_enqueue_assets() {
    // Swiper CSS & JS via CDN.
    wp_enqueue_style( 'pgs-swiper-css', 'https://unpkg.com/swiper@10/swiper-bundle.min.css', array(), '10.0.0' );
    wp_enqueue_script( 'pgs-swiper-js', 'https://unpkg.com/swiper@10/swiper-bundle.min.js', array(), '10.0.0', true );
}
/**
 * Registers the Project Gallery Slider Gutenberg block from metadata.
 */
function pgs_register_block() {
    // The block’s metadata lives in block.json in the plugin root
    require_once __DIR__ . '/render.php';
    register_block_type( __DIR__ . '/block.json', array(
        'render_callback' => 'pgs_render_callback',
    ) );
}
