<?php if(get_row_layout() === 'c4_cards') : ?>
    <div class="container-fluid site-component-container c4-cards-container">
        
		<?php if(get_sub_field('cards_title')) : ?>
			<div class="row site-component-row">
				<div class="col-12">
					<h2 class="title-text _33 "><?php the_sub_field('cards_title') ?></h2>
				</div>
			</div>
		<?php endif; ?>

        <div class="row site-component-row c4-cards-row">


            <?php $count = count(get_sub_field('cards')); ?>

            <?php if($count % 4 === 0 || $count % 4 === 3 && $count > 12) : ?>
                <?php $columns = 'col-md-3 col-sm-6 col-12 c4-card-column'; ?>
            <?php elseif($count % 3 === 0) : ?>
                <?php $columns = 'col-md-4 col-sm-6 col-12 c4-card-column'; ?>
            <?php elseif($count % 2 == 0 || $count > 12) : ?>
                <?php $columns = 'col-md-3 col-sm-6 col-12 c4-card-column'; ?>
            <?php else : ?>
                <?php $columns = 'col-md-4 col-sm-6 col-12 c4-card-column'; ?>
            <?php endif; ?>


            <?php while(have_rows('cards')) : the_row(); 
                $title = get_sub_field('cards_title');
                $image = get_sub_field('image');
                $label = get_sub_field('label');
                $link = get_sub_field('link');
				$description = get_sub_field('description');
            ?>
            
                <div class="<?php echo $columns ?>">
                    <div class="c4-card-wrapper">
                        <?php if($image || $link) : ?>
                            <a href="<?php echo $link ?>" target="__blank">
                                <img class="c4-card-image" src="<?php echo $image['url'] ?>" alt="<?php echo $image['alt'] ?>" />
                            </a>
                        <?php else : ?>
                            <a href="<?php echo $link ?>" target="__blank">
                                <img class="c4-card-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
                            </a>
                        <?php endif; ?>
                    </div>

                    <?php if($label || $link) : ?>
                        <div class="c4-card-content-wrapper <?php if($label) : ?>text-center<?php endif; ?>">
                            <strong><a href="<?php echo $link ?>"><?php echo $label; ?></a></strong>
                        </div>
                    <?php endif; ?>
					
					<?php if($description) : ?>
						<div class="body-text _17">
							<?php echo $description; ?>
						</div>
					<?php endif; ?>
                </div>

            <?php endwhile; ?>

            <?php while(have_rows('view_button')) : the_row(); 
                $text = get_sub_field('view_button_text');
                $link = get_sub_field('view_button_link');
            ?>

            <?php if($text || $link) : ?>
                <div class="row site-component-row button-row <?php if(!have_rows('cards') || !get_sub_field('cards_title') ) : ?>mt-0 mb-3<?php endif; ?>">
                    <div class="col-12 button-column">
                        <a href="<?php echo $link ?>" target="__blank" class="site-button body-text _26"><?php echo $text ?></a>
                    </div>
                </div>
            <?php endif; ?>
                
            <?php endwhile; ?>




        </div>
    </div>
<?php endif; ?>