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
                            $images = get_sub_field('gallery');
                            $indicator_index = 1;
                            $image_index = 1;
                        ?>
                            <div id="tab-<?php echo $title_replaced ?>-<?php echo get_row_index(); ?>" class="tab-content row">
                                <div class="col-sm-6 col-md-7 col-lg-8">
                                    <?php echo $content; ?>
                                </div>

                                <?php if($images) : ?>

                                    <div id="carouselT3Indicator-<?php echo get_row_index() ?>" class="carousel slide col-lg-4 col-md-5 col-sm-6" data-bs-ride="carousel">

                                        <?php if(count($images) > 1) : ?>
                                            <div class="carousel-indicators">
                                                <?php foreach($images as $image) : ?>
                                                    <button type="button" data-bs-target="#carouselT3Indicator-<?php echo get_row_index() ?>" class="<?php if($indicator_index === 1) : ?>active<?php endif; ?>" data-bs-slide-to="<?php echo $indicator_index -1 ?>" <?php if($indicator_index === 1) : ?>aria-current="true"><?php endif; ?></button>
                                                    <?php $indicator_index++; ?>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>

                                        <div class="carousel-inner">
                                            <?php foreach($images as $image) : ?>
                                                <div class="carousel-item <?php if($image_index === 1) : ?>active<?php endif; ?>">

                                                    <img class="d-block w-100" src="<?php echo esc_url($image['url']); ?>" />
                                                </div>

                                            <?php $image_index++  ?>
                                            <?php endforeach; ?>
                                        </div>


                                        <?php if(count($images) > 1) : ?>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselT3Indicator-<?php echo get_row_index() ?>" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselT3Indicator-<?php echo get_row_index() ?>" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        <?php endif; ?>

                                    </div>
                                <?php endif; ?>

                            </div>
                            

                        <?php endwhile; ?>
                        



                    </div>
                </div>
        
            </div>
        </div>
    </div>

<?php endif; ?>