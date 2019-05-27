<?php
add_action( 'wp_enqueue_scripts', 'photograph_enqueue_styles' );
function photograph_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}

function tutsplus_add_posts_to_product_pages() {
     
    // check if we're in the product post type
    if( is_singular( 'aiovg_videos' ) ) {       
         
        // fetch taxonomy terms for current product
        $productterms = get_the_terms( get_the_ID(), 'aiovg_categories'  );
         
        if( $productterms ) {
             
            $producttermnames[] = 0;
                     
            foreach( $productterms as $productterm ) {  
                 
                $producttermnames[] = $productterm->name;
             
            }
             
                         
            // set up the query arguments
            $args = array (
                'post_type' => 'aiovg_videos',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'aiovg_categories',
                        'field'    => 'slug',
                        'terms'    => $producttermnames,
                    ),
                ),
            );
             
            // run the query
            $query = new WP_Query( $args ); 
 
            if( $query->have_posts() ) { ?>
                
               <section class="product-related-posts">
             
                <?php echo '<h2>' . __( 'Related Posts', 'tutsplus' ) . '</h2>'; ?>
             
                    <ul class="product-posts">
             
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                     
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                             
                        <?php endwhile; ?>
                         
                        <?php wp_reset_postdata(); ?>
                     
                    </ul>
                     
                </section>
                 
            <?php }
             
         
        }
         
    }
 
}
?>