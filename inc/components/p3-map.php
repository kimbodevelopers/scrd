<?php if( get_row_layout() == 'p3_map' ): ?>
	<?php while(have_rows('p3_map')) : the_row(); ?>
		<div class="container-fluid site-component-container picture-container">
			<div class="row site-component-row">
				<div class="col-12">
					<?php echo get_sub_field('map') ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

<?php endif; ?>