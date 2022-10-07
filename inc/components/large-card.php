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