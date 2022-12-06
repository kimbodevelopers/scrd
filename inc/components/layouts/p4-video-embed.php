<?php if( get_row_layout() == 'p4_video_embed' ): ?>

<?php if(get_row('p4_video_embed')) : ?>
    <div class="container-fluid site-component-container p4-container">


            <div class="row site-component-row p4-row">
                <div class="col-12 p4-column">
                    <?php echo get_sub_field('video') ?>
                </div>
            </div>

    </div>
<?php endif; ?>

<?php endif; ?>