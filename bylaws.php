<?php defined('ABSPATH') or die(""); ?>

<?php get_header(); 
/* Template Name: Bylaws */

global $post;

?>

<?php get_template_part('inc/components/breadcrumb') ?>

<div class="container-fluid site-component-container bylaws-container">
	<div class="row site-component-row bylaws-row">
		<div class="col-12">
            <h1 class="title-text _50 dark-blue mb-0"><?php the_title() ?></h1>
        </div>
	</div>
</div>

<?php if(get_field('agendas_content')) : ?>
	<div class="container-fluid site-component-container t1-container">
		<div class="row site-component-row t1-row">
			
			<div class="col-12 t1-column">
				<div class="body-text _17 t1-content"><?php echo get_field('bylaws_content') ?></div>
			</div>
		</div>
	</div>
<?php endif; ?>

<div class="container-fluid site-component-container document-library-container agendas-filter-container">
	
	<div class="row site-component-row document-library-filter-row">
		
        <?php echo do_shortcode('[facetwp facet="bylaw_type"]') ?>
		
		<div class="col-lg-3 col-md-4 col-sm-6  col-12">
            <button onclick="FWP.reset()" class="global-submit document-reset">Reset</button>
        </div>
		
	</div>
</div>

<?php 
	
	$bylaw_types = get_terms([
		'taxonomy' => 'bylaw_type',
		'hide_empty' => true,
	]);

	$bylaws = new WP_Query(array(
		'post_type' => 'bylaws',
		'posts_per_page' => -1,
		'post__status' => 'published',
		'order' => 'ASC',
		'orderby' => 'taxonomy, bylaw_type',
		'facetwp' => true,
	));

	$wp_query = $bylaws;
?>   

<div class="container-fluid site-component-container bylaws-container b1-table-container facetwp-template">
	<div class="row site-component-row bylaws-row b1-table-row">
		
		<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
		
			<?php foreach($bylaw_types as $bylaw_type ) : ?>
				<?php if(get_the_terms( $post->ID , 'bylaw_type')[0]->slug === $bylaw_type->slug) : ?>
				<div class="col-12 bylaw-type-header-wrapper bylaw-type-<?php echo $bylaw_type->slug ?>">
					<h2 class="body-text _33 dark-blue bylaw-type-header"><?php echo get_the_terms( $post->ID , 'bylaw_type')[0]->name ?></h2>
				</div>
				<?php endif; ?>
			<?php endforeach; ?>
		
			<div class="col-12 b1-table-column">
				
                <?php if(get_field('bylaw_file')) : ?>
                    <a href="#" onclick='window.open("<?php echo get_field('bylaw_file')['url'] ?>"); return false;'>
                        <span class="title-text _21"><?php the_title() ?></span>
                        <span><i class="fa-solid fa-file-pdf"></i></span>
                    </a>
                <?php endif; ?>
				
				<?php if(get_field('related_post')) : ?>
				
				
                    <a href="#" onclick='window.open("<?php echo get_field('related_post')->guid ?>"); return false;'>
                        <span class="title-text _21"><?php the_title() ?></span>
                        <span><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                    </a>
                <?php endif; ?>
				
				
			</div>
		<?php endwhile; ?>
	</div>
	
	
		<script>
		<?php foreach($bylaw_types as $bylaw_type ) : ?>
			$('.bylaw-type-<?php echo $bylaw_type->slug ?>').not(':first').hide()		
		<?php endforeach ?>
		
		let previousUrl = '';
		const observer = new MutationObserver(function(mutations) {
		  if (window.location.href !== previousUrl) {
			  previousUrl = window.location.href;
			  		<?php foreach($bylaw_types as $bylaw_type ) : ?>
						$('.bylaw-type-<?php echo $bylaw_type->slug ?>').not(':first').hide()		
					<?php endforeach ?>
			}
		});
		const config = {subtree: true, childList: true};

		// start listening to changes
		observer.observe(document, config);

			
		
	</script>
	
</div>


<?php get_footer(); ?>