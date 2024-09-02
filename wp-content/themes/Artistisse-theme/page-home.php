<?php
// Template Name: Home
get_header();
?>

<div class="home-page">
    <section class="hero-section">
        <div class="hero-image">
            <img src="<?php echo get_theme_mod('hero_image', get_template_directory_uri() . '/images/hero.png'); ?>" alt="Hero Image">
        </div>
        <div class="hero-text">
            <div class="text">
                <h2>UMA NOVA MANEIRA DE CONSUMIR <span style="color: #8883e5;">ARTE</span></h2>
                <p>Na Artistisse, acreditamos no poder da criatividade. Temos como missão, democratizar o acesso a estampas originais e de qualidade, com um preço justo e acessível!</p>
                <p>Vista-se de arte!</p>
                <h3>DESCUBRA SEU NOVO <span>ARTISTA FAVORITO!</span></h3>
            </div>
        </div>
    </section>

    <section class="artists-section">
        <div class="artists-carousel">
            <div class="artist-item">
            <img src="<?php echo get_theme_mod('artists-image', get_template_directory_uri() . '/images/Group 1.png'); ?>" alt="Hero Image">
            </div>
               
            </div>
            <div class="artist-item">
            <img src="<?php echo get_theme_mod('artists-image', get_template_directory_uri() . '/images/Group 2.png'); ?>" alt="Hero Image">

            </div>
            <div class="artist-item">
            <img src="<?php echo get_theme_mod('artists-image', get_template_directory_uri() . '/images/Group 3.png'); ?>" alt="Hero Image">
                <p>Roche</p>
            </div>
            <div class="artist-item">
            <img src="<?php echo get_theme_mod('artists-image', get_template_directory_uri() . '/images/Group 4.png'); ?>" alt="Hero Image">
            </div>
        </div>
    </section>

    <section class="style-section">
        <h4>QUAL O SEU ESTILO?</h4>
    </section>
</div>

<?php
get_footer();
?>