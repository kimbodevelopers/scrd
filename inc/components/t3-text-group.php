<?php if( get_row_layout() == 't3_text_group' ): ?>

    <div class="container-fluid site-component-container t3-container">
        <div class="row site-component-row t3-row">
            <div class="col-12 t3-column">


                <div class="tabs">
                    <div id="tabs-nav" class="row site-component-row">

                        <?php $counter = 0; ?>

                        <?php while(have_rows('tab_items')) : the_row(); $counter++; ?><?php endwhile; ?>

                        <?php $column_num = null; ?>

                        <?php if($counter === 1 || $counter === 2 || $counter === 3) : ?>
                            <?php $column_num = 'col-md-4 col-sm-6'; ?>
                        <?php elseif($counter === 4) : ?>
                            <?php $column_num = 'col-md-3 col-sm-6'; ?>
                        <?php elseif($counter === 5 || $counter === 6) : ?>
                            <?php $column_num = 'col-md-2 col-sm-6'; ?>
                        <?php endif; ?>

                        <?php while(have_rows('tab_items')) : the_row();
                            $title = get_sub_field('title');
                            $title_replaced = str_replace(array(' ', '.'), '-', $title);
                        ?>
                        
                            <div class="tab-item <?php echo $column_num; ?>
                                <?php if(get_row_index() === 1) : ?>active<?php endif; ?>">
                                <a href="#tab-<?php echo $title_replaced ?>-<?php echo get_row_index(); ?>">
                                    <?php echo $title; ?>
                                </a>
                            </div>
                            
                        <?php endwhile; ?>
                        

                    </div>


                    <div id="tabs-content" class="row site-component-row">
                        <?php while(have_rows('tab_items')) : the_row();
                            $title = get_sub_field('title');
                            $title_replaced = str_replace(array(' ', '.'), '-', $title);
                            $content = get_sub_field('content');
                        ?>
                            <div id="tab-<?php echo $title_replaced ?>-<?php echo get_row_index(); ?>" class="tab-content col-12">
                                <?php echo $content; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
        
            </div>
        </div>
    </div>

<?php endif; ?>