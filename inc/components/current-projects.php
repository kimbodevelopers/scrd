<div class="container-fluid large-cards-container site-component-container">
    <?php if(get_field('current_projects_title', 'option')) : ?>
	<div class="row site-component-row">
        <div class="col-12">
            <h2 class="title-text _33"><?php the_field('current_projects_title', 'option') ?></h2>
        </div>
    </div>
	<?php endif; ?>



    <div class="row site-component-row large-cards-row">
        <?php while(have_rows('featured_current_projects', 'options')) : the_row(); 
			$image = get_sub_field('image');
			$title = get_sub_field('title');
			$snippet = get_sub_field('snippet');
			$link = get_sub_field('link');
		?>
			

			<div class="col-md-3 col-sm-6 col-12 large-cards-column">
				<a href="<?php echo $link ?>" target="__blank">
					<div class="large-card-wrapper">

						<?php if($image) : ?>                
							<img class="large-cards-image" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt'] ?>" >
						<?php else : ?>
							<img class="large-cards-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
						<?php endif; ?>

						<div class="large-card-content-wrapper">
							<?php if($title) : ?>
								<div class="body-text _19 large-card-content-title"><?php echo $title ?></div>     
							<?php endif; ?>

							<div class="content-text body-text _18">
								<?php if($snippet) : ?>
									<?php echo $snippet ?>
								<?php endif; ?>
							</div>
						</div>

					</div>
				</a>
			</div>
		
		
		<?php endwhile; ?>
    </div>


    <?php if(get_field('current_projects_link', 'option')) : ?>
        <div class="row site-component-row button-row">
            <div class="col-12 button-column">
				<?php $link = get_field('current_projects_link', 'option') ?>
                <a href="<?php echo $link['url'] ?>" class="site-button body-text _26" target="__blank"><?php the_field('current_projects_button_text', 'option') ?></a>
            </div>
        </div>
    <?php endif; ?>


</div>
