<?php if( get_row_layout() == 'p1_picture' ): ?>

    <?php if(get_sub_field('image')) : ?>
        <div class="container-fluid site-component-container p1-picture-container">
            <div class="row site-component-row p1-picture-row">

                
                <div class="<?php if(get_sub_field('image_number_option') === 'one') : ?> col-12<?php else : ?> col-md-6<?php endif; ?>">
                    <img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" />
                </div>
            

                <?php if(get_sub_field('image_number_option') === 'two') : ?>
                    <div class="col-md-6">
                        <img src="<?php echo esc_url(get_sub_field('image_2')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image_2')['alt']); ?>" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>