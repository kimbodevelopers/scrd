<?php if($post->post_type !== 'agendas') : ?>
	<?php if(get_the_title()) : ?>
		<div class="container-fluid site-component-container t1-container pb-0">
			<div class="row site-component-row t1-row">
				<div class="col-12 t1-column">
					<h1 class="title-text _50 dark-blue"><?php the_title() ?></h1>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if(get_field('date')) : ?>
		<div class="container-fluid site-component-container pb-0">
			<div class="row site-component-row">
				<div class="col-12">
					<h2 class="title-text _33 dark-blue "><?php the_field('date') ?></h2>
				</div>
			</div>
		</div>
	<?php endif; ?>


	<?php get_template_part('inc/components/partials/single-partial/taxonomy-component') ?>


	<?php $files = get_field('files'); ?>

	<?php if($files) : ?>
		<div class="container-fluid site-component-container b1-table-container">
			<div class="row site-component-row b1-table-row">
				<?php foreach($files as $file) : ?>
					<div class="col-12 b1-table-column">
						<a href="#" onclick='window.open("<?php echo $file['file']['link'] ?>"); return false;'>
							<span class="title-text _21"><?php echo $file['file']['title'] ?></span>
							<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
						</a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	<?php endif; ?>
<?php endif; ?>

<?php if(wp_get_attachment_url(get_the_ID())) : ?>
<div class="container-fluid site-component-container b1-table-container">
	<div class="row site-component-row b1-table-row">
		<div class="col-12 b1-table-column">
			<a href="#" onclick='window.open("<?php echo wp_get_attachment_url(get_the_ID()) ?>"); return false;'>
				<span class="title-text _21">Download File</span>
				<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
			</a>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if(get_field('file')) : ?>
<div class="container-fluid site-component-container b1-table-container">
	<div class="row site-component-row b1-table-row">
		<div class="col-12 b1-table-column">
			<a href="#" onclick='window.open("<?php echo get_field('file')['url']; ?>"); return false;'>
				<span class="title-text _21"><?php echo ucfirst(explode(' ', $post->post_title)[1]) ?></span>
				<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
			</a>
		</div>
	</div>
</div>
<?php endif; ?>

<?php if($post->post_type === 'bid-opportunities') : ?>
	<?php get_template_part('inc/components/partials/single-partial/single-bid') ?>
<?php endif; ?>

<?php if($post->post_type === 'news') : ?>
	<?php get_template_part('inc/components/partials/single-partial/single-news') ?>
<?php endif; ?>

<?php if($post->post_type === 'ocp') : ?>
	<?php get_template_part('inc/components/partials/single-partial/single-ocp') ?>
<?php endif; ?>

<?php if($post->post_type === 'bylaws') : ?>
	<?php get_template_part('inc/components/partials/single-partial/single-bylaws') ?>
<?php endif; ?>

<?php if($post->post_type === 'agendas') : ?>
	<?php get_template_part('inc/components/partials/single-partial/single-agendas') ?>
<?php endif; ?>
