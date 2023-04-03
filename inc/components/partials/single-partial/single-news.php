<?php if(get_field('date_released')) : ?>
	<div class="container-fluid site-component-container t1-container mt-3">
    	<div class="row site-component-row t1-row">
			<div class="col-12 t1-column">
				<span class="body-text _21">Date Released: <?php the_field('date_released') ; ?></span>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if(get_field('content')) : ?>
	<div class="container-fluid site-component-container t1-container">
		<div class="row site-component-row t1-row">
			<div class="col-12 t1-column">
				<?php the_field('content') ?>
			</div>
		</div>
	</div>
<?php endif; ?>
		
<div class="container-fluid site-component-container b1-table-container">
	<div class="row site-component-row b1-table-row">

		<?php while(have_rows('media_attachment')) : the_row(); 
	
			$file = get_sub_field('file');
			$link = get_sub_field('link');
			$label = get_sub_field('label');
			$attachment_type = get_sub_field('attachment_type');
		?>
		<div class="col-12 b1-table-column">
			
			<?php if ($attachment_type === 'file') : ?>
				<?php if($file) : ?>
					<a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
						<?php if($label) : ?>
							<span class="title-text _21"><?php echo $label ?></span>
						<?php else : ?>
							<span class="title-text _21">Download</span>
						<?php endif; ?>

						<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
					</a>
				<?php endif; ?>
			<?php endif; ?>
			
			<?php if ($attachment_type === 'link') : ?>
				<?php if($link) : ?>
					<a href="<?php echo $link ?>" target="__blank">
						<?php if($label) : ?>
							<span class="title-text _21"><?php echo $label ?></span>
						<?php else : ?>
							<span class="title-text _21">Link</span>
						<?php endif; ?>
						<span class="icon-wrapper file"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
					</a>
				<?php endif; ?>
			<?php endif; ?>

		</div>
		<?php endwhile; ?>

	</div>
</div>