<?php defined('ABSPATH') or die(""); ?>

<?php get_header(); 
/* Template Name: Agendas */

global $post;

?>

<?php get_template_part('inc/components/breadcrumb') ?>

<div class="container-fluid site-component-container document-library-container agendas-filter-container">
	<div class="row site-component-row document-library-filter-row">
		<div class="col-12">
            <h1 class="title-text _50 dark-blue"><?php the_title() ?></h1>
        </div>
	</div>
</div>

<?php if(get_field('agendas_content')) : ?>
	<div class="container-fluid site-component-container t1-container">
		<div class="row site-component-row t1-row">
			<div class="col-12 t1-column">
				<div class="body-text _17 t1-content"><?php echo get_field('agendas_content') ?></div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if(get_field('agendas_accordion')) : ?>
	<div class="container-fluid large-cards-container site-component-container">
		<div class="row site-component-row large-cards-row">
            <div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1">
		
				<?php while(have_rows('agendas_accordion')) : the_row(); 
					$agenda_subheader = get_sub_field('agenda_subheader');
					$content = get_sub_field('content');
				?>
				<div class="accordion-item">

					<h3 class="accordion-header" id="flush-heading-a1-<?php echo get_row_index() ?>">
						<button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo get_row_index() ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo get_row_index() ?>">
							<?php echo $agenda_subheader ?>
						</button>
					</h3>
					<div id="flush-collapse-a1-<?php echo get_row_index() ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>" data-bs-parent="#accordionFlushA1">
						<div class="accordion-body body-text _17"><?php echo $content ?></div>
					</div>
				</div>

				<?php endwhile; ?>
				
				
			</div>
		</div>
	</div>
<?php endif; ?>

<?php get_template_part('inc/components/partials/a2-upcoming-meetings') ?>

<div class="container-fluid site-component-container document-library-container agendas-filter-container">
	
	<div class="row site-component-row document-library-filter-row">
		
        <?php echo do_shortcode('[facetwp facet="year_issued"]') ?>
        <?php echo do_shortcode('[facetwp facet="agenda_type"]') ?>
		<?php echo do_shortcode('[facetwp facet="meeting_status"]') ?>
		
		<div class="col-lg-3 col-md-4 col-sm-6  col-12">
            <button onclick="FWP.reset()" class="global-submit document-reset">Reset</button>
        </div>
		
	</div>
</div>



<div class="container-fluid site-component-container document-library-container agendas-container facetwp-template">
	<div class="row title-header">
		<div class="col-4">
			<strong>Agenda</strong>
		</div>
		
		<div class="col-4">
			<strong>Late Item</strong>
		</div>
		
		<div class="col-4">
			<strong>Watch</strong>
		</div>
	</div>
	
	<div class="row site-component-row a3-meeting-category-row">
		<div class="col-12">
			<h2 class="title-text _33 dark-blue">Past Meetings</h2>
		</div>
	</div>

	<?php $agenda_types = get_terms('agenda_type') ?>
	
	
	<?php  $agenda_terms = 
		get_terms([
			'taxonomy' => 'agenda_type',
			'hide_empty' => true,
		]) 
	?>

	<?php  $meeting_status = 
		get_terms([
			'taxonomy' => 'meeting_status',
			'hide_empty' => true,
		]) 
	?>
	
	<?php 
	
        $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;
		
        if( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }
	
		$args = array (
			'post_type' => 'agendas',
			'posts_per_page' => 20, 
			'hide_empty'=> 1, 
			'order' => 'ASC', 
			'facetwp' => true,
			'paged' => $paged,
		);

		$wp_query = new WP_Query( $args ); 

	?>
		<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
			<?php foreach($agenda_terms as $agenda_term) : ?>

				<?php if(get_the_terms( $post->ID , 'agenda_type')[0]->slug === $agenda_term->slug) : ?>
				<div class="row site-component-row agenda-type-<?php echo $agenda_term->slug ?> a3-meeting-category-row">
					<div class="col-md-6 ">
						<span class="body-text _21 dark-blue">
							<?php echo $agenda_term->name ?>
						</span>
					</div>
					<div class="col-2 agenda-file-header desktop">
						<span class="body-text _17">Agendas</span>
					</div>
					
					<div class="col-2 agenda-file-header desktop">
						<span class="body-text _17">Late Items</span>
					</div>
					
					<div class="col-2 agenda-file-header desktop">
						<span class="body-text _17">Watch</span>
					</div>
					
				</div>
	
				<?php get_template_part('inc/components/partials/a3-meeting-component') ?>
				


				<?php endif; ?>
		

			<?php endforeach ?>

		<?php endwhile; ?>
	
	
		<?php if(paginate_links()) : ?>
			<div class="row pagination-row site-component-row mt-5 mb-5">
				<div class="col-12 text-center">
					<div class="pagination-wrapper">
						<?php echo paginate_links(array(
							'next_text' => '<span class="paginate-icon next-icon"><i class="fa-solid fa-chevron-right"></i></span>',
							'prev_text' => '<span class="paginate-icon prev-icon"><i class="fa-solid fa-chevron-left"></i></span>'
						)); ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
		
		<?php  wp_reset_query(); ?>

	
	<script>
		<?php foreach($agenda_terms as $agenda_term) : ?>
			$('.agenda-type-<?php echo $agenda_term->slug ?>').not(':first').hide()		
		<?php endforeach ?>
		
		let previousUrl = '';
		const observer = new MutationObserver(function(mutations) {
		  if (window.location.href !== previousUrl) {
			  previousUrl = window.location.href;
			  		<?php foreach($agenda_terms as $agenda_term) : ?>
						$('.agenda-type-<?php echo $agenda_term->slug ?>').not(':first').hide()		
					<?php endforeach ?>
			}
		});
		const config = {subtree: true, childList: true};

		// start listening to changes
		observer.observe(document, config);

			
		
	</script>
	


</div>
<?php get_footer(); ?>