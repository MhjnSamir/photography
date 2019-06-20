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

add_filter('post_gallery', 'filter_gallery', 10, 2);
function filter_gallery($output, $attr) 
{
    global $post;



    //GALLERY SETUP STARTS HERE----------------------------------------//
    if (isset($attr['orderby'])) {
        $attr['orderby'] = sanitize_sql_orderby($attr['orderby']);
        if (!$attr['orderby'])
            unset($attr['orderby']);
    }
    //print_r($attr);
    extract(shortcode_atts(array(
        'order' => 'ASC',
        'orderby' => 'menu_order ID',
        'id' => $post->ID,
        'itemtag' => 'dl',
        'icontag' => 'dt',
        'captiontag' => 'dd',
        'columns' => 2,
        'size' => 'thumbnail',
        'include' => '',
        'exclude' => ''
    ), $attr));

    $id = intval($id);
    if ('RAND' == $order) $orderby = 'none';

    if (!empty($include)) {
        $include = preg_replace('/[^0-9,]+/', '', $include);
        $_attachments = get_posts(array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby));

        $attachments = array();
        foreach ($_attachments as $key => $val) {
            $attachments[$val->ID] = $_attachments[$key];
        }
    }
    if (empty($attachments)) return '';
    //GALLERY SETUP END HERE------------------------------------------//



    //PAGINATION SETUP START HERE-------------------------------------//
    $current = (get_query_var('paged')) ? get_query_var( 'paged' ) : 1;
    $per_page = 15;
    //$offset = ($page-1) * $per_page;
    $offset = ($current-1) * $per_page;
    $big = 999999999; // need an unlikely integer


    $total = sizeof($attachments);
    $total_pages = round($total/$per_page);
    if($total_pages < ($total/$per_page))
    {   $total_pages = $total_pages+1;
    }
    //PAGINATION SETUP END HERE-------------------------------------//


    //GALLERY OUTPUT START HERE---------------------------------------//
    $output = "<div class=\"gallery-images\">\n";
    $counter = 0;
    $pos = 0;
    foreach ($attachments as $id => $attachment) 
    {   $pos++;
        //$img = wp_get_attachment_image_src($id, 'medium');
        //$img = wp_get_attachment_image_src($id, 'thumbnail');
        //$img = wp_get_attachment_image_src($id, 'full');  

        if(($counter < $per_page)&&($pos > $offset))
        {   $counter++;
            $largetitle = get_the_title($attachment->ID);
            $largeimg = wp_get_attachment_image_src($id, 'large');  
            $img = wp_get_attachment_image_src($id, array(500,200));        
            $output .= " <a href=\"{$largeimg[0]}\" data-lightbox=\"example-set\" title=\"{$largetitle}\"><img src=\"{$img[0]}\" width=\"{$img[1]}\" height=\"{$img[2]}\" alt=\"\" /></a>\n";
        }

    }  
    $output .= "<div class=\"clear\"></div>\n";
    $output .= "</div>\n";
    //GALLERY OUTPUT ENDS HERE---------------------------------------//


    //PAGINATION OUTPUT START HERE-------------------------------------//
     $output .= "<div style=\"margin:20px; background-color: #484848;\">";
    $output .= paginate_links( array(
        'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => $current,
        'total' => $total_pages,
        'prev_text'    => __('&laquo;'),
        'next_text'    => __('&raquo;')
    ) );
     $output .= "</div>\n";
    //PAGINATION OUTPUT ENDS HERE-------------------------------------//





    return $output;
}



