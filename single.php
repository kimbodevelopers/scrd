<?php defined('ABSPATH') or die(""); ?>

<?php 
if(get_the_title() === 'Dakota Ridge') {
        header("Location: ". get_site_url() . "/" . "dakota-ridge" . "/" );
    }
?>
<?php get_header(); 
/* Template Name: Single */
global $post;

?>
<?php get_template_part('inc/components/breadcrumb') ?>
<?php get_template_part('inc/components/layouts/t1-text-group') ?>
<?php get_template_part('inc/components/partials/single-partial/single-template') ?>

<?php get_footer(); ?>