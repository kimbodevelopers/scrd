<?php if(count(get_field('files')) > 1) : ?>
    <?php echo count(get_field('files')) ; ?> Documents - Show All >>
<?php else : ?>
    <?php while(have_rows('files')) : the_row(); 
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

<?php if(get_field('file') ) : ?>
	<i class="fa-solid fa-file-pdf"></i>
	<div class="text-wrapper">
		<span class="view-text">View this document</span>
	</div>
<?php endif; ?>
