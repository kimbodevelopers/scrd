<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Bid Opportunities and Results */

global $post;

?>



<?php 

	$args = array (
		'post_type' => 'bid-opportunities',
		'posts_per_page' => -1, 
		'hide_empty'=> 1, 
		'order' => 'ASC', 
		'facetwp' => true,
		'tax_query' => array(
			array(
				'taxonomy' => 'bid_opportunity_status',
				'field' => 'slug',
				'terms' => 'closed',
				'operator' => 'NOT IN',
			),
		)
	);

	$wp_query = new WP_Query( $args ); 
?>   

<?php get_template_part('inc/components/breadcrumb') ?>
	
<div class="container-fluid site-component-container bylaws-container">
	<div class="row site-component-row bylaws-row">
		<div class="col-12">
            <h1 class="title-text _50 dark-blue mb-0"><?php the_title() ?></h1>
        </div>
	</div>
</div>

<?php get_template_part('inc/components/custom-text-group') ?>

<div class="container-fluid site-component-container bid-opportunities-container">
	<div class="row site-component-row bylaws-row">
		<div class="col-12">
            <h2 class="title-text _33 dark-blue">Bid Opportunities for the Current Year</h2>
        </div>
	</div>
	
    <div class="row site-component-row">
		<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

			<!-- Modal -->

			<div class="modal fade" id="<?php echo str_replace(' ', '-', $post->post_type)?>-<?php echo $post->ID ?>" tabindex="-1" aria-labelledby="bidModalLabel-<?php echo $post->ID?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="bidModalLabel-<?php echo $post->ID ?>"></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<?php get_template_part('inc/components/partials/single-partial/single-bid') ?>
						</div>

					</div>
				</div>
			</div>

			<?php get_template_part('inc/components/partials/c8-cards-component') ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	
    </div>
</div>


<?php 

	$args = array (
		'post_type' => 'bid-opportunities',
		'posts_per_page' => -1, 
		'hide_empty'=> 1, 
		'order' => 'ASC', 
		'facetwp' => true,
		'tax_query' => array(
			array(
				'taxonomy' => 'bid_opportunity_status',
				'field' => 'slug',
				'terms' => 'closed',
			),
		)
	);

	$wp_query = new WP_Query( $args ); 
?>   
	

<div class="container-fluid site-component-container bid-opportunities-container">
	<div class="row site-component-row bylaws-row">
		<div class="col-12">
            <h2 class="title-text _33 dark-blue">Bid Results for the Current Year</h2>
        </div>
	</div>
	
    <div class="row site-component-row">
		<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>

			<!-- Modal -->

			<div class="modal fade" id="<?php echo str_replace(' ', '-', $post->post_type)?>-<?php echo $post->ID ?>" tabindex="-1" aria-labelledby="bidModalLabel-<?php echo $post->ID?>" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="bidModalLabel-<?php echo $post->ID ?>"></h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
						</div>
						<div class="modal-body">
							<?php get_template_part('inc/components/partials/single-partial/single-bid') ?>
						</div>

					</div>
				</div>
			</div>

			<?php get_template_part('inc/components/partials/c8-cards-component') ?>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	
    </div>
</div>


<?php 

	$args = array (
		'post_type' => 'bid-results',
		'posts_per_page' => -1, 
		'hide_empty'=> 1, 
		'order' => 'ASC', 
		'facetwp' => true,
	);

	$wp_query = new WP_Query( $args ); 
?>   

<div class="container-fluid large-cards-container site-component-container">
	<div class="row site-component-row large-cards-row">
		<div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1">
			<h3 class="accordion-header" id="flush-heading-a1-results">
				<button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-results" aria-expanded="false" aria-controls="flush-collapse-a1-results">
					Bid Results of Prior Years
				</button>
			</h3>
			
			<div class="accordion-item">
				<div id="flush-collapse-a1-results" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo get_row_index() ?>-<?php echo $accordion_option ?>" data-bs-parent="#accordionFlushA1">
					<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
					

					<div class="accordion-body body-text _17"><a href="<?php echo get_field('files')[0]['file']['url'] ?>" target='__blank'><?php echo $post->post_title ?></a></div>

					<?php endwhile; ?>
				</div>
			</div>
			<?php wp_reset_postdata(); ?>
		</div>
	</div>
</div>
<?php get_footer(); ?>