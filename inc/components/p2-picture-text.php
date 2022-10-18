<?php if( get_row_layout() == 'p2_picture_text' ): ?>

        <div class="container-fluid site-component-container p2-container">
            <?php while(have_rows('picture_text_rows')) : the_row();  
                $image = get_sub_field('image');
                $title = get_sub_field('title');
                $content = get_sub_field('content');
            ?>
                <div class="row site-component-row p2-row">
                    <div class="col-lg-4 image-column">
                        <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                    </div>
                    <div class="col-lg-6 content-column">
                        <h2 class="p2-title title-text _33"><?php echo $title; ?></h2>
                        <div class="p2-content body-text _17">
                            <?php echo $content ?>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

<?php endif; ?>