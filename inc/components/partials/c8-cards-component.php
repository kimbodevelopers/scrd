<div class="col-12 col-lg-3 col-md-4 col-sm-6 c8-card-column">
	<?php $original_post_type = str_replace(' ', '-', $post->post_type) ?>
	<?php $original_post_id = $post->ID ?>

    <div class="c8-card-wrapper" >
		
		<a type="button" data-bs-toggle="modal" data-bs-target="#<?php echo str_replace(' ', '-', $post->post_type) ?>-<?php echo $post->ID ?>">

			<div class="body-text _15 card-doc-type-wrapper">
				<span class="card-doc-type">
					<?php if($post->post_type === 'attachment') : ?>
						DOCUMENT
					<?php elseif($post->post_type === 'ocp') : ?>
						OFFICIAL COMMUNITY PLAN
					<?php else : ?>
						<?php echo strtoupper(str_replace('-', ' ', $post->post_type)) ?>
					<?php endif; ?>
				</span>
			</div>

        
			<p class="body-text _15 card-taxonomy">

				<?php 
					$post_type = get_post_type(get_the_ID());   
					$taxonomies = get_object_taxonomies($post_type);   
					$taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 

					if(!empty($taxonomy_names)) :

						foreach($taxonomy_names as $key=>$value) : ?>
							<span><?php if($key !== 0) : ?>|<?php endif; ?> <?php echo $value; ?>  </span>
						<?php endforeach;

					endif;
				?>   
			</p>
		


			<h3 class="title-text _21 c8-card-title" <?php if($post->post_type !== 'attachment') : ?>type="button" data-bs-toggle="modal"<?php endif; ?> data-bs-target="#<?php echo $original_post_type ?>-<?php echo $original_post_id ?>">
				<?php if($post->post_type !== 'attachment') : ?>

					<?php if($post->post_type === 'agenda' || $post->post_type === 'board-minutes') : ?>

						<?php the_field('date') ?>						

					<?php else : ?>

						<?php if($post->post_type === 'building-permits') : ?>
							<?php echo explode(' ', $post->post_title)[1] ?>
						<?php else : ?>
							<?php the_title(); ?>
						<?php endif; ?>

					<?php endif; ?>

				<?php else : ?>

					<?php the_title(); ?>

				<?php endif; ?>
			</h3>
		
			<?php if($post->post_type === 'bid-opportunities' && $taxonomy_names[0] === 'Closed' ) : ?>
				<p class="body-text _17">Status: <?php echo $taxonomy_names[0] ?></p>			
			<?php endif; ?>

			<?php if($post->post_type === 'bid-opportunities' && $taxonomy_names[0] !== 'Closed' ) : ?>
				<p class="body-text _17">Status: Open</p>			
			<?php endif; ?>
		

			<div class="files-wrapper">

				<!-- standard files -->
				<?php if(have_rows('files') || get_field('file')) : ?>
					<?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-standard') ?>
				<?php endif; ?>


				<!-- Bid Opportunity Files -->
				<?php if($post->post_type === 'bid-opportunities') : ?>
					<?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-bid-opportunities') ?>
				<?php endif; ?>

				<!-- Attachment Files -->

				<?php if($post->post_type === 'attachment') : ?>
					<?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-attachment') ?>
				<?php endif; ?>

				<!-- Agenda Files -->
				<?php if($post->post_type === 'agendas') : ?>
					<?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-agendas') ?>
				<?php endif; ?>

				<!-- OCP Files -->

				<?php if($post->post_type === 'ocp') : ?>
					<?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-ocp') ?>

				<?php endif; ?>

				<!-- Bylaw Files -->
				<?php if($post->post_type === 'bylaws') : ?>
					<?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-bylaws') ?>
				<?php endif; ?>

				<!-- News -->
				<?php if($post->post_type === 'news') : ?>
					<a type="button" data-bs-toggle="modal" data-bs-target="#<?php echo str_replace(' ', '-', $post->post_type) ?>-<?php echo $post->ID ?>">Read More</a>
				<?php endif; ?>
			</div>
		</a>
    </div>
	
	<div class="modal fade" id="<?php echo $original_post_type ?>-<?php echo $original_post_id ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $original_post_id ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="modalLabel-<?php echo $original_post_id ?>"></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<?php get_template_part('inc/components/partials/single-partial/single-template') ?>
				</div>

			</div>
		</div>
	</div>
</div>