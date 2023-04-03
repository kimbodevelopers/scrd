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

	<?php 
		$meta_key = '';
		$orderby  = '';
	?>

	<?php if($news_type) : ?>

		<?php if($news_type === 'news-release') : ?>
			<?php 
				$meta_key = 'date_released'; 
				$orderby = 'meta_value';
				$order = 'DESC';
			?>

		<?php else : ?>
			<?php 
				$orderby = 'menu_order title';
				$meta_key = '';
				$order = 'ASC';
			?>
		<?php endif; ?>

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
				'order' => $order, 
				'orderby' => $orderby,
				'meta_key' => $meta_key,
				'facetwp' => true,
				'paged' => $paged,
				'tax_query' => array(
					array(
						'taxonomy' => 'news_type',
						'field' => 'slug',
						'terms' => $news_type,

					),
				)
			);
		?>


	<?php else : ?>

		<?php 
			$args_1 = array (
				'post_type' => 'news',
				'posts_per_page' => -1, 
				'order' => 'DESC', 
				'hide_empty'=> 1, 
				'meta_key' => 'date_released',
				'orderby' => 'meta_value',
				'tax_query' => array(
					array(
						'taxonomy' => 'news_type',
						'field' => 'slug',
						'terms' => 'news-release',

					),
				)
			);

		?>

		<?php 
			$args_2 = array (
				'post_type' => 'news',
				'posts_per_page' => -1, 
				'order' => 'ASC', 
				'hide_empty'=> 1,
				'orderby' => 'menu_order title',
				'tax_query' => array(
					array(
						'taxonomy' => 'news_type',
						'field' => 'slug',
						'terms' => 'newsletter',

					),
				)
			);

		?>
	<?php endif; ?>


	<?php 
		$wp_query = new WP_Query( $args ); 
		$news = $wp_query;

		$wp_query_1 = new WP_Query( $args_1 ); 
		$news_1 = $wp_query_1;

		$wp_query_2 = new WP_Query( $args_2 ); 
		$news_2 = $wp_query_2;
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

<?php $link_display = get_field('newsletter_link_display') ?>

<?php if($news_type ) : ?>

	<!-- for filtered posts	 -->
	<?php while($news->have_posts()) : $news->the_post(); ?>
		<?php foreach($news_terms as $news_term) : ?>
			<?php  if(get_the_terms( $post->ID , 'news_type')[0]->slug === $news_term->slug) : ?>

				<?php $term_post_array[$news_term->name][] = $post ?>

			<?php  endif; ?>				
		<?php endforeach; ?>
	<?php endwhile; ?>

<?php else : ?>

	
	<?php while($news_1->have_posts()) : $news_1->the_post(); ?>
		<?php foreach($news_terms as $news_term) : ?>
			<?php  if(get_the_terms( $post->ID , 'news_type')[0]->slug === $news_term->slug) : ?>
				
				<?php $term_post_array[$news_term->name][] = $post ?>

			<?php  endif; ?>				
		<?php endforeach; ?>

	<?php endwhile; ?>

	<?php while($news_2->have_posts()) : $news_2->the_post(); ?>
		<?php foreach($news_terms as $news_term) : ?>
			<?php  if(get_the_terms( $post->ID , 'news_type')[0]->slug === $news_term->slug) : ?>
				
				<?php $term_post_array[$news_term->name][] = $post ?>

			<?php  endif; ?>				
		<?php endforeach; ?>

	<?php endwhile; ?>

	

<?php endif; ?>

<?php foreach($term_post_array as $term=>$newsletter_post) : ?>

	<?php if($term === 'Newsletter') : ?>
		<?php $newsletter_posts[] = $newsletter_post  ?>
	<?php endif; ?>

<?php endforeach; ?>



<div class="container-fluid modal-archive-container site-component-container news-container facetwp-template">

	<?php foreach($term_post_array as $term=>$term_post) : ?>
	
		<div class="row site-component-row <?php echo strtolower(str_replace(" ", "-", $term)) ?>-row">

			<div class="col-12 mt-4 mb-2">
				<h2 class="title-text _33 dark-blue mb-3"><?php echo $term ?></h2>

				<?php if ($term === 'Newsletter') : ?>

					<?php if($link_display === 'show_link') : ?>
						<a class=" body-text _17 ml-0 mb-3 d-block" href="<?php echo get_site_url() ?>/newsletter-signup " target="__blank">
							Sign up for our newsletter
						</a>
					<?php endif; ?>

				<?php endif; ?>

			</div>

			<?php foreach($term_post as $index=>$post) : ?>

				<?php if($news_type) : ?>
					<?php $limit = $single_post_limit; ?>
				<?php else: ?>
					<?php $limit = 5; ?>
				<?php endif; ?>

				<?php if($index <= $limit) : ?>
			
		
					<?php get_template_part('inc/components/archive/news-cards-component') ?>
			
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


	<script>
		const addNewsTypes = () => {

			setTimeout(function() {
				
				let mediaOption = $('.facetwp-facet-type[data-name="news_types"]').find('[value="Newsletter"]')
				let mediaOptionArray = mediaOption.text().split(' ');
				mediaOptionArray[0] = 'Newsletter';
				mediaOption.text(mediaOptionArray.join(' '));
				
			$('.facetwp-facet-news_types .facetwp-dropdown').find('[value="news-release"]').remove()
			$('.facetwp-facet-news_types .facetwp-dropdown').append('<option value="news-release">News Release</option>')
			$('.facetwp-facet-news_types .facetwp-dropdown').append('<option value="newsletter">Newsletter</option>')

			}, 300)
		}
		
		addNewsTypes();
	</script>


	<?php get_footer(); ?>