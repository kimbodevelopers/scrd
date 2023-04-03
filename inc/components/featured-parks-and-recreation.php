<?php $featured_parks_items = get_field('featured_parks_items', 'option') ?>

<div class="container-fluid small-cards-container site-component-container">
    
	<?php if($featured_parks_items) : ?>
    <div class="row site-component-row">
        <div class="col-12">
            <h2 class="title-text _33"><?php the_field('featured_parks_title', 'option') ?></h2>
        </div>
    </div>
	<?php endif; ?>

    <div class="row site-component-row small-cards-row">
				
        <?php while(have_rows('featured_parks_items', 'option')) : the_row();
			$image = get_sub_field('image');
			$title = get_sub_field('title');
			$snippet = get_sub_field('snippet');
			$link = get_sub_field('link');
		?>			
			<div class="col-md-3 col-sm-6 col-12 small-cards-column">
				<a href="
					<?php if($link) : ?>
						<?php echo $link ?>
					<?php endif; ?>
				">
					<div class="small-card-wrapper">
						<?php if($image) : ?>                
							<img class="small-cards-image" src="<?php echo $image['url'] ; ?>" >
						<?php else : ?>
							<img class="small-cards-image" src="<?php echo $image['url'] ?>" />
						<?php endif; ?>

						<?php if($title) : ?>
							<div class="body-text _19 park-recreation-title">
								<?php echo $title; ?>
							</div>
						<?php endif; ?>
						
						<?php if($snippet) : ?>
							<div class="park-recreation-snippet">
								<?php echo $snippet	?>
							</div>
						<?php endif; ?>										
				
					</div>
				</a>
			</div>

        <?php endwhile; ?>
    </div>



</div>
