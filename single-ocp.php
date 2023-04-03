<?php defined('ABSPATH') or die(""); ?>

<?php get_header(); 
/* Template Name: Single OCP */
global $post;

?>

<?php if(get_field('content')) : ?>
	<div class="container-fluid site-component-container t1-container">
		<div class="row site-component-row t1-row">
			<div class="col-12 t1-column">
				<?php echo get_field('content') ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if(have_rows('ocp_main_document')) : ?>
	<div class="container-fluid site-component-container b1-table-container">
		<div class="row site-component-row b1-table-row">

			<?php while(have_rows('ocp_main_document')) : the_row(); 
				$label = get_sub_field('label');
				$file = get_sub_field('file');
			?>
			<div class="col-12 b1-table-column">

				<?php if($file) : ?>
					<a href="#" onclick='window.open("<?php echo $file['url']; ?>"); return false;'>
						<span class="title-text _21"><?php echo $label ?></span>
						<span><i class="fa-solid fa-file-pdf"></i></span>
					</a>
				<?php endif; ?>

			</div>
			<?php endwhile; ?>

		</div>
	</div>
<?php endif; ?>

<?php if(get_field('ocp_files_title')) : ?>
	<div class="container-fluid site-component-container t1-container">
		<div class="row site-component-row t1-row">
			<div class="col-12 t1-column">
				<h2>
					<?php echo get_field('ocp_files_title') ?>
				</h2>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if(get_field('ocp_files')) : ?>
	<div class="container-fluid site-component-container b1-table-container">
		<div class="row site-component-row b1-table-row">

		<?php while(have_rows('ocp_files')) : the_row(); 
			$label = get_sub_field('label');
			$file = get_sub_field('file');
		?>

			<div class="col-12 b1-table-column">

				<?php if($file) : ?>
					<a href="#" onclick='window.open("<?php echo $file['url']; ?>"); return false;'>
						<span class="title-text _21"><?php echo $label ?></span>
						<span><i class="fa-solid fa-file-pdf"></i></span>
					</a>
				<?php endif; ?>

			</div>

		<?php endwhile; ?>
			
		</div>
	</div>
	
<?php endif; ?>

<?php if(get_field('additional_ocp_files_title')) : ?>
	<div class="container-fluid site-component-container t1-container">
		<div class="row site-component-row t1-row">
			<div class="col-12 t1-column">
				<h2>
					<?php echo get_field('additional_ocp_files_title') ?>
				</h2>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if(get_field('additional_ocp_files')) : ?>
	<div class="container-fluid site-component-container b1-table-container">
		<div class="row site-component-row b1-table-row">

		<?php while(have_rows('additional_ocp_files')) : the_row(); 
			$label = get_sub_field('label');
			$file = get_sub_field('file');
		?>

			<div class="col-12 b1-table-column">

				<?php if($file) : ?>
					<a href="#" onclick='window.open("<?php echo $file['url']; ?>"); return false;'>
						<span class="title-text _21"><?php echo $label ?></span>
						<span><i class="fa-solid fa-file-pdf"></i></span>
					</a>
				<?php endif; ?>

			</div>

		<?php endwhile; ?>
			
		</div>
	</div>
	
<?php endif; ?>

<?php get_footer(); ?>