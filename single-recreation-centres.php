<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Single Recreation Centre */
?>

<div class="container-fluid site-component-container t1-container">
    <div class="row site-component-row ">
        <?php
        if ( function_exists('yoast_breadcrumb') ) {
        yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
        }
        ?>
    </div>
</div>

<?php if( have_rows('custom_content') ): ?>
    <?php while( have_rows('custom_content') ): the_row(); ?>
        <?php get_template_part('inc/components/t1-text-group') ?>
        <?php get_template_part('inc/components/t3-text-group') ?>
        <?php get_template_part('inc/components/b1-table') ?>
        <?php get_template_part('inc/components/b3-table') ?>
        <?php get_template_part('inc/components/c4-cards') ?>
        <?php get_template_part('inc/components/h1-hero') ?>
        <?php get_template_part('inc/components/p2-picture-text') ?>
        <?php get_template_part('inc/components/p3-map') ?>
        <?php get_template_part('inc/components/a1-accordion-faq') ?>

    <?php endwhile; ?>

<?php endif; ?>

<div class="container-fluid site-component-container pt-0">
    <div class="row site-component-row">
        <div class="col-12 p-0">
            <?php get_template_part('inc/components/contacts/recreation-contact') ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>