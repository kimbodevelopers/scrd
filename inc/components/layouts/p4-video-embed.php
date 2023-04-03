<?php if( get_row_layout() == 'p4_video_embed' ): ?>

<?php if(get_row('p4_video_embed')) : ?>
    <div class="container-fluid site-component-container p4-container">
			<?php $video_size = get_sub_field("video_size"); ?>

            <div class="row site-component-row p4-row">
                <div class="col-md-10 col-12 p4-column video-size <?php if($video_size === 'small') : ?>small<?php elseif($video_size === 'medium') : ?>medium<?php else: ?>large<?php endif; ?>">
                    <?php echo get_sub_field('video') ?>
                </div>
            </div>

    </div>
<?php endif; ?>

<?php endif; ?>