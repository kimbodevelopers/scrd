<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Agendas */

global $post;

?>


<?php 

$agenda_years = new WP_Query(array(
    'post_type' => 'agendas',
    'posts_per_page' => -1,
    'post__status' => 'published',
    'order' => 'desc',
    'orderby' => 'title',

));

$wp_query = $agenda_years;
?>



<div class="row agendas-button-row">
    <div class="col-md-6 meetings-title-column">
        <h1 class="">Meetings <?php the_title(); ?></h1>
    </div>

    <div class="col-md-6">
        <div class="dropdown">

            <button class="btn btn-secondary dropdown-toggle right-aligned"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <?php the_title(); ?>
            </button>

            <ul class="dropdown-menu dropdown-menu-end">
        

                <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

                    <li>
                        <a class="dropdown-item" href="<?php the_permalink() ?>">
                            <?php the_title() ?>
                        </a>
                    </li>
                <?php endwhile; wp_reset_postdata(); ?>
            </ul>
        </div>
    </div>
</div>

    <?php get_template_part('inc/components/a2-accordion-meetings') ?>

<?php get_footer(); ?>