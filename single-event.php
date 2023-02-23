<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Single Event */
global $post;

?>

<?php get_template_part('inc/components/breadcrumb') ?>

<div class="container-fluid site-component-container single-events-container">
	<div class="row site-component-row single-events-row">
		<div class="col-12 single-events-column pb-2">		
			<h1 class="title-text _50 dark-blue">
				<?php the_title(); ?>
			</h1>
		</div>
	</div>
	
    <div class="row site-component-row single-events-row">
		<div class="col-12 single-events-column">			

			
			<?php echo do_shortcode('[event]') ?>
		</div>
		
	</div>
</div>

<?php get_footer(); ?>