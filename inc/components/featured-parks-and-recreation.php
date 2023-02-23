<?php $featured_parks_items = get_field('featured_parks_items', 'option') ?>

<div class="container-fluid small-cards-container site-component-container">
    
    <div class="row site-component-row">
        <div class="col-12">
            <h2 class="title-text _33"><?php the_field('featured_parks_title', 'option') ?></h2>
        </div>
    </div>

    <div class="row site-component-row small-cards-row">
		
		
		<?php while(have_rows('featured_parks_items')) : the_row(); 
			$link = get_sub_field('recreation_page_link');
		?>
			<p>
				<?php echo $link ?>
			</p>
			
		<?php endwhile; ?>

        <?php foreach($featured_parks_items as $featured_parks_item) : ?>
					
			<div class="col-md-3 col-sm-6 col-12 small-cards-column">
				<?php $page_link = get_post_meta($featured_parks_item->ID, 'recreation_page_link', true) ?>
					<a href="
						<?php if($page_link) : ?>
						 	<?php echo $page_link['url'] ?>
						 <?php else : ?>
						 	<?php echo $featured_parks_item->guid; ?>
						 <?php endif; ?>
					">
					<div class="small-card-wrapper">
						<?php if(wp_get_attachment_image_src(get_post_thumbnail_id($featured_parks_item->ID), 'full')[0]) : ?>                
							<img class="small-cards-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id($featured_parks_item->ID), 'full')[0] ; ?>" >
						<?php else : ?>
							<img class="small-cards-image" src="<?php echo get_field('placeholder_image', 'option')['url'] ?>" />
						<?php endif; ?>

						<?php if($featured_parks_item->post_title) : ?>
							<div class="body-text _19 park-recreation-title">
								<?php echo $featured_parks_item->post_title; ?>
							</div>
						<?php endif; ?>
						
						<?php if($featured_parks_item->post_content) : ?>
							<div class="park-recreation-snippet">
								<?php echo $featured_parks_item->post_content	?>
							</div>
						<?php endif; ?>

						<?php $recreation_snippet =  get_post_meta($featured_parks_item->ID)['recreation_snippet'] ?>
						<?php if($recreation_snippet) : ?>
							<div class="park-recreation-snippet">
								<?php echo $recreation_snippet[0]	?>
							</div>
						<?php endif; ?>
											
				
					</div>
				</a>
			</div>

        <?php endforeach; ?>
    </div>



</div>
