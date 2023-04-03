<?php if(get_field('related_post')) : ?>

	<?php 
		$related_post = get_field('related_post'); 
		$post = $related_post;
		setup_postdata( $post );
	?>

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

    <?php endif; ?>

    <?php echo $total_files - 1 ; ?> Documents - Show All >>
<?php endif; ?>

<?php if(get_field('bylaw_file')) : ?>
    
        <i class="fa-solid fa-file-pdf"></i>
        <div class="text-wrapper">
            <span class="view-text">View this document</span>
            <span class="file-size">

                <?php if(intval(get_field('bylaw_file')['filesize']) * 0.001 < 1) : ?>
                        <?php echo number_format(get_field('bylaw_file')['filesize'], 2) ?> KB
                    <?php else : ?>
                        <?php echo number_format(get_field('bylaw_file')['filesize'] * 0.001) ?> KB
                <?php endif; ?>
            </span>
        </div>
   
<?php endif; ?>
