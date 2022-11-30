<!-- https://weichie.com/blog/wordpress-filter-posts-with-ajax/ -->

<?php 
    $args = array( 'taxonomy'  => 'meeting_types' ); 

    $meeting_terms = get_terms($args);
?>

<ul class="meeting-items">
    <?php foreach($meeting_terms as $meeting_term) : ?>
        <li>
            <a class="term-list_item" href="#!" data-slug="<?php echo $meeting_term->slug; ?>">
                <?php  echo $meeting_term->name; ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>


<?php 

$meeting_years = new WP_Query(array(
    'post_type' => 'meetings',
    'posts_per_page' => -1,
    'post__status' => 'published',
    'order' => 'DESC',
));

$years_array = [];

?>  

<?php while($meeting_years->have_posts()) : $meeting_years->the_post() ;
    $meeting_date = get_field('meeting_date');
    $year = date('Y', strtotime($meeting_date));
?>

    <?php if($meeting_date) : ?>

        <?php array_push($years_array, $year); ?>

    <?php endif; ?>


<?php endwhile; ?>
<?php wp_reset_query(); ?>



<?php 
    $args = array( 'taxonomy'  => 'meeting_types' ); 

    $meeting_terms = get_terms($args);
?>

<?php $all_years = array_unique($years_array); ?>

<div class="container-fluid site-component-container">

    <?php foreach($all_years as $single_year) : ?>

        <?php if($single_year) : ?>
        
            <div class="row site-component-row">
                <h2><?php echo $single_year ?></h2>
            </div>

            <div class="row site-component-row">
                <div class="accordion accordion-flush col-md-10 col-12 a2" id="accordionFlushA2-<?php echo $single_year ?>-<?php echo $meeting_term->slug ?>">

                    <?php  foreach($meeting_terms as $meeting_term) : ?>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="flush-heading-a2-<?php echo $meeting_term->slug ?>-<?php echo $single_year ?>-<?php echo $post_index; ?>">

                                <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a2-<?php echo $meeting_term->slug ?>-<?php echo $single_year ?>-<?php echo $post_index; ?>" aria-expanded="false" aria-controls="flush-collapse-a2-<?php echo $meeting_term->slug ?>-<?php echo $single_year ?>-<?php echo $post_index; ?>">
                                    <span><?php echo $meeting_term->name ?></span>
                                </button>

                            </h3>

                            <div id="flush-collapse-a2-<?php echo $meeting_term->slug ?>-<?php echo $single_year ?>-<?php echo $post_index; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-a2-<?php echo $meeting_term->slug ?>-<?php echo $single_year ?>-<?php echo $post_index; ?>" data-bs-parent="#accordionFlushA2-<?php echo $single_year ?>-<?php echo $meeting_term->slug ?>">
                                <div class="accordion-body body-text _17">
                                    
                                    <?php 
                                        $meetings = new WP_Query(array(
                                            'post_type' => 'meetings',
                                            'posts_per_page' => -1,
                                            'post__status' => 'published',
                                            'order' => 'DESC',
                                            'tax_query' => array(
                                                array(
                                                    'taxonomy' => 'meeting_types',
                                                    'field' => 'slug',
                                                    'terms' => $meeting_term->slug
                                                )
                                            )
                                        ));
                                    ?>
                    
                                    <?php $post_index = 0; while($meetings->have_posts()) : $meetings->the_post(); $post_index++;
                                        $meeting_date = get_field('meeting_date');
                                        $day = date('d', strtotime($meeting_date));
                                        $month = date("F",strtotime($meeting_date));
                                        $year = date('Y', strtotime($meeting_date));
                                    ?>             

                                        <?php if($single_year === $year) : ?>
                                            <div class="accordion-item">

                                                <h3 class="accordion-header" id="flush-heading-a2-<?php echo $post_index; ?>">

                                                    <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a2-<?php echo $post_index; ?>" aria-expanded="false" aria-controls="flush-collapse-a2-<?php echo $post_index; ?>">
                                                        <span><?php the_title(); ?></span>
                                                    </button>

                                                </h3>

                                                <div id="flush-collapse-a2-<?php echo $post_index; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-a2-<?php echo $post_index; ?>" data-bs-parent="#accordionFlushA2">
                                                    <div class="accordion-body body-text _17"><?php the_content(); ?></div>
                                                </div>
                                            </div>

                                        <?php endif; ?>

                                    <?php endwhile; ?>

                                    <?php wp_reset_query(); ?>
                            
                            
                            
                                </div>
                            </div>

                        </div>



                    <?php  endforeach; ?>

                </div>
            </div>

        <?php endif; ?>

    <?php endforeach; ?>
</div>

