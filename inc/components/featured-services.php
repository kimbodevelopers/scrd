<div class="container-fluid featured-services-container site-component-container">
	

	
    <div class="row site-component-row featured-services-row">
		
		<?php if(get_field('featured_services_title', 'option')) : ?>
			<div class="col-12">
				<h2 class="title-text _33"><?php echo get_field('featured_services_title', 'option'); ?></h2>
			</div>
		<?php endif; ?>
		
        <?php while(have_rows('featured_services_items', 'option')) : the_row(); 
            $icon = get_sub_field('featured_services_icon');
            $link = get_sub_field('featured_services_link');
            $snippet = get_sub_field('featured_services_snippet');
        ?>
            <div class="col-lg-3 col-md-4 featured-services-column">
				<a href="<?php echo $link['url'] ?>">
					<div class="featured-services-wrapper">
						<div class="title-icon">
							<h3 class="body-text _20"><?php echo $link['title'] ?></h3>
							<div class="icon-wrapper"><?php echo $icon ?></div>
						</div>

						<p class="body-text _17"><?php echo $snippet; ?></p>
					</div>
				</a>
            </div>
        <?php endwhile; ?>
    </div>

    <?php if(get_field('featured_services_link', 'option')) : ?>
        <div class="row site-component-row button-row">
            <div class="col-12 button-column">
				<?php $featured_services_link = get_field('featured_services_link', 'option'); ?>
                <a href="<?php echo $featured_services_link['url'] ?>" class="site-button body-text _26"><?php the_field('featured_services_button_text', 'option') ?></a>
            </div>
        </div>
    <?php endif; ?>
</div>