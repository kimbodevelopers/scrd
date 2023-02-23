<?php  $bid_opportunity_status = 
	get_terms([
		'taxonomy' => 'bid_opportunity_status',
		'hide_empty' => true,
	]) 
?>

<div class="container-fluid site-component-container">
	<div class="row site-component-row">

		<?php if(get_field('closing_date')) : ?>
			<div class="col-12 site-component-column">
				<p class="title-text _21">Closing Date: <?php the_field('closing_date') ?></p>
			</div>
		<?php endif; ?>

		<?php if(have_rows('bid_result_fields')) : ?>

			<?php while(have_rows('bid_result_fields')) : the_row(); 
				$award_recipient = get_sub_field('award_recipient');
				$amount = get_sub_field('amount');
			?>

				<?php if($award_recipient) : ?>
					<div class="col-12 site-component-column">
						<p class="title-text _21">Awarded to: <?php echo $award_recipient ?></p>
					</div>
				<?php endif; ?>

				<?php if($amount) : ?>
					<div class="col-12 site-component-column">
						<p class="title-text _21">Amount: <?php echo $amount ?></p>
					</div>
				<?php endif; ?>

			<?php endwhile; ?>
		<?php endif; ?>
		
		<?php if(get_the_terms( $post->ID , 'bid_opportunity_status')) : ?>
			<div class="col-12 site-component-column">
				<p class="title-text _21">Status: <?php echo get_the_terms( $post->ID , 'bid_opportunity_status')[0]->name ?></p>
			</div>
		
		<?php else : ?>
			<div class="col-12 site-component-column">
				<p class="title-text _21">Status: Open</p>
			</div>
	
		<?php endif; ?>
	</div>
</div>




<?php if(have_rows('bid_file')) : ?>
	<div class="container-fluid site-component-container b1-table-container">
		<div class="row site-component-row b1-table-row">

			<?php while(have_rows('bid_file')) : the_row(); 
				$label = get_sub_field('file_name');
				$file = get_sub_field('file');
			?>
			<div class="col-12 b1-table-column">

				<?php if($file) : ?>
					<a href="#" onclick='window.open("<?php echo $file['url']; ?>"); return false;' class="<?php if(get_the_terms( $post->ID , 'bid_opportunity_status')[0]->slug === 'closed') : ?> disable-downloads <?php endif; ?>" >
						<span class="title-text _21"><?php echo $label ?></span>
						<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
					</a>
				<?php endif; ?>

			</div>
			<?php endwhile; ?>

		</div>
	</div>
<?php endif; ?>

<?php if(have_rows('supplemental_files')) : ?>
	<div class="container-fluid site-component-container b1-table-container">
		<div class="row site-component-row b1-table-row">

			<?php while(have_rows('supplemental_files')) : the_row(); 
				$label = get_sub_field('file_name');
				$file = get_sub_field('file');
			?>
			<div class="col-12 b1-table-column">

				<?php if($file || $label) : ?>
					<a href="#" onclick='window.open("<?php echo $file['url']; ?>"); return false;'  class="<?php if(get_the_terms( $post->ID , 'bid_opportunity_status')[0]->slug === 'closed') : ?> disable-downloads <?php endif; ?>">
						<span class="title-text _21"><?php echo $label ?></span>
						<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
					</a>
				<?php endif; ?>

			</div>
			<?php endwhile; ?>

		</div>
	</div>
<?php endif; ?>