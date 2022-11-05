<?php if( get_row_layout() == 'p2_picture_text' ): ?>

        <?php $image_position = get_sub_field('image_position'); ?>

        <div class="container-fluid site-component-container p2-container">
            <?php while(have_rows('picture_text_rows')) : the_row();  
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
            ?>
                <div class="row site-component-row <?php if($image_position === 'image_left') : ?>p2-row <?php elseif ($image_position === 'image_right') : ?> p2-row-reverse<?php else : ?> p2-row<?php endif; ?>">
                    <div class="col-lg-4 image-column">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                    <div class="col-lg-6 content-column">
                        <div class="content-wrapper">
                            <?php if($title) : ?>
                            <h2 class="p2-title title-text _33"><?php echo $title; ?></h2>
                            <?php endif; ?>
                            <div class="p2-content body-text _17 content-200">
                                <div class="content-overlay content-gradient-on"></div>
                                <?php echo $content ?>
                            </div>
                        </div>
                        <div class="read-more-expand">Read More&nbsp;<i class="fa-solid fa-angle-down"></i></div>
                        <div class="read-less-collapse">Collapse&nbsp;<i class="fa-solid fa-angle-up"></i></div>
                    </div>
                    
                </div>
            <?php endwhile; ?>
        </div>

<?php endif; ?>