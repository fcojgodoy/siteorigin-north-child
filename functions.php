<?php

/**
 * Loads the child theme styles.
 */
add_action( 'wp_enqueue_scripts', 'parenttheme_enqueue_styles' );
function parenttheme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}


/**
 * Loads the child theme textdomain.
 */
function wpdocs_child_theme_setup() {
    load_child_theme_textdomain( 'siteorigin-north', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'wpdocs_child_theme_setup' );

?>
