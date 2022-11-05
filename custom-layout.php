<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Custom Layout */

?>

<div class="container-fluid site-component-container">
    <div class="row site-component-row">
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
        <?php get_template_part('inc/components/p4-video-embed') ?>
        <?php get_template_part('inc/components/a1-accordion-faq') ?>

    <?php endwhile; ?>

<?php endif; ?>

<?php 
    if ( 0 == $post->post_parent ) {
        get_the_title();

        $parent_title = get_the_title();
    } else {
        $parents = get_post_ancestors( $post->ID );
        $parent_title = apply_filters( "the_title", get_the_title( end ( $parents ) ) );
    }
?>

<?php if(strtolower($parent_title) === 'parks') : ?>
    <?php get_template_part('inc/components/contacts/parks-contact') ?>
<?php endif; ?>

<?php if(strtolower($parent_title) === 'recreation') : ?>
    <?php get_template_part('inc/components/contacts/recreation-contact') ?>
<?php endif; ?>


<?php if(strtolower($parent_title) === 'water') : ?>
    <?php get_template_part('inc/components/contacts/water-contact') ?>
<?php endif; ?>




<?php get_footer(); ?>

