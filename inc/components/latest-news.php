<div class="container-fluid small-cards-container site-component-container">

    
    <div class="row site-component-row">
        <h2 class="title-text _50 col-12"><?php the_field('latest_news_title', 'option') ?></h2>
    </div>

    <?php 

        $latest_news = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => 4,
            'post__status' => 'published',
            'order' => 'DESC',
        ));

        $wp_query = $latest_news;
    ?>

    <div class="row site-component-row small-cards-row">

        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            
            <div class="col-md-3 col-sm-6 col-12 small-cards-column">
                <a href="<?php the_permalink(); ?>">
                    <div class="small-card-wrapper">
                        <?php if(wp_get_attachment_image_src(get_post_thumbnail_id())[0]) : ?>                
                            <img class="small-cards-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0] ; ?>" >
                        <?php else : ?>
                            <img class="small-cards-image" src="<?php the_field('featured_placeholder', 'option') ?>" />
                        <?php endif; ?>

                        <?php if(get_the_title()) : ?>
                            <div class="body-text _19">
                                <?php the_title(); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
            </div>

        <?php endwhile; ?>
        <?php wp_reset_query(); ?>

    </div>

    <?php if(get_field('latest_news_link', 'option')) : ?>
        <div class="row site-component-row button-row">
            <div class="col-12 button-column">
                <a href="<?php the_field('latest_news_link', 'option') ?>" class="site-button body-text _26"><?php the_field('latest_news_button_text', 'option') ?></a>
            </div>
        </div>
    <?php endif; ?>

</div>