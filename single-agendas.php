<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Agendas */

global $post;
date_default_timezone_set('America/Los_Angeles');
?>

<?php $post = $wp_query->post; 
        $post_id = get_queried_object_id();
    ?>

    <?php 
    $agenda_single = new WP_Query(array(
        'post_type' => 'agendas',
        'posts_per_page' => -1,
        'post__status' => 'published',
        'order' => 'desc',
        'orderby' => 'title',
        'p' => $post_id,

    ));

    $wp_query = $agenda_single;
    ?>

    <?php 

    $agenda_years = new WP_Query(array(
        'post_type' => 'agendas',
        'posts_per_page' => -1,
        'post__status' => 'published',
        'order' => 'desc',
        'orderby' => 'title',

    ));

    $wp_query_years = $agenda_years;
    ?>

    <?php $post_id = get_the_ID();
            $agenda_types = get_field('agenda_type');
    ?>

    <?php $agenda_array = []; ?>

    <?php foreach($agenda_types as $agenda_type) : ?>
        <?php foreach($agenda_type['agenda'] as $agenda) : ?>
            <?php array_push($agenda_array, $agenda['date']); ?>

        <?php endforeach; ?>
    <?php endforeach; ?>

    <?php get_template_part('inc/components/upcoming-meetings') ?>

    <div class="container-fluid site-component-container">
        <div class="row site-component-row agendas-button-row">
            <div class="col-md-6 meetings-title-column">
                <h1 class="title-text _33">Meetings <?php the_title(); ?></h1>
            </div>

            <div class="col-md-6 meetings-dropdown-column">
                <div class="dropdown">

                    <button class="btn dropdown-toggle right-aligned"  type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?php the_title(); ?>&nbsp;
             
                            <span>
                                (<?php echo count($agenda_array) ?>)
                            </span>
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end">
                

                        <?php while($wp_query_years->have_posts()) : $wp_query_years->the_post(); ?>

                            <li>
                                <a class="dropdown-item" href="<?php the_permalink() ?>">
                                    <?php the_title() ?>
                                </a>
                            </li>
                        <?php endwhile; wp_reset_query(); ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <?php get_template_part('inc/components/a2-accordion-meetings') ?>


<?php get_footer(); ?>