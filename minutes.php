<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Minutes */

global $post;

?>

<?php get_template_part('inc/components/breadcrumb') ?>

<div class="container-fluid site-component-container minutes-container">
    <div class="row site-component-row">
        <div class="col-12 ">
            <h1 class="title-text _50 col-12 minutes-title mb-0"><?php the_title() ?></h1>
        </div>
    </div>
</div>

<div class="container-fluid site-component-container document-library-container agendas-filter-container">
	
	<div class="row site-component-row document-library-filter-row">
		
        <?php echo do_shortcode('[facetwp facet="year_issued"]') ?>
		<?php echo do_shortcode('[facetwp facet="meeting_status"]') ?>
		
		
		<div class="col-lg-3 col-md-4 col-sm-6  col-12">
            <button onclick="FWP.reset()" class="global-submit document-reset">Reset</button>
        </div>
		
	</div>
</div>
	
<?php if(get_field('minutes_content')) : ?>
<div class="container-fluid site-component-container t1-container minutes-content-container">
	<div class="row site-component-row t1-row">
		<div class="col-12 t1-column">
			<?php the_field('minutes_content') ?>
		</div>
	</div>
</div>
<?php endif; ?>

<?php 

	$years_issued = 
		get_terms([
			'taxonomy' => 'year_issued',
			'hide_empty' => true,
		]);

	$meeting_statuses = 
		get_terms([
			'taxonomy' => 'meeting_status',
			'hide_empty' => true
		]);

	$minutes = new WP_Query(array(
		'post_type' => 'board-minutes',
		'posts_per_page' => -1,
		'post__status' => 'published',
		'order' => 'ASC',
		'orderby' => get_field('date'),
		'facetwp' => true,
	));

	$wp_query = $minutes;
?>

<?php $years = []; ?>

<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
	<?php foreach($years_issued as $year_issued ) : ?>
		<?php if(get_the_terms( $post->ID , 'year_issued')[0]->slug === $year_issued->slug) : ?>
			<?php array_push($years, get_the_terms( $post->ID , 'year_issued')[0]->name)  ?>
		<?php endif; ?>
	<?php endforeach ?>
<?php endwhile ?>
<?php $unique_years = array_unique($years) ?>

<div class="container-fluid site-component-container b1-table-container facetwp-template">
	
	<div class="row site-component-row large-cards-row">
		<div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1-building-permits">
			
			<?php foreach($unique_years as $unique_year ) : ?>
				<div class="accordion-item">

						<h3 class="accordion-header" id="flush-heading-a1-<?php echo get_row_index() ?>-<?php echo $unique_year ?>">
							<button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $unique_year ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $unique_year ?>">
								<?php echo $unique_year ?>
							</button>
						</h3>

						<div id="flush-collapse-a1-<?php echo get_row_index() ?>-<?php echo $unique_year ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>-<?php echo $unique_year ?>" data-bs-parent="#accordionFlushA1-building-permits">
							<div class="accordion-body body-text _17">

								<div class="container-fluid site-component-container b1-table-container">
									<div class="row site-component-row b1-table-row">
										
										<?php 
				
											$minutes = new WP_Query(array(
												'post_type' => 'board-minutes',
												'posts_per_page' => -1,
												'post__status' => 'published',
												'order' => 'ASC',
												'orderby' => get_field('date'),
												'tax_query' => array(
													array(
														'taxonomy' => 'year_issued',
														'terms' => $unique_year,
														'field' => 'slug',

													)
												),
											));

											$wp_query = $minutes;
										?>   
										

										<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
											<div class="col-12 b1-table-column">

												<?php $file = get_field('file')['url'] ?>
											
												<?php if($file) : ?>
													<a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
														<span class="title-text _21">
															<?php if(get_field('file')) : ?>
																<?php $file = get_field('file')['url'] ?>
															
																
																<?php echo get_field('date') ?>

																<?php if(get_the_terms( $post->ID , 'meeting_status')[0]->name ) : ?>
																<br>
																*<?php echo get_the_terms( $post->ID , 'meeting_status')[0]->name ?>
																<?php endif; ?>
															
															<?php else : ?>
																<?php the_title(); ?>
															<?php endif; ?>

														</span>
														<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
													</a>
												
												<?php else : ?>
													<?php the_title(); ?>
												<?php endif; ?>

											</div>
										<?php endwhile; ?>

									</div>
								</div>

							</div>
						</div>


				</div>
			
			<?php endforeach ?>
			
		</div>
	</div>
</div>




<?php get_footer(); ?>