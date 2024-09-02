<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
</head>
<body <?php body_class(); ?>>
<header class="site-header">
    <div class="container">
        <div class="logo">
            <a href="<?php echo home_url(); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="<?php bloginfo( 'name' ); ?>">
            </a>
        </div>
        <nav class="main-navigation">
            <?php
            wp_nav_menu( array(
                'theme_location' => 'main-menu',
                'container'      => false,
                'menu_class'     => 'nav-menu',
                'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            ) );
            ?>
        </nav>
        <div class="header-extras">
            <a href="<?php echo wp_login_url(); ?>" class="login-button">Entrar</a>
            <div class="logo">
            <a href="/carrinho" class="cart-icon">
                <img src="<?php echo get_template_directory_uri(); ?>/images/carrinho.png" alt="Carrinho">
            </a>
            <!-- para o woocomerce -->
            <!-- <a href=" < echo wc_get_cart_url(); ?>" class="cart-icon">
                 <img src="< echo get_template_directory_uri(); ?>/images/carrinho.png" alt="Carrinho">
            </a> -->

        </div>
        </div>
    </div>
</header>
<?php wp_footer(); ?>
</body>
</html>
