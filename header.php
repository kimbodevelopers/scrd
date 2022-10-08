<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/styles.css?ver=<?php echo time(); ?>"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/assets/css/animations.css?ver=<?php echo time(); ?>"/>


	<!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.min.css" rel="stylesheet"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Nunito&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>


	<body <?php body_class(); ?>>

	<?php wp_body_open(); ?>

	<div id="wrapper">
		<header id="header">

			<nav class="navbar navbar-expand-lg">
				
				<div class="container-fluid nav-container">
					<a class="navbar-brand" href="<?php echo get_site_url() ?>">
						<?php if(get_field('brand_logo', 'option')) : ?>
							<div><img src="<?php echo esc_url(get_field('brand_logo', 'option')['url']); ?>" alt="<?php echo esc_attr($operations_image['alt']); ?>" /></div>
						<?php endif; ?>

						<span class="title-text _27 header-title"><?php the_field('nav_title', 'option') ?></span>
					</a>
					<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav">
						<span class="navbar-toggler-icon"></span>
					</button>
					<div class="collapse navbar-collapse" id="main_nav">

						<?php
							$sub_menu_param = array(
								'theme_location' => 'nav-sub-menu',
								'menu_class' => 'header-sub-menu',
								'walker' => new Custom_Walker_Nav_Menu()
								
							);
						?>

						<div class='sub-nav-wrapper'>
							<?php wp_nav_menu($sub_menu_param); ?>
							<div class="search-wrapper">
								<i class="fa-solid fa-magnifying-glass"></i>
							</div>
							<?php echo do_shortcode('[gtranslate]'); ?>
						</div>

						<?php
							$main_menu_param = array(
								'theme_location' => 'nav-main-menu',
								'menu_class' => 'header-main-menu navbar-nav',
								'walker' => new Custom_Walker_Nav_Menu()
								
							);
						?>

						<?php wp_nav_menu($main_menu_param); ?>

						

					</div> <!-- navbar-collapse.// -->
				</div> <!-- container-fluid.// -->
			</nav>
			
			<div class="search-container container-fluid site-component-container">
				<div class="row site-component-row search-form-row">
					<div class="col-11">

						<form method="get" class="searchform" id="searchform" action="<?php echo esc_url( home_url( '/')); ?>">
							<input type="text" class="field" name="s" id="searchInput" onkeyup="fetchResults()" placeholder="<?php esc_html_e('Search...'); ?>">
							<?php if( 'any' != $post_type) { ?>
								<input type="hidden" class="search-bar" name="post_type" value="<?php echo esc_attr($post_type); ?>">
							<?php } ?>
						</form>

					</div>
					<div class="col-1">
						<div class="close-search"><i class="fa-solid fa-xmark"></i></div>
					</div>

				</div>
				<div id="datafetch" class="row site-component-row"></div>

			</div>

		</header>

		<main id="main">
	