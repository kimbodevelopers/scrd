<?php if(have_rows('late_items')) : ?>
    <?php if(count(get_field('late_items')) >= 1) : ?>
        Documents - Show All >>
    
    <?php else : ?>

        <?php while(have_rows('agenda_files')) : the_row(); 
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

<?php else : ?>
	<?php while(have_rows('agenda_files')) : the_row(); 
        $file = get_sub_field('file');
    ?>
        <?php if($file) : ?>
			<i class="fa-solid fa-file-pdf"></i>
			<div class="text-wrapper pl-2">
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

