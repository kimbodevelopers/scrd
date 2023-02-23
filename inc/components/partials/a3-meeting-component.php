<div class="row site-component-row a3-meeting-agenda-row">
	<div class="col-md-6 col-lg-2 date-column">
		<strong><?php the_field('date') ?></strong>
	</div>

	<div class="col-md-6 col-lg-3 meeting-status-column">
		
		<?php  $meeting_statuses = 
		get_the_terms($post->ID, 'meeting_status');
		$index = 0;
		?>
		<?php foreach($meeting_statuses as $meeting_status) : ?><strong><?php if($index !== 0) : ?><span>,</span><?php endif; ?> <?php echo $meeting_status->name ?></strong><?php $index++; ?><?php endforeach; ?>
	</div>

	<div class="col-md-0 col-lg-1">
		<!-- spacer -->
	</div>

	<div class="col-4 col-lg-2 icon-column">
		<?php if(get_field('agenda_files')) : ?>
		
			<?php while(have_rows('agenda_files')) : the_row(); 
				$file = get_sub_field('file');
				$label = get_sub_field('label');
			?>
				<a href="<?php echo $file['url'] ?>" target="__blank">
					<i class="fa-solid fa-file-pdf  <?php if($label) : ?> d-none<?php endif; ?>"></i>
					<span class="label-wrapper">
						<?php echo $label ?>
					</span>
				</a>
			<?php endwhile; ?>
		
		<?php else : ?>
			N/A
		<?php endif; ?>
	</div>

	<div class="col-4 col-lg-2 icon-column">
		<?php if(get_field('late_files')) : ?>
			<?php while(have_rows('late_files')) : the_row(); 
				$file = get_sub_field('file');
				$label = get_sub_field('label');
			?>
				<a href="<?php ?>" target="__blank">
					<i class="fa-solid fa-file-pdf  <?php if($label) : ?> d-none<?php endif; ?>"></i>
					<span class="label-wrapper">
						<?php echo $label ?>
					</span>
				</a>
			<?php endwhile; ?>
		<?php else : ?>
			N/A
		<?php endif; ?>
	</div>

	<div class="col-4 col-lg-2 icon-column">
		<?php if(get_field('audio_video_links')) : ?>
			<?php while(have_rows('audio_video_links')) : the_row(); 
				$audio_or_video = get_sub_field('audio_or_video');
				$link = get_sub_field('link');
				$label = get_sub_field('label');
			?>
				<a href="<?php echo $link ?>" target="__blank">
					<span class="label-wrapper">
						<?php echo $label ?>
					</span>
					<?php if($audio_or_video === 'video') : ?>
					<i class="fa-brands fa-youtube <?php if($label) : ?> d-none<?php endif; ?>"></i>
					<?php elseif($audio_or_video === 'audio') : ?>
					<i class="fa-solid fa-volume-high <?php if($label) : ?> d-none<?php endif; ?>"></i>
					<?php endif; ?>

				</a>

			<?php endwhile; ?>
		
		<?php else : ?>
			N/A
		<?php endif; ?>
	</div>
</div>