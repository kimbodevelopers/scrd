<?php if(get_field('date_released')) : ?>
	<div class="container-fluid site-component-container t1-container">
    	<div class="row site-component-row t1-row">
			<div class="col-12 t1-column">
				<span>Date Released: </span><?php the_field('date_released') ; ?>
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
		?>
		<div class="col-12 b1-table-column">

			<?php if($file) : ?>
			<a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
				<span class="title-text _21">Download</span>
				<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
			</a>
			<?php endif; ?>

			<?php if($link) : ?>
			<a href="<?php echo $link ?>" target="__blank">
				<span class="title-text _21">Coast Current Link</span>
				<span class="icon-wrapper file"><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
			</a>
			<?php endif; ?>

		</div>
		<?php endwhile; ?>

	</div>
</div>