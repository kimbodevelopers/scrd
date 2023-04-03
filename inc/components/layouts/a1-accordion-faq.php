<?php if( get_row_layout() == 'a1_accordion_faq' ): ?>

	<?php $remove_padding = get_sub_field('remove_padding'); ?>
	
    <div class="container-fluid large-cards-container site-component-container">
		<?php $count = $post->ID + get_row_index() ?>
		
        <?php if(get_sub_field('title')) :?>
            <div class="row site-component-row">
                <div class="col-12"><h2 class="title-text _33 col-12 dark-blue"><?php echo get_sub_field('title') ?></h2></div>
            </div>
        <?php endif; ?>

        <?php if(get_sub_field('description')) : ?>
            <div class="row site-component-row">
                <div class="mb-3 col-md-10 col-12"><?php echo get_sub_field('description') ?></div>
            </div>
        <?php endif; ?>

        <div class="row site-component-row large-cards-row">
            <div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1-<?php echo $count ?>">

                <?php $accordion_option = get_sub_field('accordion_option') ?>

                <?php while(have_rows('attachments_rows')) : the_row(); 
                    $attachment_topic = get_sub_field('attachment_topic');
                ?>

                    <div class="accordion-item">
                        <h3 class="accordion-header" id="flush-heading-a1-<?php echo get_row_index() ?>-<?php echo $count ?>">
                            <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $count ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $count ?>">
                                <?php echo $attachment_topic ?>
                            </button>
                        </h3>

                        <div id="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $count ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>-<?php echo $count ?>" data-bs-parent="#accordionFlushA1-<?php echo $count ?>">
                            <div class="accordion-body body-text _17">

                                <div class="container-fluid site-component-container b1-table-container">
                                    <div class="row site-component-row b1-table-row">

                                    <?php while(have_rows('attachments')) : the_row(); 
                                        $label = get_sub_field('label');
                                        $file = get_sub_field('file');
                                    ?>
                                        <div class="col-12 b1-table-column">

                                            <?php if($file) : ?>
                                                <a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
                                                    <span class="title-text _21"><?php echo $label ?></span>
                                                    <span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
                                                </a>
                                            <?php endif; ?>


                                        </div>
                                    <?php endwhile; ?>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>


                <?php endwhile; ?>
            </div>

        </div>

    </div>
<?php endif; ?>