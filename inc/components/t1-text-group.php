<?php if( get_row_layout() == 't1_h1_text_group' ): ?>
    <?php while(have_rows('h1_text_group')) : the_row();
        $title = get_sub_field('title');
        $content = get_sub_field('content');
    ?>
        <div class="container-fluid site-component-container">
            <div class="row site-component-row">
                <div class="col-12">
                    <?php if($title) : ?>
                        <h1 class="t1-title _h1 title-text _50"><?php echo $title; ?></h1>
                    <?php endif; ?>
                    <?php if($content) : ?>
                        <div class="body-text _21"><?php echo $content ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php elseif( get_row_layout() == 't1_h2_text_group' ): ?>
    <?php while(have_rows('h2_text_group')) : the_row();
        $title = get_sub_field('title');
        $content = get_sub_field('content');
    ?>
        <div class="container-fluid site-component-container">
            <div class="row site-component-row">
                <div class="col-12">
                    <?php if($title) : ?>
                        <h2 class="t1-title title-text _33"><?php echo $title; ?></h2>
                    <?php endif; ?>
                    <?php if($content) : ?>
                        <div class="body-text _17"><?php echo $content ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php elseif( get_row_layout() == 't1_h3_text_group' ): ?>
    <?php while(have_rows('h3_text_group')) : the_row();
        $title = get_sub_field('title');
        $content = get_sub_field('content');
    ?>
        <div class="container-fluid site-component-container">
            <div class="row site-component-row">
                <div class="col-12">
                    <?php if($title) : ?>
                        <h3 class="t1-title title-text _25"><?php echo $title; ?></h3>
                    <?php endif; ?>
                    <?php if($content) : ?>
                        <div class="body-text _17"><?php echo $content ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php endif; ?>