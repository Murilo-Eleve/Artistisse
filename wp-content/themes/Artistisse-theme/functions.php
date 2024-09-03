<?php
function my_theme_customizer_register($wp_customize) {
    // Campo para imagem da seção Hero
    $wp_customize->add_setting('hero_image', array(
        'default' => get_template_directory_uri() . '/images/hero.png',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array(
        'label' => 'Imagem Hero',
        'section' => 'title_tagline', // Você pode escolher outra seção ou criar uma nova
        'settings' => 'hero_image',
    )));

    // Campos para imagens da seção de Artistas
    for ($i = 1; $i <= 4; $i++) {
        $wp_customize->add_setting('artist_image_' . $i, array(
            'default' => get_template_directory_uri() . '/images/Group ' . $i . '.png',
            'sanitize_callback' => 'esc_url_raw'
        ));
        
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'artist_image_control_' . $i, array(
            'label' => 'Imagem Artista ' . $i,
            'section' => 'title_tagline', // Novamente, escolha a seção adequada
            'settings' => 'artist_image_' . $i,
        )));
    }
}

// Enfileirar o JS do carrossel
function enqueue_custom_carousel_script() {
    wp_enqueue_script('custom-carousel-js', get_template_directory_uri() . '/js/custom-carousel.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_carousel_script');


add_action('customize_register', 'my_theme_customizer_register');


function register_my_menus() {
    register_nav_menus(array(
        'main-menu' => __('Menu Principal', 'your-theme-textdomain'),
    ));
}
add_action('init', 'register_my_menus');


?>
