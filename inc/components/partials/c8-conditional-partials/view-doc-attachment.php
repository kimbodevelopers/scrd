    <i class="fa-solid fa-file-pdf"></i>

    <div class="text-wrapper">
        <span class="view-text">View this document</span>
        <span class="file-size">
            <?php if(intval(wp_get_attachment_metadata(get_the_ID())['filesize']) * 0.001 < 1) : ?>
                    <?php echo number_format(wp_get_attachment_metadata(get_the_ID())['filesize'], 2) ?> KB
            <?php else : ?>
                <?php echo number_format(wp_get_attachment_metadata(get_the_ID())['filesize'] * 0.001) ?> KB
            <?php endif; ?>
        </span>
    </div>

