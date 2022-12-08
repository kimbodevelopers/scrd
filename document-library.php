<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Document Library */

global $post;

?>
    <div class="container-fluid large-cards-container site-component-container document-library-container">

    
        <div class="row site-component-row document-library-filter-row">

            <div class="col-12">
                <h1 class="title-text _50"><?php the_title() ?></h1>
            </div>

            <?php echo do_shortcode('[facetwp facet="search_repository"]') ?>
            <?php echo do_shortcode('[facetwp facet="type"]') ?>
            <?php echo do_shortcode('[facetwp facet="bylaw_type"]') ?>
            <?php echo do_shortcode('[facetwp facet="year_issued"]') ?>
            <?php echo do_shortcode('[facetwp facet="water_test_types"]') ?>
            <div class="col-lg-3 col-md-4 col-sm-6  col-12">
                <button onclick="FWP.reset()" class="global-submit document-reset">Reset</button>
            </div>
        </div>

    
        <div class="row site-component-row">


                <?php 
                global $wp_query; 

                    $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;

                    if( get_query_var('paged') ) {
                        $paged = get_query_var('paged');
                    } elseif (get_query_var('page')) {
                        $paged = get_query_var('page');
                    } else {
                        $paged = 1;
                    }



                    add_filter( 'posts_where' , 'remove_images' );

                    function remove_images($where) {
                        global $wpdb;
                        $where.=' AND '.$wpdb->posts.'.post_mime_type NOT LIKE \'image/%\'';
                        return $where;
                    }
                 
                    $all_posts_args = array (
                        'post_type' => array(
                            'bylaws', 
                            'area-map', 
                            'annual-reports', 
                            'agendas', 
                            'board-minutes', 
                            'water-quality-report', 
                            'ocp',
                            'bid-opportunities', 
                            'bid-results',  
                            'swmp',
                            'attachment'
                        ),
                        'posts_per_page' => 16, 
                        'hide_empty'=> 1, 
                        'paged' => $paged,
                        'order' => 'ASC', 
                        'post_status' => array('inherit', 'publish'),
                        'orderby' => 'post_type', 
                        'facetwp' => true,
                    );
                    
                ?>


            <?php 
        
            $wp_query = new WP_Query( $all_posts_args ); 
            
            ?>


            <?php if ( $wp_query->have_posts() ): ?>


                <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>

                    <?php get_template_part('inc/components/partials/c8-cards-component') ?>

                <?php endwhile; ?>



                <div class="row pagination-row site-component-row mt-5 mb-5">
                    <div class="col-12 text-center">
                        <div class="pagination-wrapper">
                            <?php echo paginate_links(array(
                                'next_text' => '<span class="paginate-icon next-icon"><i class="fa-solid fa-chevron-right"></i></span>',
                                'prev_text' => '<span class="paginate-icon prev-icon"><i class="fa-solid fa-chevron-left"></i></span>'
                            )); ?>
                        </div>
                    </div>
                </div>

                <?php wp_reset_query();?>


            <?php endif; ?>

                
            

                


        </div>

    </div>
<?php get_footer(); ?>