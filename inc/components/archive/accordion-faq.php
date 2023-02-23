<div class="container-fluid large-cards-container site-component-container">
	<?php if(get_field('faq_title')) : ?>
		<div class="row site-component-row b1-table-row mt-md-4 mt-2">
			<div class="col-12 b1-table-column">
				<h2 class="dark-blue title-text _33 ">
					<?php the_field('faq_title') ?>
				</h2>
			</div>
		</div>
	<?php endif; ?>
	<div class="row site-component-row large-cards-row">
		<div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1-FAQ">
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
				<div id="flush-collapse-a1-<?php echo get_row_index() ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>" data-bs-parent="#accordionFlushA1-FAQ">
					<div class="accordion-body body-text _17"><?php echo $answer ?></div>
				</div>
			</div>

			<?php endwhile; ?>

			<?php wp_reset_postdata(); ?>
			
			
		</div>
	</div>
</div>