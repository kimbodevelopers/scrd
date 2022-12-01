<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Recreation */

global $post;

?>


<div class="container-fluid large-cards-container site-component-container">


    <div class="row site-component-row">
        <h2 class="title-text _50 col-12"><?php the_title() ?></h2>
    </div>


    <?php 

        $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;
        if( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $recreation_posts = new WP_Query(array(
            'post_type' => 'recreation-centres',
            'posts_per_page' => 9,
            'post__status' => 'published',
            'order' => 'asc',
            'orderby' => 'title',

        ));

        $wp_query = $recreation_posts;
    ?>   


    <div class="row site-component-row large-cards-row">


        <?php $posts_array_count = count($recreation_posts->posts) ?>

        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php get_template_part('inc/components/large-card') ?>
        <?php endwhile; ?>

        <?php wp_reset_query(); ?>
    </div>

    

    

    

</div>

<?php if(get_field('linked_cards')) : ?>
    <div class="container-fluid featured-services-container site-component-container">
        <div class="row site-component-row featured-services-row">
            <?php while(have_rows('linked_cards')) : the_row(); 
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $link = get_sub_field('link');
                $snippet = get_sub_field('snippet');
            ?>
                <div class="col-lg-3 col-md-4 featured-services-column">
                    <a <?php if($link) : ?>href="<?php echo $link ?>" target="__blank"<?php endif; ?> >
                        <div class="featured-services-wrapper">
                            <div class="title-icon">
                                <h3 class="body-text _20"><?php echo $title ?></h3>
                                <div class="icon-wrapper"><?php echo $icon ?></div>
                            </div>

                            <p class="body-text _17"><?php echo $snippet; ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>
<?php get_footer(); ?>