<?php global $posts_array_count ?>

<div class="<?php if($posts_array_count % 4 === 0 && $posts_array_count <= 8 ) : ?>col-md-3<?php else :?> col-md-4<?php endif; ?> col-sm-6 col-12 large-cards-column">
    <a href="<?php the_permalink(); ?>">
        <div class="large-card-wrapper">
            <?php if(wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]) : ?>                
                <img class="large-cards-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ; ?>" >
            <?php else : ?>
                <img class="large-cards-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
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