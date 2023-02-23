<div class="container-fluid site-component-container pb-0">
    <div class="row site-component-row">

		<?php if(get_field('date')) : ?>
			<div class="col-12">
				<h1 class="title-text _50 dark-blue">Agenda for <?php the_field('date') ?></h1>
			</div>
		<?php endif; ?>
    </div>
	
</div>

<?php get_template_part('inc/components/partials/single-partial/taxonomy-component') ?>
 

<div class="container-fluid site-component-container b1-table-container">
	<div class="row site-component-row b1-table-row">

		<?php while(have_rows('agenda_files')) : the_row(); 
			$label = get_sub_field('label');
			$file = get_sub_field('file');
		?>
			<div class="col-12 b1-table-column">
				<?php if($file) : ?>
				<a href="#" onclick='window.open("<?php echo $file['url']; ?>"); return false;'>
					<span class="title-text _21">
						<?php if($label) : ?>
							<?php echo $label ?>
						<?php else : ?>
							Agenda File <?php echo get_row_index(); ?>
						<?php endif; ?>
					</span>
					<span class="icon-wrapper file">
						<i class="fa-solid fa-file-pdf"></i>
					</span>
				</a>
				<?php endif; ?>

			</div>
		<?php endwhile; ?>
		
		<?php while(have_rows('late_items')) : the_row(); 
			$label = get_sub_field('label');
			$file = get_sub_field('file');
		?>
			<div class="col-12 b1-table-column">
				<?php if($file) : ?>
				<a href="#" onclick='window.open("<?php echo $file['url']; ?>"); return false;'>
					<span class="title-text _21">
						<?php if($label) : ?>
							<?php echo $label ?>
						<?php else : ?>
							Late Item <?php echo get_row_index(); ?>
						<?php endif; ?>
					</span>
					
					<span class="icon-wrapper file">
						<i class="fa-solid fa-file-pdf"></i>
					</span>
				</a>
				<?php endif; ?>

			</div>
		<?php endwhile; ?>
		
		<?php while(have_rows('audio_video_links')) : the_row(); 
			$audio_or_video = get_sub_field('audio_or_video');
			$link = get_sub_field('link');
			$label = get_sub_field('label');
		?>
			<div class="col-12 b1-table-column">
				<?php if($link) : ?>
				<a href="#" onclick='window.open("<?php echo $link ?>"); return false;'>
					<span class="title-text _21">
						<?php if($label) : ?>
							<?php echo $label ?>
						<?php else : ?>
							Watch Video <?php echo get_row_index(); ?>
						<?php endif; ?>
					</span>
					
					<?php if($audio_or_video === 'audio') : ?>
						<span class="icon-wrapper">
							<i class="fa-solid fa-headphones"></i>
						</span>
					<?php endif; ?>
					
					<?php if($audio_or_video === 'video') : ?>
						<span class="icon-wrapper">
							<i class="fa-brands fa-youtube"></i>
						</span>
					<?php endif; ?>
				</a>
				<?php endif; ?>

			</div>
		<?php endwhile; ?>

	</div>
</div>