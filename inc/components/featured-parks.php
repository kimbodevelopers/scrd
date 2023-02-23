<?php $featured_parks_items = get_field('featured_parks_items', 'option') ?>

<div class="container-fluid small-cards-container site-component-container">

    
    <div class="row site-component-row">
        <div class="col-12">
            <h2 class="title-text _44"><?php the_field('featured_parks_title', 'option') ?></h2>
        </div>
    </div>

    <div class="row site-component-row small-cards-row">

        <?php foreach($featured_parks_items as $featured_parks_item) : ?>
            <div class="col-md-3 col-sm-6 col-12 small-cards-column">
                <a href="<?php echo $featured_parks_item->guid; ?>">
                    <div class="small-card-wrapper">
                        <?php if(wp_get_attachment_image_src(get_post_thumbnail_id($featured_parks_item->ID), 'full')[0]) : ?>                
                            <img class="small-cards-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($featured_parks_item->ID), 'full')[0] ; ?>" >
                        <?php else : ?>
                            <img class="small-cards-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
                        <?php endif; ?>

                        <?php if($featured_parks_item->post_title) : ?>
                            <div class="body-text _19">
                                <?php echo $featured_parks_item->post_title; ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </a>
            </div>

        <?php endforeach; ?>
    </div>

    <?php if(get_field('featured_parks_and_rec_link', 'option')) : ?>
        <div class="row site-component-row button-row">
            <div class="col-12 button-column">
                <a href="<?php the_field('featured_parks_link', 'option') ?>" class="site-button body-text _26"><?php the_field('featured_parks_button_text', 'option') ?></a>
            </div>
        </div>
    <?php endif; ?>

</div>
