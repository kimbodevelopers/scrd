<div class="col-12 col-lg-4 col-md-4 col-sm-6 c8-card-column">

	<div class="c8-card-wrapper">

		<h3 class="title-text _21 news-card-title c8-card-title mb-0 mt-2">	
			<a href="
					 <?php if( get_field('attachment_type') === 'link' ) : ?>
					 <?php echo get_field('media_attachment')['link'] ?>
					 <?php else : ?>
					 <?php the_permalink(); ?>
					 <?php endif; ?>
					 " target="__blank">
				<?php the_title(); ?>
			</a>
		</h3>

		<?php if(get_field('date_released')) : ?>
		<p class="body-text _22 mt-3">
			<?php the_field('date_released') ?>
		</p>
		<?php endif; ?>

		<?php if(get_field('content')) : ?>
		<div class='card-content'>
			<?php the_field('content') ?>
		</div>
		<?php endif; ?>


		<div class="files-wrapper mt-2">

			<a href="
					 <?php if( get_field('media_attachment')['link'] ) : ?>
					 <?php echo get_field('media_attachment')['link'] ?>
					 <?php else : ?>
					 <?php the_permalink(); ?>
					 <?php endif; ?>
					 " target="__blank">
				Read More
			</a>


		</div>

	</div>		

</div>