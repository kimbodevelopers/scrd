<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Custom Layout */
global $post;

?>

<?php get_template_part('inc/components/breadcrumb') ?>

<?php if( have_rows('custom_content') ): ?>
    <?php while( have_rows('custom_content') ): the_row(); ?>
        <?php get_template_part('inc/components/layouts/t1-text-group') ?>
        <?php get_template_part('inc/components/layouts/t3-text-group') ?>
        <?php get_template_part('inc/components/layouts/b1-table') ?>
        <?php get_template_part('inc/components/layouts/b3-table') ?>
        <?php get_template_part('inc/components/layouts/c2-cards') ?>
        <?php get_template_part('inc/components/layouts/c4-cards') ?>
		<?php get_template_part('inc/components/layouts/h1-large-banner-slide') ?>
		<?php get_template_part('inc/components/layouts/h2-small-banner') ?>
		<?php get_template_part('inc/components/layouts/h3-cta-banner') ?>
		<?php get_template_part('inc/components/layouts/h6-announcement-banner') ?>
        <?php get_template_part('inc/components/layouts/p1-picture') ?>
        <?php get_template_part('inc/components/layouts/p2-picture-text') ?>
        <?php get_template_part('inc/components/layouts/p3-map') ?>
        <?php get_template_part('inc/components/layouts/p4-video-embed') ?>
        <?php get_template_part('inc/components/layouts/p6-non-linked-cards') ?>
        <?php get_template_part('inc/components/layouts/a1-accordion-faq') ?>
		<?php get_template_part('inc/components/layouts/a6-global-wastewater') ?>
        <?php get_template_part('inc/components/layouts/f1-form') ?>
    <?php endwhile; ?>

<?php endif; ?>

<?php 
    if ( 0 == $post->post_parent ) {
        get_the_title();

        $parent_title = get_the_title();
    } else {
        $parents = get_post_ancestors( $post->ID );
        $top_parent_title = apply_filters( "the_title", get_the_title( end ( $parents ) ) );
        $direct_parent_title = get_the_title($post->post_parent);
    }
?>


<?php $parents_array = []; ?>

<?php foreach($parents as $parent) : ?>
    <?php array_push($parents_array, get_the_title($parent)); ?>
<?php endforeach; ?>

<?php foreach($parents_array as $parent) : ?>

    <?php if(strtolower($parent) === 'parks' || is_page('parks')) : ?>
        <?php get_template_part('inc/components/contacts/parks-contact') ?>
    <?php endif; ?>

    <?php if(strtolower($parent) === 'recreation' || is_page('recreation')) : ?>
        <?php get_template_part('inc/components/contacts/recreation-contact') ?>
    <?php endif; ?>

    <?php if(strtolower($parent) === 'water') : ?>
        <?php get_template_part('inc/components/contacts/water-contact') ?>
    <?php endif; ?>


    <?php if(strtolower($parent) === 'building' || is_page('building')) : ?>
        <?php get_template_part('inc/components/contacts/building-contact') ?>
    <?php endif; ?>

<?php endforeach; ?>


<?php $display_notification = get_field('display_notification'); ?>

<?php if($display_notification === 'disable') : ?>
	<style>
		.notification-bar-container {
			display: none !important;
		}
	</style>
<?php endif; ?>


<?php $display_breadcrumb = get_field('display_breadcrumb'); ?>

<?php if($display_breadcrumb === 'disable') : ?>
	<style>
		.breadcrumb-container {
			display: none !important;
		}
	</style>
<?php endif; ?>





<?php get_footer(); ?>

