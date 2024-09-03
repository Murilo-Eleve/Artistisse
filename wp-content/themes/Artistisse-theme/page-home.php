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
                <p>Na Artistisse, acreditamos no poder da criatividade. Temos como missão, democratizar o acesso a estampas originais e de qualidade, com um preço justo e acessível!</p>
                <p>Vista-se de arte!</p>
                <h3>DESCUBRA SEU NOVO</h3>
                <span class ="roxo">ARTISTA FAVORITO!</span>
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
        <h4>QUAL O SEU ESTILO? xx</h4>
    </section>
    <section class="products-section">
        <h2>Nossos Produtos</h2>
        <?php
        // Query para obter produtos
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => 8, // Número de produtos a exibir
            'orderby' => 'date',
            'order' => 'DESC'
        );
        $query = new WP_Query($args);

        if ($query->have_posts()) : ?>
            <div class="products-carousel">
                <?php while ($query->have_posts()) : $query->the_post(); ?>
                    <div class="product-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium'); ?>
                            <?php endif; ?>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo wc_price(wc_get_price_to_display(get_product())); ?></p>
                        </a>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p>Nenhum produto encontrado.</p>
        <?php endif; ?>
    </section>
</div>

<?php
get_footer();
?>
