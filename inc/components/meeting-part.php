
    <div class="accordion-item">

        <h3 class="accordion-header" id="flush-heading-<?php echo $post_index; ?>">

            <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-<?php echo $post_index; ?>" aria-expanded="false" aria-controls="flush-collapse-<?php echo $post_index; ?>">
                <?php the_title(); ?>
            </button>

        </h3>

        <div id="flush-collapse-<?php echo $post_index; ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo $post_index; ?>" data-bs-parent="#accordionFlushA2">
            <div class="accordion-body body-text _17"><?php the_content(); ?></div>
        </div>
    </div>

        