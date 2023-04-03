<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 

global $post;
		global $wp;
		$current_url = $wp->request;
		$slug = $wp->query_vars['event-categories'];
?>

<div class="container-fluid site-component-container upcoming-events-and-announcements-container ">
	
	<div class="row site-component-row">
		<div class="col-12 ">
			<h1 class="title-text _50 col-12 dark-blue">Event Categories</h1>
		</div>
	</div>
	
	<div class="row site-component-row  park-form-row">
		
		<?php
		$category_link = get_category_link($cat->cat_ID);
		$post_type = 'event';
		$taxonomies = get_object_taxonomies( array( 'post_type' => $post_type ) ); 
		?>
		
		<?php foreach($taxonomies as $taxonomy ) : ?>
			<?php $terms = get_terms( $taxonomy ); ?>
			
				<div class="col-lg-4 col-md-6 parks-filter mb-0">
					<div class="dropdown show">

						<a class="btn dropdown-toggle filter-dropdown-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							<?php foreach($terms as $term) : ?>
								<?php if($slug === $term->slug) : ?>
									<?php echo $term->name ?>
								<?php endif; ?>
							<?php endforeach; ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							
							<?php foreach($terms as $term) : ?>
							
								<div class="dropdown-item">
									<a href="<?php echo get_site_url() . '/events/categories/' . $term->slug ?>"><?php echo $term->name ?></a>
								</div>
							
							<?php endforeach; ?>
						</div>
					</div>
				</div>
		
		
			
			
		<?php endforeach; ?>
		
	</div>
	
</div>


<div class="container-fluid site-component-container upcoming-events-and-announcements-container facetwp-template">
	
	<?php foreach( $taxonomies as $taxonomy ) : ?>

		<?php $terms = get_terms( $taxonomy ); ?>
	

	
	
		<?php foreach( $terms as $term ) : ?>
		
			<?php if($slug === $term->slug) : ?>

			<div class="row site-component-row">
				<div class="col-12">
					<h2 class="title-text _33 col-12"><?php echo $term->name; ?></h2>
				</div>
			</div>

			<?php
			$args = array(
				'post_type' => 'event',
				'posts_per_page' => -1,
				'facetwp' => true,
				'tax_query' => array(
					array(
						'taxonomy' => $taxonomy,
						'field' => 'slug',
						'terms' => $term->slug,
					)
				)

			); ?>


		<?php $events = new WP_Query($args); ?>

		<div class="row site-component-row upcoming-events-and-announcements-row mb-5">
			<?php if( $events->have_posts() ): ?>

				<?php while( $events->have_posts() ) : $events->the_post(); ?>

				<?php 
					$date = get_post_meta($post->ID)['_event_start_date']['0'];
					$split_date = explode('-', $date); 
					$year = $split_date[0];
					$month = $split_date[1];
					$day = $split_date[2];

					$dateObj   = DateTime::createFromFormat('!m', $month);
					$monthName = $dateObj->format('F');
				?>

				<div class="col-md-4 upcoming-events-and-announcements-column">

					<a href="<?php the_permalink(); ?>">
						<div class="upcoming-events-and-announcements-wrapper">
							<div class="date-wrapper row">
								<div class="col-4">
									<span class="title-text _67"><?php echo $day ?></span>
								</div>
								<div class="col-8">
									<p class="title-text _25"><?php echo $monthName ?></p>
									<p class="title-text _25"><?php echo $year ?></p>
								</div>
							</div>

							<div class="snippet-wrapper">
								<p class="body-text _27"><?php the_title() ?></p>
								<p class="body-text _17 read-more" href="<?php the_permalink(); ?>">Read More >></p>
							</div>

						</div>
					</a>
				</div>

				<?php endwhile; ?>
				<?php wp_reset_query();?>


			<?php endif; ?>
		</div>
	
		<?php endif; ?>

		<?php endforeach; ?>

	<?php endforeach; ?>

</div>
<?php get_footer(); ?>