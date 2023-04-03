<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Home */
?>


	<?php while(have_rows('home_components')) : the_row(); 
		$component_name = get_sub_field('component_name');
	?>
		<?php get_template_part('inc/components/'. $component_name ) ?>
	<?php endwhile; ?>


<?php get_footer(); ?>