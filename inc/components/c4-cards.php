<?php if(get_row_layout() === 'c4_cards') : ?>
    <div class="container-fluid site-component-container c4-cards-container">
        <div class="row site-component-row c4-cards-row">


            <?php $count = count(get_sub_field('cards')); ?>

            <?php if($count % 4 === 0 || $count % 4 === 3 && $count > 12) : ?>
                <?php $columns = 'col-md-3 col-sm-6 col-12 c4-card-column'; ?>
            <?php elseif($count % 2 == 0 || $count > 12) : ?>
                <?php $columns = 'col-md-3 col-sm-6 col-12 c4-card-column'; ?>
            <?php else : ?>
                <?php $columns = 'col-md-4 col-sm-6 col-12 c4-card-column'; ?>
            <?php endif; ?>


            <?php while(have_rows('cards')) : the_row(); 
                $image = get_sub_field('image');
                $label = get_sub_field('label');
                $link = get_sub_field('link');
            ?>
                <div class="<?php echo $columns ?>">
                    <div class="c4-card-wrapper">
                        <?php if($image) : ?>                
                            <img class="c4-card-image" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
                        <?php else : ?>
                            <img class="c4-card-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
                        <?php endif; ?>
                    </div>

                    <?php if($label || $link) : ?>
                        <div class="c4-card-content-wrapper">
                            <strong><a href="<?php echo $link ?>"><?php echo $label; ?></a></strong>
                        </div>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>

            <?php while(have_rows('view_button')) : the_row(); 
                $text = get_sub_field('view_button_text');
                $link = get_sub_field('view_button_link');
            ?>

            <div class="row site-component-row button-row">
                <div class="col-12 button-column">
                    <a href="<?php echo $link ?>" class="site-button body-text _26"><?php echo $text ?></a>
                </div>
            </div>
                
            <?php endwhile; ?>




        </div>
    </div>
<?php endif; ?>