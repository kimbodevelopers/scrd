<?php if( get_row_layout() == 'a1_accordion_faq' ): ?>


    <div class="container-fluid large-cards-container site-component-container">

        <?php if(get_sub_field('title')) :?>
            <div class="row site-component-row">
                <div class="col-12"><h2 class="title-text _33 col-12"><?php echo get_sub_field('title') ?></h2></div>
            </div>
        <?php endif; ?>

        <?php if(get_sub_field('description')) : ?>
            <div class="row site-component-row">
                <div class="mb-3"><?php echo get_sub_field('description') ?></div>
            </div>
        <?php endif; ?>

        <div class="row site-component-row large-cards-row">
            <div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1">

                <?php if(get_sub_field('accordion_option') === 'faq') : ?>

                    <?php $accordion_option = get_sub_field('accordion_option') ?>

                    <?php while(have_rows('frequently_asked_questions')) : the_row(); 
                        $question = get_sub_field('question');
                        $answer = get_sub_field('answer');
                    ?>
                        <div class="accordion-item">

                            <h3 class="accordion-header" id="flush-heading-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>">
                                <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>">
                                    <?php echo $question ?>
                                </button>
                            </h3>
                            <div id="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" data-bs-parent="#accordionFlushA1">
                                <div class="accordion-body body-text _17"><?php echo $answer ?></div>
                            </div>
                        </div>

                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>

                <?php if(get_sub_field('accordion_option') === 'table') : ?>

                    <?php $accordion_option = get_sub_field('accordion_option') ?>

                    <?php while(have_rows('table_rows')) : the_row(); 
                        $table_topic = get_sub_field('table_topic');
                        $table_content = get_sub_field('table_content');
                    ?>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="flush-heading-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>">
                                <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>">
                                    <?php echo $table_topic ?>
                                </button>
                            </h3>
                            <div id="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" data-bs-parent="#accordionFlushA1">
                                <div class="accordion-body body-text _17">

                                    <div class="container-fluid site-component-container b3-table-container">
                                        <div class="row site-component-row b3-table-row">


                                            <div class="col-12 b3-table-column">

                                                <?php 

                                                    $table = get_sub_field( 'table' );

                                                    if ( ! empty ( $table ) ) {
                                                        echo '<table border="0">';
                                                            if ( ! empty( $table['caption'] ) ) {
                                                                echo '<caption>' . $table['caption'] . '</caption>';
                                                            }
                                                            if ( ! empty( $table['header'] ) ) {
                                                                echo '<thead>';
                                                                    echo '<tr>';
                                                                        foreach ( $table['header'] as $th ) {
                                                                            echo '<th>';
                                                                                echo $th['c'];
                                                                            echo '</th>';
                                                                        }
                                                                    echo '</tr>';
                                                                echo '</thead>';
                                                            }

                                                            echo '<tbody>';
                                                                foreach ( $table['body'] as $tr ) {
                                                                    echo '<tr>';
                                                                        foreach ( $tr as $td ) {
                                                                            echo '<td>';
                                                                                echo $td['c'];
                                                                            echo '</td>';
                                                                        }
                                                                    echo '</tr>';
                                                                }
                                                            echo '</tbody>';
                                                        echo '</table>';
                                                    }

                                                ?>

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>


                    <?php endwhile; ?>

                    <?php wp_reset_postdata(); ?>

                <?php endif; ?>

                <?php if(get_sub_field('accordion_option') === 'attachments') : ?>

                    <?php $accordion_option = get_sub_field('accordion_option') ?>

                    <?php while(have_rows('attachments_rows')) : the_row(); 
                        $attachment_topic = get_sub_field('attachment_topic');
                    ?>

                        <div class="accordion-item">
                            <h3 class="accordion-header" id="flush-heading-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>">
                                <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>">
                                    <?php echo $attachment_topic ?>
                                </button>
                            </h3>

                            <div id="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" data-bs-parent="#accordionFlushA1">
                                <div class="accordion-body body-text _17">

                                    <div class="container-fluid site-component-container b1-table-container">
                                        <div class="row site-component-row b1-table-row">

                                        <?php while(have_rows('attachments')) : the_row(); 
                                            $label = get_sub_field('label');
                                            $file = get_sub_field('file');
                                            $link = get_sub_field('link');
                                            $image = get_sub_field('image');
                                        ?>
                                            <div class="col-12 b1-table-column">

                                                <?php if($file) : ?>
                                                    <a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
                                                        <span class="title-text _21"><?php echo $label ?></span>
                                                        <span><i class="fa-solid fa-file-pdf"></i></span>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if($link) : ?>
                                                    <a href="<?php echo $link ?>" target="__blank">
                                                        <span class="title-text _21"><?php echo $label ?></span>
                                                        <span><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                                                    </a>
                                                <?php endif; ?>

                                                <?php if($image) : ?>

                                                    <button type="button" class="btn image-row-wrapper" data-bs-toggle="modal" data-bs-target="#imageModal-<?php echo $image['name'] ?>">
                                                        <span class="title-text _21"><?php echo $label ?></span>
                                                        <span><i class="fa-regular fa-image"></i></span>                    
                                                    </button>

                                                    <div class="modal fade" id="imageModal-<?php echo $image['name'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                        
                                                <?php endif; ?>

                                            </div>
                                        <?php endwhile; ?>

                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>


                    <?php endwhile; ?>
                    



                <?php endif; ?>


            </div>

        </div>

    </div>
<?php endif; ?>