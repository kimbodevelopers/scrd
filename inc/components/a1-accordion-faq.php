<?php if( get_row_layout() == 'a1_accordion_faq' ): ?>


    <div class="container-fluid large-cards-container site-component-container">

        <?php if(get_sub_field('title')) :?>
            <div class="row site-component-row">
                <h2 class="title-text _33 col-12"><?php echo get_sub_field('title') ?></h2>
            </div>
        <?php endif; ?>

        <?php if(get_sub_field('description')) : ?>
            <div class="row site-component-row">
                <div class="mb-3"><?php echo get_sub_field('description') ?></div>
            </div>
        <?php endif; ?>

        <div class="row site-component-row large-cards-row">
            <div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1">

                <?php while(have_rows('frequently_asked_questions')) : the_row(); 
                    $question = get_sub_field('question');
                    $answer = get_sub_field('answer');
                ?>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="flush-heading-a1-<?php echo get_row_index() ?>">
                            <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo get_row_index() ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo get_row_index() ?>">
                                <?php echo $question ?>
                            </button>
                        </h3>
                        <div id="flush-collapse-a1-<?php echo get_row_index() ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>" data-bs-parent="#accordionFlushA1">
                            <div class="accordion-body body-text _17"><?php echo $answer ?></div>
                        </div>
                    </div>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>

            </div>

        </div>

    </div>
<?php endif; ?>