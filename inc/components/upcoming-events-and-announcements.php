<?php global $post ;

global $wp_query; 
?>

<div class="container-fluid site-component-container upcoming-events-and-announcements-container">
	
	<?php 
	
		$today = date('Y-m-d');
	
		$events = new WP_Query(array(
			'post_type' => 'event',
			'posts_per_page' => 3,
			'post__status' => 'published',
			'order' => 'ASC',
			'orderby' => 'meta_value',
			'meta_key' => '_event_start_date',
			'meta_query' => array (
				'post__not_in' => array (
					'key' => '_event_start_date',
					'value' => $today,
					'compare' => '>='
				)

			),
		));
	?>

	<?php if($events) : ?>
		<div class="row site-component-row">
			<div class="col-12">
				<h2 class="title-text _33 col-12">Events and Announcements</h2>
			</div>
		</div>
	<?php endif; ?>
	
	<div class="row site-component-row upcoming-events-and-announcements-row">
		
		<?php while($events->have_posts()) : $events->the_post() ; ?>
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
							<p class="body-text _27 snippet-title"><?php the_title() ?></p>
							<p class="body-text _17 read-more" href="<?php the_permalink(); ?>">Read More >></p>
						</div>

					</div>
				</a>
			</div>


		<?php endwhile; ?>
	
		<?php wp_reset_query(); ?>
		
	</div>
	
	
        <div class="row site-component-row button-row">
            <div class="col-12 button-column">
                <a href="<?php echo get_site_url() ?>/calendar/" class="site-button body-text _26">See All Events</a>
            </div>
        </div>
 
	
</div>

