<?php if( get_row_layout() == 'p1_picture' ): ?>

    <?php if(get_field('image')) : ?>
        <div class="container-fluid site-component-container">
            <div class="row site-component-row">
                <div class="col-12">
                    <img src="<?php echo esc_url(get_field('image')['url']); ?>" alt="<?php echo esc_attr(get_field('image')['alt']); ?>" />
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>