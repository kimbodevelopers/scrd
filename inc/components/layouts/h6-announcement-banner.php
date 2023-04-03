<?php if( get_row_layout() == 'h6_announcement_banner' ): ?>
	<?php 
		$title = get_sub_field('title'); 
		$date_length = get_sub_field('date_length');
		$date = get_sub_field('date');
		$start_date = get_sub_field('start_date');
		$end_date = get_sub_field('end_date');
		$snippet = get_sub_field('snippet');
		$learn_more_link = get_sub_field('learn_more_link');
		$icon_background_colour = get_sub_field('icon_background_colour');
	?>

	<?php if($icon_background_colour === 'orange') : ?>
		<?php $icon_background_colour = 'orange-background' ?>

	<?php elseif($icon_background_colour === 'blue') : ?>
		<?php $icon_background_colour = 'blue-background' ?>

	<?php elseif($icon_background_colour === 'red') : ?>
		<?php $icon_background_colour = 'red-background' ?>

	<?php elseif($icon_background_colour === 'dark_teal') : ?>
		<?php $icon_background_colour = 'dark-teal-background' ?>

	<?php elseif($icon_background_colour === 'light_blue') : ?>
		<?php $icon_background_colour = 'light-blue-background' ?>
	<?php endif; ?>

	<div class="container-fluid h6-announcement-container">
		<div class="row h6-announcement-row">
			
			<div class="h6-announcement-column col-12">
				<div class="h6-announcement-icon-wrapper <?php echo $icon_background_colour ?>">
					<i class="fa-solid fa-circle-exclamation"></i>
				</div>

				<div class="h6-announcement-content-wrapper">
					<?php if($date_length === 'single_day') : ?>
						<p class="body-text _15">
							<?php echo $date ?>
						</p>
					<?php endif; ?>

					<?php if($date_length === 'date_range') : ?>
						<p class="body-text _15">
							<?php if($start_date) : ?>
								<?php echo $start_date ?> 
							<?php endif; ?>
							
							<?php if($end_date) : ?>
								<i class="fa-solid fa-arrow-right"></i> 
								<?php echo $end_date ?>
							<?php endif; ?>
						</p>
					<?php endif; ?>

					<?php if($title) : ?>
						<h3 class="title-text _25 dark-blue">
							<?php echo $title ?>
						</h3>
					<?php endif; ?>

					<?php if($snippet) : ?>
						<div>
							<?php echo $snippet ?> <span><a href="<?php echo $learn_more_link ?>" target="__blank">Learn More</a></span>
						</div>
					<?php endif ?>
				</div>
			</div>

		</div>
	</div>
<?php endif; ?>