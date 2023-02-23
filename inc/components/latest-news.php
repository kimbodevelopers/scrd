<div class="container-fluid small-cards-container site-component-container">

    
    <div class="row site-component-row">
        <div class="col-12">
            <h2 class="title-text _33"><?php the_field('latest_news_title', 'option') ?></h2>
        </div>
    </div>

    <?php 

        $latest_news = new WP_Query(array(
            'post_type' => 'news',
            'posts_per_page' => 4,
            'post__status' => 'published',
            'orderby' => array( 'menu_order' => 'ASC' )
        ));

        $wp_query = $latest_news;
    ?>

    <div class="row site-component-row small-cards-row">

        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            
            <div class="col-md-3 col-sm-6 col-12 small-cards-column">
				
                <a href="<?php the_permalink(); ?>">
                    <div class="small-card-wrapper">
                        <?php if(wp_get_attachment_image_src(get_post_thumbnail_id())) : ?>                
                            <img class="small-cards-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id())[0] ; ?>" alt="">
                        <?php else : ?>
						
							<?php $newsletter_image = get_field('newsletter_image', 'option'); ?>

							<?php if(get_the_terms($post->ID, 'news_type')[0]->slug === 'newsletter') : ?>
								<?php if($newsletter_image) : ?>
									<img class="small-cards-image" src="<?php echo $newsletter_image['url'] ?>" />
								<?php endif; ?>
							<?php else : ?>
								<img class="large-cards-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
							<?php endif; ?>
						
						
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
				<?php $news_link = get_field('latest_news_link', 'option') ?>
                <a href="<?php echo $news_link['url'] ?>" class="site-button body-text _26"><?php the_field('latest_news_button_text', 'option') ?></a>
            </div>
        </div>
    <?php endif; ?>

</div>