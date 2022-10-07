<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Water */
?>


<div class="container-fluid site-component-container t1-container">
    <div class="row site-component-row t1-row">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
    </div>
</div>

<?php if( have_rows('water_content') ): ?>
    <?php while( have_rows('water_content') ): the_row(); ?>
        <?php get_template_part('inc/components/t1-text-group') ?>
        <?php get_template_part('inc/components/b1-table') ?>
        <?php get_template_part('inc/components/p3-map') ?>
        <?php get_template_part('inc/components/a1-accordion-faq') ?>
    <?php endwhile; ?>

<?php endif; ?>

<?php print_r(get_row('water_content')) ?>


<?php get_footer(); ?>