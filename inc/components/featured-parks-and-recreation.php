<?php $featured_parks_and_rec_items = get_field('featured_parks_and_rec_items', 'option') ?>


<div class="row">
    <?php foreach($featured_parks_and_rec_items as $featured_parks_and_rec_item) : ?>
        <div class="col-md-3 col-sm-6 col-12">
            <div class="featured-card-wrapper">
                <?php if(wp_get_attachment_image_src(get_post_thumbnail_id($featured_parks_and_rec_item->ID), 'full')[0]) : ?>                
                    <img class="featured-parks-and-rec-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($featured_parks_and_rec_item->ID), 'full')[0] ; ?>" >
                <?php else : ?>
                    <img class="featured-parks-and-rec-image" src="<?php the_field('featured_placeholder', 'option') ?>" />
                <?php endif; ?>

                <?php if($featured_parks_and_rec_item->post_title) : ?>
                    <div>
                        <?php echo $featured_parks_and_rec_item->post_title; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    <?php endforeach; ?>


</div>