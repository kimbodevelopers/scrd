<div class="container-fluid site-component-container a3-meeting-agendas-container agendas-container">
	
	<div class="row site-component-row">
		<div class="col-12">
			<h2 class="title-text _33 dark-blue">Upcoming Meetings</h2>
		</div>
	</div>
	
	<?php  
	$agenda_terms = 
		get_terms([
			'taxonomy' => 'agenda_type',
			'hide_empty' => true,
		]);
	
	$meeting_status = 
		get_terms([
			'taxonomy' => 'meeting_status',
			'hide_empty' => true,
		]) 
	?>

	
	<div class="row site-component-row a3-meeting-category-row desktop">
		<div class="col-2 agenda-file-header text-left">
			<span class="body-text _17">Date / Time</span>
		</div>
		
		<div class="col-2 agenda-file-header text-left">
			<span class="body-text _17">Meeting Type</span>
		</div>
		
		<div class="col-2 agenda-file-header">
			<span class="body-text _17">Agendas</span>
		</div>

		<div class="col-2 agenda-file-header">
			<span class="body-text _17">Late Items</span>
		</div>

		<div class="col-2 agenda-file-header">
			<span class="body-text _17">Watch</span>
		</div>
		
		
		<div class="col-2 agenda-file-header">
			<span class="body-text _17">Zoom (to participate)</span>
		</div>

	</div>
	
	<!-- mobile	 -->
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

	<?php 
		
		$args = array (
			'post_type' => 'event',
			'posts_per_page' => 20, 
			'hide_empty'=> 1, 
			'paged' => $paged,
			'facetwp' => false,
			'tax_query' => array(
				array(
					'taxonomy' => 'event-categories',
					'field' => 'slug',
					'terms' => 'agenda',
				),
			),
// 			'meta_key' => '_event_start_date',
// 			'meta_query' => array (
// 				'post__not_in' => array (
// 					'key' => '_event_start_date',
// 					'value' => $today,
// 					'compare' => '>='
// 				)

// 			),
		);

		$wp_query = new WP_Query( $args ); 

	?>
	<?php while($wp_query->have_posts()) : $wp_query->the_post();
		$title = get_the_title();
		$event_post = $post;
		$agenda_connect = get_field('connect_to_agenda_file');
		$webinar_id = get_field('webinar_id');
		$passcode = get_field('passcode');
		$post = $agenda_connect;
		setup_postdata( $post );
	
	?>
	
		<div class="row site-component-row a3-meeting-agenda-row a2-upcoming-meetings-row">
					
			<div class="col-12 col-lg-2 date-column">
				<p class="body-text _17 mb-0 date">
					<?php if(get_post_meta($event_post->ID)['_event_start_date']['0']) : ?>
						<?php echo get_post_meta($event_post->ID)['_event_start_date']['0'] ?>
					<?php else : ?>
						<?php echo get_field('date') ?>
					<?php endif; ?>
				</p>
				<span class="seperator">&nbsp;|&nbsp;</span><p class="body-text _17 mb-0 time"></p>
			</div>
			
			<div class="col-12 col-lg-2 meeting-type">
				<p class="body-text _17 mb-0"><?php echo $title ?></p>
			</div>
			
			<div class="col-4 col-lg-2 icon-column agenda-file">
				<?php if(get_field('agenda_files')) : ?>
		
					<?php while(have_rows('agenda_files')) : the_row(); 
						$file = get_sub_field('file');
						$label = get_sub_field('label');
					?>
						<a href="<?php echo $file['url'] ?>" target="__blank">
							<i class="fa-solid fa-file-pdf  <?php if($label) : ?> d-none<?php endif; ?>"></i>
							<span class="label-wrapper body-text _17">
								<?php echo $label ?>
							</span>
						</a>
					<?php endwhile; ?>

				<?php else : ?>
					N/A
				<?php endif; ?>
			</div>
			
			<div class="col-4 col-lg-2 icon-column late-file">

				<?php if(get_field('late_items')) : ?>
					<?php while(have_rows('late_items')) : the_row(); 
						$file = get_sub_field('file');
						$label = get_sub_field('label');
					?>
						<a href="<?php echo $file ?>" target="__blank">
							<i class="fa-solid fa-file-pdf  <?php if($label) : ?> d-none<?php endif; ?>"></i>
							<span class="label-wrapper body-text _17">
								<?php echo $label ?>
							</span>
						</a>
					<?php endwhile; ?>
				<?php else : ?>
					<span class="body-text _17">N/A</span>
				<?php endif; ?>
				
				
			</div>
			
			<div class="col-4 col-lg-2 icon-column video-audio-link">
				<?php if(get_field('audio_video_links')) : ?>
					<?php while(have_rows('audio_video_links')) : the_row(); 
						$audio_or_video = get_sub_field('audio_or_video');
						$link = get_sub_field('link');
						$label = get_sub_field('label');
					?>
						<a href="<?php echo $link ?>" target="__blank">
							<span class="label-wrapper body-text _17">
								<?php echo $label ?>
							</span>
							<?php if($audio_or_video === 'video') : ?>
								<i class="fa-brands fa-youtube <?php if($label) : ?> d-none<?php endif; ?>"></i>
							<?php elseif($audio_or_video === 'audio') : ?>
								<i class="fa-solid fa-volume-high <?php if($label) : ?> d-none<?php endif; ?>"></i>
							<?php endif; ?>
						</a>

					<?php endwhile; ?>

				<?php else : ?>
					<span class="body-text _17">N/A</span>
				<?php endif; ?>
			</div>
			
			<div class="col-12 col-lg-2 zoom-icon">
				

				<a href="<?php if(get_post_meta($event_post->ID)['_event_location_url'][0]) : ?><?php echo get_post_meta($event_post->ID)['_event_location_url'][0] ?><?php endif; ?>" target="__blank">
					<img src="<?php echo get_field('zoom_logo', 'option')['url'] ?>" />
				</a>
				<div class="zoom-info">
					<div class="webinar">
						<span class="body-text _16">Webinar ID:&nbsp;</span>
						<p class="body-text _17">
							<?php if($webinar_id) : ?>
								<?php echo $webinar_id ?>
							<?php else : ?>
								N/A
							<?php endif; ?>
						</p>
					</div>

					<div class="passcode">
						<span class="body-text _16">Passcode:&nbsp;</span>
						<p class="body-text _17">
							<?php if($passcode) : ?>
								<?php echo $passcode ?>
							<?php else : ?>
								N/A
							<?php endif; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	
	<?php endwhile; ?>
	
	<?php wp_reset_query(); ?>

</div>