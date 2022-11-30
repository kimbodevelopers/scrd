<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Minutes */

global $post;

?>

<div class="container-fluid site-component-container minutes-container">
    <div class="row site-component-row">
        <div class="col-12 ">
            <h1 class="title-text _33 col-12 minutes-title"><?php the_title() ?></h1>
        </div>
    </div>

    <?php if(get_field('minutes_content')) : ?>
        <div class="container-fluid site-component-container t1-container">
            <div class="row site-component-row t1-row">
                <div class="col-12 t1-column">
                    <?php the_field('minutes_content') ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php 

        $minutes = new WP_Query(array(
            'post_type' => 'board-minutes',
            'posts_per_page' => -1,
            'post__status' => 'published',
            'order' => 'desc',
            'orderby' => 'title',

        ));

        $wp_query = $minutes;
    ?>   


    <div class="row site-component-row">
        <div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1">

            <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

                <div class="accordion-item">
                    <h3 class="accordion-header" id="flush-heading-a1-<?php echo $wp_query->current_post + 1 ?>">

                        <button class="accordion-button <?php if($wp_query->current_post + 1 !== 1) : ?>collapsed<?php endif; ?> title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo $wp_query->current_post + 1 ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo $wp_query->current_post + 1 ?>">
                            <?php the_title(); ?>
                        </button>

                    </h3>

                    <div id="flush-collapse-a1-<?php echo $wp_query->current_post + 1 ?>" class="accordion-collapse collapse <?php if($wp_query->current_post + 1 === 1) : ?>show<?php endif; ?>" aria-labelledby="flush-heading-<?php echo $wp_query->current_post + 1 ?>" data-bs-parent="#accordionFlushA1">
                        <div class="accordion-body body-text _17">
                            <?php $minutes = get_field('minutes'); ?>

                            <ul class="row minutes-row">
                                <?php foreach($minutes as $minute) : ?>

                                    <li class="col-md-3 col-sm-4 col-6 minutes-column">

                                        <?php if($minute['minute_file']['url']) : ?>

                                            <a href="<?php echo $minute['minute_file']['url'] ?>" target="__blank">
                                                <div><?php echo $minute['date'] ?></div>
                                                <?php if($minute['additional_detail'] !== 'none') : ?>

                                                    <?php if($minute['additional_detail'] !== 'other') : ?>
                                                        <div class="additional-detail"><?php echo str_replace('_', ' ', $minute['additional_detail']) ?></div>
                                                    <?php endif; ?>


                                                    <?php if($minute['additional_detail'] === 'other') : ?>
                                                        <div><?php echo $minute['other_additional_detail'] ?></div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            </a>

                                        <?php else : ?>
                                            <div>
                                                <?php if($minute['additional_detail'] === 'other') : ?>
                                                    <div><?php echo $minute['other_additional_detail'] ?></div>
                                                <?php endif; ?>      
                                                
                                                <?php if($minute['additional_detail'] === 'cancelled') : ?>
                                                    <div class="cancelled">Meeting Cancelled</div>
                                                <?php endif; ?>
                                        
                                            </div>
                                        <?php endif; ?>

                                    </li>



                                <?php endforeach; ?>       
                            </ul>

        
                            
                        </div>
                    </div>

                </div>
            <?php endwhile; ?>
        </div>

        <?php wp_reset_postdata(); ?>
    </div>

</div>


<?php get_footer(); ?>