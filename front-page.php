<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Home */
?>

    <?php get_template_part('inc/components/hero') ?>

    <?php get_template_part('inc/components/popular-services'); ?>

    <?php get_template_part('inc/components/featured-parks-and-recreation') ?>

    <?php get_template_part('inc/components/featured-services') ?>

    <?php get_template_part('inc/components/latest-news') ?>

    <?php get_template_part('inc/components/current-projects') ?>

    <?php get_template_part('inc/components/get-informed-section') ?>

    <?php get_template_part('inc/components/information-notification') ?>

    <?php get_template_part('inc/components/upcoming-events-and-announcements') ?>

<?php get_footer(); ?>