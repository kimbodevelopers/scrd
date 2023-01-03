<?php defined('ABSPATH') or die(""); ?>

<?php get_header(); 
/* Template Name: Agendas */

global $post;

?>

<div class="container-fluid site-component-container document-library-container">


    <?php 
                    
        $args = array (
            'post_type' => array('agendas'),
            'posts_per_page' => 20, 
            'hide_empty'=> 1, 
            'order' => 'ASC', 
            'post_status' => array('inherit', 'publish'),
            'orderby' => 'post_type', 
        );

        $wp_query = new WP_Query( $args ); 
        
    ?>

    <div class="row site-component-row document-library-filter-row">

        <div class="col-12">
            <h1 class="title-text _50 dark-blue"><?php the_title() ?></h1>
        </div>

        <?php echo do_shortcode('[facetwp facet="year_issued"]') ?>
        <?php echo do_shortcode('[facetwp facet="agenda_type"]') ?>

        <div class="col-lg-3 col-md-4 col-sm-6  col-12">
            <button onclick="FWP.reset()" class="global-submit document-reset">Reset</button>
        </div>
    </div>

    <div class="row site-component-row">

        <?php while($wp_query->have_posts()) : 
            $wp_query->the_post(); 
            $post = get_post();
        ?>
            <?php get_template_part('inc/components/partials/c8-cards-component') ?>
        <?php endwhile; ?>

    </div>

    <?php if(paginate_links()) : ?>
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
    <?php endif; ?>

    <?php wp_reset_query();?>

</div>
<?php get_footer(); ?>