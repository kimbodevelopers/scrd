<?php global $posts_array_count ?>

<div class="<?php if($posts_array_count % 4 === 0 && $posts_array_count <= 8 ) : ?>col-md-3<?php else :?> col-md-4<?php endif; ?> col-sm-6 col-12 large-cards-column">
    <a href="<?php if(get_field('external_link')) : ?><?php the_field('external_link') ?><?php else : ?><?php the_permalink(); ?><?php endif; ?>" target="__blank">
        <div class="large-card-wrapper">
			
			<?php 
				$thumbnail_id = get_post_thumbnail_id( $post->ID );
				$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
			?>
			
            <?php if(wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]) : ?>                
                <img class="large-cards-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ; ?>" alt="<?php echo $alt ?>" >
            <?php else : ?>
                <img class="large-cards-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
            <?php endif; ?>

            <div class="large-card-content-wrapper">
                <?php if(get_the_title()) : ?>
                    <div class="body-text _19 large-card-content-title"><?php the_title(); ?></div>     
                <?php endif; ?>
				
				<div class="content-text body-text _18">
					<?php if(get_field('snippet')) : ?>
						<?php the_field('snippet') ?>
					<?php else : ?>
						<?php the_content(); ?>
					<?php endif; ?>
				</div>
            </div>

        </div>
    </a>
</div>