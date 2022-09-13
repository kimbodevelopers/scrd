<div class="container-fluid large-cards-container site-component-container">
    <div class="row site-component-row">
        <h2 class="title-text _50 col-12"><?php the_field('current_projects_title', 'option') ?></h2>
    </div>


    <?php 
        $current_projects = new WP_Query(array(
            'post_type' => 'projects',
            'posts_per_page' => 3,
            'post__status' => 'published',
            'order' => 'DESC',
        ));

        $wp_query = $current_projects;
    ?>


    <div class="row site-component-row large-cards-row">
        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <div class="col-md-4 col-sm-6 col-12 large-cards-column">
                <a href="<?php the_permalink(); ?>">
                    <div class="large-card-wrapper">
                        <?php if(wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]) : ?>                
                            <img class="large-cards-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ; ?>" >
                        <?php else : ?>
                            <img class="large-cards-image" src="<?php the_field('featured_placeholder', 'option') ?>" />
                        <?php endif; ?>

                        <div class="large-card-content-wrapper">
                            <?php if(get_the_title()) : ?>
                                <div class="body-text _19"><?php the_title(); ?></div>     
                            <?php endif; ?>
                            <?php if(get_the_content()) : ?>
                                <div class="content-text body-text _18">
                                    <?php the_content(); ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                </a>
            </div>

        <?php endwhile; ?>

    </div>


    <?php if(get_field('current_projects_link', 'option')) : ?>
        <div class="row site-component-row button-row">
            <div class="col-12 button-column">
                <a href="<?php the_field('current_projects_link', 'option') ?>" class="site-button body-text _26"><?php the_field('current_projects_button_text', 'option') ?></a>
            </div>
        </div>
    <?php endif; ?>


</div>
