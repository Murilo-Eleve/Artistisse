<?php
// Template Name: Home
get_header();
?>

<div class="home-page">
    <section class="hero-section">
        <div class="hero-image">
            <img src="<?php echo esc_url(get_theme_mod('hero_image', get_template_directory_uri() . '/images/hero.png')); ?>" alt="Hero Image">
        </div>
        <div class="hero-text">
            <div class="text">
                <h2>UMA NOVA MANEIRA DE CONSUMIR <span style="color: #8883e5;">ARTE</span></h2>
                <p>Na Artistisse, acreditamos no poder da criatividade. Temos como missão democratizar o acesso a estampas originais e de qualidade, com um preço justo e acessível!</p>
                <p>Vista-se de arte!</p>
                <h3>DESCUBRA SEU NOVO</h3>
                <span class="roxo">ARTISTA FAVORITO!</span>
            </div>
        </div>
    </section>

    <section class="artists-section">
        <div class="artists-carousel">
            <div class="carousel-inner">
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_1', get_template_directory_uri() . '/images/Group 1.png')); ?>" alt="Artista 1">
                </div>
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_2', get_template_directory_uri() . '/images/Group 2.png')); ?>" alt="Artista 2">
                </div>
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_3', get_template_directory_uri() . '/images/Group 3.png')); ?>" alt="Artista 3">
                </div>
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_4', get_template_directory_uri() . '/images/Group 4.png')); ?>" alt="Artista 4">
                </div>
                <!-- Duplicar as imagens para o efeito de loop contínuo -->
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_1', get_template_directory_uri() . '/images/Group 1.png')); ?>" alt="Artista 1">
                </div>
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_2', get_template_directory_uri() . '/images/Group 2.png')); ?>" alt="Artista 2">
                </div>
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_3', get_template_directory_uri() . '/images/Group 3.png')); ?>" alt="Artista 3">
                </div>
                <div class="artist-item">
                    <img src="<?php echo esc_url(get_theme_mod('artist_image_4', get_template_directory_uri() . '/images/Group 4.png')); ?>" alt="Artista 4">
                </div>
            </div>
        </div>
        <button class="carousel-prev">‹</button>
        <button class="carousel-next">›</button>
    </section>

    <section class="style-section">
        <h4>QUAL O SEU ESTILO?</h4>
    </section>

    <div class="categories-links">
        <?php
        // Obter todas as categorias de produtos do WooCommerce
        $args = array(
            'taxonomy'   => 'product_cat',
            'orderby'    => 'name',
            'order'      => 'ASC',
            'hide_empty' => false, // Mostrar categorias mesmo sem produtos
        );

        $product_categories = get_terms($args);

        
        if (!empty($product_categories) && !is_wp_error($product_categories)) {
            foreach ($product_categories as $category) {
                ?>
                <a href="#" class="filter-category" data-category="<?php echo esc_attr($category->term_id); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
                <?php
            }
        } else {
            echo '<p>Nenhuma categoria encontrada.</p>';
        }
        ?>
    </div>

    <section class="products-section">
        <div class="products-carousel" id="products-list">
            <?php
            // Query para obter produtos
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8, // Número de produtos a exibir
                'orderby' => 'date',
                'order' => 'DESC'
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
            else : ?>
                <p>Nenhum produto encontrado.</p>
            <?php endif; ?>
        </div>
    </section>

    <section class="see-more-section">
        <a href="<?php echo esc_url(get_permalink(wc_get_page_id('shop'))); ?>" class="see-more-button">Veja Mais Produtos</a>
    </section>
</div>


<section class="static-blog-section">
    <h2 class="section-title">BLOG</h2>
    <div class="static-blog-grid">
        <div class="static-blog-item">
            <div class="static-blog-content">
                <h3><?php echo esc_html(get_theme_mod('static_blog_title_1', '5 FESTAS QUE TRANSBORDAM ARTE EM SÃO PAULO')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('static_blog_text_1', 'Explore our menu today and unlock a world of possibilities...')); ?></p>
                <a href="#" class="read-more-button">LEIA MAIS</a>
            </div>
        </div>
        <div class="static-blog-item">
            <img src="<?php echo esc_url(get_theme_mod('static_blog_image_1', get_template_directory_uri() . '/images/Images.png')); ?>" alt="Imagem Blog 1">
        </div>
        <div class="static-blog-item">
            <img src="<?php echo esc_url(get_theme_mod('static_blog_image_2', get_template_directory_uri() . '/images/blog-image2.png')); ?>" alt="Imagem Blog 2">
        </div>
        <div class="static-blog-item">
            <div class="static-blog-content">
                <h3><?php echo esc_html(get_theme_mod('static_blog_title_2', 'POR DENTRO DA MARCHA DA MACONHA 2024')); ?></h3>
                <p><?php echo esc_html(get_theme_mod('static_blog_text_2', 'Get ready to make a splash this summer with our exclusive offer!')); ?></p>
                <a href="#" class="read-more-button">LEIA MAIS</a>
            </div>
        </div>
    </div>
</section>


<?php
get_footer();
?>
