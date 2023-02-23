<?php defined('ABSPATH') or die(""); ?>

<?php get_header(); 
/* Template Name: News */

global $post;

?>


<?php get_template_part('inc/components/breadcrumb') ?>


<?php  $news_terms = 
	get_terms([
		'taxonomy' => 'news_type',
		'hide_empty' => true,
	]) 
?>

	<?php $news_type = ($_GET["_news_types"]); ?>

	<?php if($news_type) : ?>
		<?php 
			global $wp_query; 

			$paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;

			if( get_query_var('paged') ) {
				$paged = get_query_var('paged');
			} elseif (get_query_var('page')) {
				$paged = get_query_var('page');
			} else {
				$paged = 1;
			}

			$single_post_limit = 9;

			$args = array (
				'post_type' => 'news',
				'posts_per_page' => $single_post_limit, 
				'hide_empty'=> 1, 
				'order' => 'ASC', 
				'orderby' => 'menu_order title',
				'facetwp' => true,
				'paged' => $paged,
				'tax_query' => array(
					array(
						'taxonomy' => 'news_type',
						'field' => 'slug',
						'terms' => $news_type
					),
				)
			);
		?>
	<?php else : ?>
		<?php 
			$args = array (
				'post_type' => 'news',
				'posts_per_page' => -1, 
				'order' => 'ASC', 
				'hide_empty'=> 1, 
				'orderby' => 'menu_order title',
				'facetwp' => true,
			);
		?>
	<?php endif; ?>

	<?php 
		$wp_query = new WP_Query( $args ); 
		$news = $wp_query;
	?>



<div class="container-fluid site-component-container pb-0">
	<div class="row site-component-row">
		<div class="col-12 col-lg-4 col-md-6 col-sm-6 c8-card-column mb-0">
			<?php echo do_shortcode('[facetwp facet="news_types"]') ?>
		</div>

		<div class="col-12 col-lg-4 col-md-6 col-sm-6 c8-card-column mb-0">
			<?php echo do_shortcode('[facetwp facet="year_issued"]') ?>
		</div>

		<div class="col-12 col-lg-4 col-md-6 col-sm-6  ">
			<button onclick="FWP.reset()" class="global-submit document-reset h-auto">Reset</button>
		</div>
	</div>
	
</div>

<?php while($news->have_posts()) : $news->the_post(); ?>
	<?php foreach($news_terms as $news_term) : ?>
		<?php  if(get_the_terms( $post->ID , 'news_type')[0]->slug === $news_term->slug) : ?>
			<?php $term_post_array[$news_term->name][] = $post ?>
		<?php  endif; ?>				
	<?php endforeach; ?>
<?php endwhile; ?>

<div class="container-fluid modal-archive-container site-component-container news-container facetwp-template">

	<?php foreach($term_post_array as $term=>$term_post) : ?>
	<div class="row site-component-row <?php echo strtolower(str_replace(" ", "-", $term)) ?>-row">
		<div class="col-12 mt-4 mb-2">
			<h2 class="title-text _33 dark-blue mb-3"><?php echo $term ?></h2>

			<?php if ($term === 'Newsletter') : ?>

			<a class=" body-text _17 ml-0 mb-3 d-block" href="<?php echo get_site_url() ?>/newsletter-signup " target="__blank">
				Sign up for our newsletter
			</a>

			<?php endif; ?>

		</div>

			<?php foreach($term_post as $index=>$post) : ?>
				
			
				<?php if($news_type) : ?>
					<?php $limit = $single_post_limit; ?>
				<?php else: ?>
					<?php $limit = 5; ?>
				<?php endif; ?>
		
				<?php if($index <= $limit) : ?>
					<div class="col-12 col-lg-4 col-md-4 col-sm-6 c8-card-column">
						<div class="c8-card-wrapper">
<!-- 							<p class="body-text _15 card-taxonomy mb-3">
								<?php 
// 								$post_type = get_post_type(get_the_ID());   
// 								$taxonomies = get_object_taxonomies($post_type);   
// 								$taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 

// 								if(!empty($taxonomy_names)) :

// 								foreach($taxonomy_names as $key=>$value) : ?>
								<span>
									<?php // if($key !== 0) : ?>|<?php // endif; ?> <?php // echo $value; ?>  
								</span>
								<?php // endforeach;

								// endif;
								?>   
							</p> -->
							<h3 class="title-text _21 news-card-title c8-card-title mb-0 mt-2" type="button" data-bs-toggle="modal" data-bs-target="#<?php echo str_replace(' ', '-', $post->post_type) ?>-<?php echo $post->ID ?>">
								<?php the_title(); ?>
							</h3>

							<?php if(get_field('date_released')) : ?>
							<p class="body-text _22 mt-3">
								<?php the_field('date_released') ?>
							</p>
							<?php endif; ?>

							<?php if(get_field('content')) : ?>
							<div class='card-content'>
								<?php the_field('content') ?>
							</div>
							<?php endif; ?>


							<div class="files-wrapper mt-2">
								<a type="button" data-bs-toggle="modal" data-bs-target="#<?php echo str_replace(' ', '-', $post->post_type) ?>-<?php echo $post->ID ?>">
									Read More
								</a>
							</div>

						</div>

						<div class="modal fade" id="<?php echo str_replace(' ', '-', $post->post_type)?>-<?php echo $post->ID ?>" tabindex="-1" aria-labelledby="modalLabel-<?php echo $post->ID?>" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="modalLabel-<?php echo $post->ID ?>"></h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<?php get_template_part('inc/components/partials/single-partial/single-template') ?>
									</div>

								</div>
							</div>
						</div>

					</div>
				<?php endif; ?>

				
				<?php if($index > 5) : ?>
					<?php if(!$news_type) : ?>

					<div class="row site-component-row button-row mt-2 mb-4 pl-0 pr-0">
												
						<div class="col-12 button-column w-auto">
							<a class="site-button body-text _26 ml-0" href="<?php echo get_site_url() ?>/news/?_news_types=<?php echo strtolower(str_replace(' ', '-', $term)) ?>" >
								See All <?php echo $term ?><span>s</span>
							</a>
						</div>
					</div>
		
					<?php break; ?>
		
					<?php endif ?>
				<?php endif; ?>


			<?php endforeach; ?>

	</div>
	<!-- row	 -->
	<?php endforeach ?>

	
	<?php if(paginate_links()) : ?>
			<?php get_template_part('inc/components/archive/pagination') ?>
		<?php endif; ?>
</div>
<!-- container -->

	<?php wp_reset_query(); ?>


	<?php get_template_part('inc/components/contacts/media-contact') ?>

	<?php get_footer(); ?>