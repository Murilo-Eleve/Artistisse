<?php
function register_my_menu() {
    register_nav_menus(
        array(
            'main-menu' => __( 'Main Menu' ),
        )
    );
}
add_action( 'init', 'register_my_menu' );

function my_theme_enqueue_styles() {
    wp_enqueue_style( 'main-style', get_stylesheet_uri() ); // Para carregar style.css
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
?>
