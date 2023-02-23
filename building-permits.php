<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Building Permits */

global $post;

?>
<?php get_template_part('inc/components/breadcrumb') ?>

<?php if(get_field('building_permits_content')) : ?>
	<div class="container-fluid site-component-container t1-container">
		<div class="row site-component-row t1-row">
			
			<div class="col-12 t1-column">
				<div class="body-text _17 t1-content"><?php echo get_field('building_permits_content') ?></div>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if(have_rows('forms_and_checklists')) : ?>
	<div class="container-fluid site-component-container b1-table-container">
		<div class="row site-component-row b1-table-row">

			<?php while(have_rows('forms_and_checklists')) : the_row(); 
				$label = get_sub_field('label');
				$file = get_sub_field('file');

			?>
			<div class="col-12 b1-table-column">

				<?php if($file) : ?>
				<a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
					<span class="title-text _21"><?php echo $label ?></span>
					<span class="icon-wrapper"><i class="fa-solid fa-file-pdf"></i></span>
				</a>
				<?php endif; ?>

			</div>
			<?php endwhile; ?>

		</div>
	</div>
<?php endif; ?>

<?php get_template_part('inc/components/archive/accordion-faq') ?>


<div class="container-fluid site-component-container">
	<div class="row site-component-row">
		<div class="col-12">
            <h2 class="title-text _33 dark-blue"><?php echo get_field('building_permits_title') ?></h2>
        </div>
	</div>
</div>

<?php 
	
	$years_issued = get_terms([
		'taxonomy' => 'year_issued',
		'hide_empty' => true,
	]);

	$building_permits = new WP_Query(array(
		'post_type' => 'building-permits',
		'posts_per_page' => -1,
		'post__status' => 'published',
		'order' => 'DESC',

	));

	$wp_query = $building_permits;
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

<div class="container-fluid site-component-container b1-table-container">
	
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
				
											$building_permits = new WP_Query(array(
												'post_type' => 'building-permits',
												'posts_per_page' => -1,
												'post__status' => 'published',
												'orderby' => array(
													'menu_order'=>'DESC',
												),
												'tax_query' => array(
													array(
														'taxonomy' => 'year_issued',
														'terms' => $unique_year,
														'field' => 'slug',

													)
												),
											));

											$wp_query = $building_permits;
										?>   
										

										<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
											<div class="col-12 b1-table-column">

												<?php if(get_field('file')) : ?>
													<a href="#" onclick='window.open("<?php echo get_field('file')['url']; ?>"); return false;'>
														<span class="title-text _21"><?php echo ucfirst(explode(' ', $post->post_title)[1]) ?></span>
														<span class="icon-wrapper"><i class="fa-solid fa-file-pdf"></i></span>
													</a>
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




<?php get_template_part('inc/components/contacts/building-contact') ?>


<?php get_footer(); ?>