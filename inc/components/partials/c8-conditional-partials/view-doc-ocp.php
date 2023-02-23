<?php if( get_field('ocp_main_document') || get_field('ocp_files') || get_field('additional_ocp_files') ) : ?>

    <?php 
        $total_files = 0;

        if(get_field('ocp_main_document')) {
            $total_files += count(get_field('ocp_main_document'));
        }
            
        if(get_field('ocp_files')) { 
            $total_files += count(get_field('ocp_files'));
        } 

        if(get_field('additional_ocp_files')) {
            $total_files += count(get_field('additional_ocp_files'));
        }
        
    ?>

    <?php if( $total_files - 1 > 1) : ?>
        
		<?php echo $total_files - 1 ; ?>

		Documents - Show All >>
    <?php else : ?>

        <?php while(have_rows('ocp_main_document')) : the_row(); 
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

<?php endif; ?>