<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 1.6.4
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

// Obtenha o objeto do produto global
global $product;

// Certifique-se de que o produto foi carregado corretamente
if ( ! is_a( $product, 'WC_Product' ) ) {
    $product = wc_get_product(get_the_ID());
}

if ( ! $product ) {
    // Caso não exista um produto válido, encerre a execução.
    return;
}
?>

<div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
    <div class="product-container">
        <!-- Seção de imagem do produto -->
        <div class="product-image">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             *
             * @hooked woocommerce_show_product_sale_flash - 10
             * @hooked woocommerce_show_product_images - 20
             */
            do_action( 'woocommerce_before_single_product_summary' );
            ?>
        </div>

        <!-- Seção de resumo do produto -->
        <div class="product-summary">
            <h1 class="product-title"><?php the_title(); ?></h1>
            <p class="product-price"><?php echo $product->get_price_html(); ?></p>
            
            <div class="product-variations">
                <?php
                // Exibir variações de tamanho e formato
                woocommerce_template_single_add_to_cart();
                ?>
            </div>
            
            <div class="product-buttons">
                <button class="btn-buy">COMPRAR</button>
                <button class="btn-add-to-cart">ADICIONAR À SACOLA</button>
            </div>
        </div>
    </div>

    <!-- Seção de detalhes do produto -->
    <div class="product-details">
        <div class="product-tabs">
            <!-- Características do produto -->
            <div class="product-characteristics">
                <h2>CARACTERÍSTICAS</h2>
                <p>REFERÊNCIA: <?php echo esc_html( get_post_meta( $product->get_id(), 'referencia', true ) ); ?></p>
                <p>COR: <?php echo esc_html( get_post_meta( $product->get_id(), 'cor', true ) ); ?></p>
            </div>
            <!-- Informações do produto -->
            <div class="product-info">
                <h2>INFORMAÇÕES DO PRODUTO</h2>
                <?php the_content(); ?>
            </div>
        </div>

        <!-- Seção sobre o artista -->
        <div class="product-artist">
            <h2>DESCUBRA MAIS SOBRE ESSE ARTISTA</h2>
            <div class="artist-info">
                <!-- Substitua por informações reais do artista -->
                <img src="URL_DA_IMAGEM_DO_ARTISTA" alt="Artista">
                <p>@HANDLE_DO_ARTISTA</p>
            </div>
        </div>
    </div>
</div>

<?php
do_action( 'woocommerce_after_single_product' );
get_footer( 'shop' );
?>
