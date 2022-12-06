<?php defined('ABSPATH') or die(""); ?>

<?php get_header(); 
/* Template Name: Agendas */

global $post;

?>

<div class="container-fluid site-component-container">

    <?php 
                    
        $args = array (
            'post_type' => array('agendas'),
            'posts_per_page' => -1, 
            'hide_empty'=> 1, 
            'order' => 'ASC', 
            'post_status' => array('inherit', 'publish'),
            'orderby' => 'post_type', 
            'facetwp' => true,
        );

        $wp_query = new WP_Query( $args ); 
        
    ?>

    <div class="row site-component-row">


    

    <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
        
            <?php get_template_part('inc/components/partials/c8-cards-component') ?>
        
        <?php endwhile; ?>
    </div>
</div>
<?php get_footer(); ?>