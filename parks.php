<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Parks */

global $post;

?>


<div class="container-fluid large-cards-container site-component-container">
    <div class="row site-component-row">
        <h2 class="title-text _50 col-12"><?php the_title() ?></h2>
    </div>

    <?php $park_types = get_terms(array(
        'taxonomy' => 'park_type',
        'hide_empty' => true,
    )); 
    
    $submitted_park_types = [];

    if(isset($_POST['submit'])){

        if(!empty($_POST['park_type'])) {

            foreach($_POST['park_type'] as $value){
                $submitted_park_types[] = $value;
            }
        }

        if(empty($_POST['park_type'])) {

            foreach($park_types as $park_type) {
                $submitted_park_types[] = $park_type->slug;
            }
        }
    }

    if(isset($_POST['reset'])){
        if(!empty($_POST['reset'])) {
            foreach($park_types as $park_type) {
                $submitted_park_types[] = $park_type->slug;
            }
        }
    }
    
    ?>


	
    <div  class="row site-component-row">
        <form method="post" action="" class="parks-filter">

            <?php if(isset($_POST['park_type'])) : ?>
                <?php $post_array = $_POST['park_type'] ?>

            <?php else : ?>
                <?php $post_array = []; ?>
            <?php endif; ?>

            <?php foreach($park_types as $park_type) : ?>
                <label for="<?php echo $park_type->slug ?>"><?php echo $park_type->name ?></label>
                <input type="checkbox" name="park_type[]" value="<?php echo $park_type->slug ?>" <?php if(in_array($park_type->slug, $post_array )) : ?>checked='checked'<?php else: ?><?php endif; ?>/>

                <br>

            <?php endforeach; ?>

            <input type="submit" value="Submit" name="submit">
            <input class="reset-filter" type="submit" value="Reset" name="reset">
        </form>

        <script>
        $('.reset-filter').on('click', function() {
            $('.parks-filter input[type=checkbox]').prop('checked', false)
        })
        </script>

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




        $park_posts = new WP_Query(array(
            'post_type' => 'parks',
            'posts_per_page' => 9,
            'post__status' => 'published',
            'order' => 'asc',
            'orderby' => 'title',
            'paged' => $paged,
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'park_type',
                    'field' => 'slug',
                    'terms' => $submitted_park_types
                ),

                // array(
                //     'taxonomy' => 'area',
                //     'field'    => 'slug',
                //     'terms'    => array('area-a'),
                // ),
            

            )
        ));

        $wp_query = $park_posts;
    ?>    

    <div class="row site-component-row large-cards-row">

        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php get_template_part('inc/components/large-card') ?>
        <?php endwhile; ?>

    </div>


    <div class="row pagination-row site-component-row">
        <div class="col-12 text-center">
            <div class="pagination-wrapper">
                <?php echo paginate_links(array(
                    'next_text' => '<span class="paginate-icon next-icon"><i class="fa-solid fa-chevron-right"></i></span>',
                    'prev_text' => '<span class="paginate-icon prev-icon"><i class="fa-solid fa-chevron-left"></i></span>'
                )); ?>
            </div>
        </div>
    </div>

</div>
<?php get_footer(); ?>