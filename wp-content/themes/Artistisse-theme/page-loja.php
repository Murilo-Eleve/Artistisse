<?php
/* Template Name: Loja */
get_header();
?>

<div class="loja-page">
    <section class="products-filter-section">
        <h2>Filtrar por Categoria</h2>
        <ul class="categories-filter">
            <?php
            // Obtém todas as categorias de produto
            $terms = get_terms(array(
                'taxonomy' => 'product_cat',
                'hide_empty' => true,
            ));

            if (!empty($terms) && !is_wp_error($terms)) :
                foreach ($terms as $term) :
                    ?>
                    <li>
                        <a href="#" class="filter-category" data-category="<?php echo esc_attr($term->term_id); ?>">
                            <?php echo esc_html($term->name); ?>
                        </a>
                    </li>
                <?php
                endforeach;
            endif;
            ?>
        </ul>
    </section>

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
</div>

<?php
get_footer();
?>
