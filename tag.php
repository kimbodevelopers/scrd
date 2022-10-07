<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Tag */
?>


<div class="container-fluid large-cards-container site-component-container">
    <div class="row site-component-row">
        <h2 class="title-text _50 col-12"><?php the_title() ?></h2>
    </div>

    <?php while ( have_posts() ) : the_post(); ?>

    <article class="<?php post_class(); ?>">
        <h1><?php the_title(); ?></h1>
        <div class="post-content">
            <?php the_content(); ?>
        </div>
        <a href="<?php the_permalink(); ?>">Read more</a>
    </article>
<?php endwhile; // end of the loop. ?>


    <?php 
        $park_posts = new WP_Query(array(
            'post_type' => 'parks',
            'posts_per_page' => 9,
            'post__status' => 'published',
            'order' => 'DESC',
        ));

        $wp_query = $park_posts;
    ?>


    <div class="row site-component-row large-cards-row">

        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php get_template_part('inc/components/large-card') ?>
        <?php endwhile; ?>

    </div>

</div>
<?php get_footer(); ?>