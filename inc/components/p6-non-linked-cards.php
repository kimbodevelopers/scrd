<?php if(get_row_layout() === 'p6_non_linked_cards') : ?>
    <div class="container-fluid site-component-container p6-cards-container">

        <div class="row site-component-row p6-cards-row">


            <?php $count = count(get_sub_field('cards')); ?>

            <?php if($count % 4 === 0 || $count % 4 === 3 && $count > 12) : ?>
                <?php $columns = 'col-md-3 col-sm-6 col-12 p6-card-column'; ?>
            <?php elseif($count % 3 === 0) : ?>
                <?php $columns = 'col-md-4 col-sm-6 col-12 p6-card-column'; ?>
            <?php elseif($count % 2 == 0 || $count > 12) : ?>
                <?php $columns = 'col-md-3 col-sm-6 col-12 p6-card-column'; ?>
            <?php else : ?>
                <?php $columns = 'col-md-4 col-sm-6 col-12 p6-card-column'; ?>
            <?php endif; ?>


            <?php while(have_rows('cards')) : the_row(); 
                $image = get_sub_field('image');
                $label = get_sub_field('description');
            ?>
            
                <div class="<?php echo $columns ?>">
                    <div class="p6-card-wrapper">
                        <?php if($image) : ?>                
                            <img class="p6-card-image" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
                        <?php else : ?>
                            <img class="p6-card-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
                        <?php endif; ?>
                    </div>

                    <?php if($label || $link) : ?>
                        <div class="p6-card-content-wrapper">
                            <strong><?php echo $label; ?></strong>
                        </div>
                    <?php endif; ?>
                </div>

            <?php endwhile; ?>

        </div>
    </div>
<?php endif; ?>