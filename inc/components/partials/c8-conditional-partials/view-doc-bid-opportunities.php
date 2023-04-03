<?php if(have_rows('supplemental_files')) : ?>

	<?php echo count(get_field('supplemental_files')) + 1; ?> Documents - Show All >>
<?php else : ?>
    <?php while(have_rows('bid_file')) : the_row(); 
        $file = get_sub_field('file');
    ?>
        <?php if($file) : ?>
			<i class="fa-solid fa-file-pdf"></i>
			<div class="text-wrapper">
				<span class="view-text">View this document</span>
				<span class="file-size">

					<?php if(intval($file['filesize']) * 0.001 < 1) : ?>
						<?php echo number_format($file['filesize'], 2) ?> KB
					<?php else : ?>
						<?php echo number_format($file['filesize'] * 0.001) ?> KB
					<?php endif; ?>
				</span>
			</div>
        <?php endif; ?>

    <?php endwhile; ?>
<?php endif; ?>