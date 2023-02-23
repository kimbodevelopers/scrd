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
	
<div class="container-fluid site-component-container minutes-container">

    <div class="row site-component-row minutes-row">
        
		<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
	
			<?php foreach($years_issued as $year_issued) : ?>
				<?php if(get_the_terms( $post->ID , 'year_issued')[0]->slug === $year_issued->slug) : ?>
					<div class="col-12 year-issued-<?php echo $year_issued->slug ?>">
						<h2 class="title-text _27 dark-blue year-issued-header"><?php echo get_the_terms( $post->ID , 'year_issued')[0]->name ?> Board Minutes</h2>
					</div>
				<?php endif; ?>
			<?php endforeach; ?>
			
		
			<div class="col-md-4 col-12 minutes-column">
				
				<p class="body-text _17">
					<?php if(get_field('file')) : ?>
					<?php $file = get_field('file')['url'] ?>
					<a href="<?php echo $file ?>" target="__blank">
						<?php echo get_field('date') ?>
						
						<?php if(get_the_terms( $post->ID , 'meeting_status')[0]->name ) : ?>
							<br>
							*<?php echo get_the_terms( $post->ID , 'meeting_status')[0]->name ?>
						<?php endif; ?>
					</a>

					<?php else : ?>
						<?php the_title(); ?>
					<?php endif; ?>
				</p>
			</div>
		
		<?php endwhile; ?>

        <?php wp_reset_postdata(); ?>
    </div>
	
	
	<script>
		<?php foreach($years_issued as $year_issued) : ?>
			$('.year-issued-<?php echo $year_issued->slug ?>').not(':first').hide()		
		<?php endforeach ?>
		
		let previousUrl = '';
		const observer = new MutationObserver(function(mutations) {
		  if (window.location.href !== previousUrl) {
			  previousUrl = window.location.href;
			  		<?php foreach($years_issued as $year_issued) : ?>
						$('.year-issued-<?php echo $year_issued->slug ?>').not(':first').hide()		
					<?php endforeach ?>
			}
		});
		const config = {subtree: true, childList: true};

		// start listening to changes
		observer.observe(document, config);

			
		
	</script>

</div>


<?php get_footer(); ?>