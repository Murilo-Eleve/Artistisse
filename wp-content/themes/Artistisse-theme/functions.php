\<?php
function my_theme_customizer_register($wp_customize) {
    // Campo para imagem da seção Hero
    $wp_customize->add_setting('hero_image', array(
        'default' => get_template_directory_uri() . '/images/hero.png',
        'sanitize_callback' => 'esc_url_raw'
    ));
    
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image_control', array(
        'label' => 'Imagem Hero',
        'section' => 'title_tagline',
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
            'section' => 'title_tagline',
            'settings' => 'artist_image_' . $i,
        )));
    }
}
add_action('customize_register', 'my_theme_customizer_register');

function register_my_menus() {
    register_nav_menus(array(
        'main-menu' => __('Menu Principal', 'your-theme-textdomain'),
    ));
}
add_action('init', 'register_my_menus');

function enqueue_custom_scripts_and_styles() {
    // Enfileirar o JS do carrossel
    wp_enqueue_script('custom-carousel-js', get_template_directory_uri() . '/js/custom-carousel.js', array(), null, true);

    // Enfileirar o JavaScript do filtro de produtos
    wp_enqueue_script('filter-products-ajax', get_template_directory_uri() . '/js/filter-products.js', array('jquery'), null, true);
    wp_localize_script('filter-products-ajax', 'ajax_params', array(
        'ajax_url' => admin_url('admin-ajax.php')
    ));
    
    // Enfileirar estilos específicos para as páginas
    if (is_page_template('page-loja.php')) {
        wp_enqueue_style('loja-style', get_template_directory_uri() . '/loja.css', array(), '1.0', 'all');
    }

    if (is_product()) {
        wp_enqueue_style('product-style', get_template_directory_uri() . '/product.css', array(), '1.0', 'all');
    }

}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts_and_styles');

function filter_products_by_category() {
    // Verifica se a categoria foi enviada via AJAX
    if (isset($_POST['category_id'])) {
        $category_id = intval($_POST['category_id']);
        
        // Define os argumentos para a query de produtos
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $category_id,
                ),
            ),
        );

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <div class="product-item">
                    <a href="<?php the_permalink(); ?>">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('medium'); ?>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo wc_price(wc_get_price_to_display(get_product())); ?></p>
                    </a>
                </div>
            <?php endwhile;
            wp_reset_postdata();
        else :
            echo '<p>Nenhum produto encontrado.</p>';
        endif;
    }

    wp_die(); // Encerra a execução do script após o AJAX
}
add_action('wp_ajax_filter_products', 'filter_products_by_category');
add_action('wp_ajax_nopriv_filter_products', 'filter_products_by_category');


function customize_static_blog_section($wp_customize) {
    // Seção personalizada no Customizer
    $wp_customize->add_section('static_blog_section', array(
        'title' => __('Seção de Blog Estática', 'theme_textdomain'),
        'priority' => 30,
    ));

    // Imagem 1
    $wp_customize->add_setting('static_blog_image_1', array(
        'default' => get_template_directory_uri() . '/images/Images.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'static_blog_image_1', array(
        'label' => __('Imagem do Blog 1', 'theme_textdomain'),
        'section' => 'static_blog_section',
        'settings' => 'static_blog_image_1',
    )));

    // Imagem 2
    $wp_customize->add_setting('static_blog_image_2', array(
        'default' => get_template_directory_uri() . '/images/blog-image2.png',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'static_blog_image_2', array(
        'label' => __('Imagem do Blog 2', 'theme_textdomain'),
        'section' => 'static_blog_section',
        'settings' => 'static_blog_image_2',
    )));

    // Título 1
    $wp_customize->add_setting('static_blog_title_1', array(
        'default' => '5 FESTAS QUE TRANSBORDAM ARTE EM SÃO PAULO',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('static_blog_title_1', array(
        'label' => __('Título do Blog 1', 'theme_textdomain'),
        'section' => 'static_blog_section',
        'type' => 'text',
    ));

    // Texto 1
    $wp_customize->add_setting('static_blog_text_1', array(
        'default' => 'Explore our menu today and unlock a world of possibilities...',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('static_blog_text_1', array(
        'label' => __('Texto do Blog 1', 'theme_textdomain'),
        'section' => 'static_blog_section',
        'type' => 'textarea',
    ));

    // Título 2
    $wp_customize->add_setting('static_blog_title_2', array(
        'default' => 'POR DENTRO DA MARCHA DA MACONHA 2024',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('static_blog_title_2', array(
        'label' => __('Título do Blog 2', 'theme_textdomain'),
        'section' => 'static_blog_section',
        'type' => 'text',
    ));

    // Texto 2
    $wp_customize->add_setting('static_blog_text_2', array(
        'default' => 'Get ready to make a splash this summer with our exclusive offer!',
        'sanitize_callback' => 'sanitize_textarea_field',
    ));
    $wp_customize->add_control('static_blog_text_2', array(
        'label' => __('Texto do Blog 2', 'theme_textdomain'),
        'section' => 'static_blog_section',
        'type' => 'textarea',
    ));
}
add_action('customize_register', 'customize_static_blog_section');



?>
