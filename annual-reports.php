<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Annual Reports */

global $post;

?>
<?php get_template_part('inc/components/breadcrumb') ?>

<?php if(have_rows('text_group')) : ?>
	<?php while(have_rows('text_group')) : the_row();
		$content = get_sub_field('content');
	?>
		<div class="container-fluid site-component-container t1-container annual-reports-container">
			<div class="row site-component-row t1-row annual-reports-row">
				<div class="col-12 t1-column">
					<?php echo $content ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>
<?php endif; ?>


<?php 
	
	$annual_report = new WP_Query(array(
		'post_type' => 'annual-reports',
		'posts_per_page' => -1,
		'post__status' => 'published',
		'order' => 'DESC',
		'facetwp' => true,
	));

	$wp_query = $annual_report;
?>   



<div class="container-fluid site-component-container b1-table-container">
	<div class="row site-component-row b1-table-row">
		
		<?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
			<?php $files = get_field('files'); ?>

			<?php foreach($files as $file) : ?>
				<div class="col-12 b1-table-column">
					<a href="#" onclick='window.open("<?php echo $file['file']['link'] ?>"); return false;'>
						<span class="title-text _21"><?php the_title() ?></span>
						<span><i class="fa-solid fa-file-pdf"></i></span>
					</a>
				</div>
			<?php endforeach; ?>

		<?php endwhile; ?>
		
	</div>
</div>
<?php get_footer(); ?>