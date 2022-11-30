<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Meetings */

global $post;

?>

<?php 

$meeting_years = new WP_Query(array(
    'post_type' => 'meetings',
    'posts_per_page' => -1,
    'post__status' => 'published',
    'order' => 'desc',
    'orderby' => 'title',

));

$wp_query = $meeting_years;
?>

<div class="row site-component-row">
    <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
        
    <?php endwhile; ?>
</div>


<?php get_footer(); ?>