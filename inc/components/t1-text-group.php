<?php if( get_row_layout() == 't1_text_group' ): ?>
    <?php while(have_rows('text_group')) : the_row();
        $content = get_sub_field('content');
    ?>
        <div class="container-fluid site-component-container t1-container">
            <div class="row site-component-row t1-row">
                <div class="col-12 t1-column">
                    <?php if($content) : ?>
                        <div class="body-text _17 t1-content"><?php echo $content ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php endif; ?>