</main><!-- /#main -->

		<footer>
			<div class="container-fluid site-component-container">
				<div class="row site-component-row">
					<div class="col-md-4 footer-column top left">
						<div class="address-wrapper">

							<p class="body-text _20 address-title"><?php the_field('address_label', 'option') ?></p>

							<?php while(have_rows('footer_address', 'option')) : the_row(); 
								$address_icon = get_sub_field('address_icon');
								$address_label = get_sub_field('address_label');
							?>
								<p><?php echo $address_icon ?>&nbsp;<?php echo $address_label ?></p>

							<?php endwhile; ?>

						</div>

						<?php
						$main_menu_param = array(
							'theme_location' => 'footer-main-menu',
							'menu_class' => 'footer-main-menu row',
							
						);
					?>

					<?php wp_nav_menu($main_menu_param); ?>
					</div>


					<div class="col-md-5 footer-column top right">

						<?php if(get_field('external_items', 'option')) : ?>
						<div class="row external-links-row">
							<?php while(have_rows('external_items', 'option')) : the_row(); 
								$external_icon = get_sub_field('external_icon');
								$external_label = get_sub_field('external_label');
								$external_link = get_sub_field('external_link');
							?>
								<div class="external-links-column">
									<a href="<?php echo $external_link; ?>"><span><?php echo $external_icon; ?></span> <span><?php echo $external_label; ?></span></a>
								</div>
							<?php endwhile; ?>
				
						</div>
						<?php endif; ?>

						<div class="row social-icons-row">
							<?php while(have_rows('social_media_items', 'option')) : the_row();
								$social_media_icon = get_sub_field('social_media_icon');
								$social_media_label = get_sub_field('social_media_label');
								$social_media_link = get_sub_field('social_media_link');
							?>
								<div class="social-icon-column">
									<a href="<?php echo $social_media_link ?>"><?php echo $social_media_icon; ?> <?php echo $social_media_label ?></a>
								</div>
							<?php endwhile; ?>
						</div>

						<div>
							<p class="body-text _16"><?php the_field('footer_acknowledgement', 'option') ?></p>
						</div>
					</div>

					<div class="col-md-3 footer-spacer"></div>
				</div>

				<div class="row site-component-row footer-bottom-row">
					<?php while(have_rows('footer_bottom', 'option')) : the_row(); 
						$footer_copyright = get_sub_field('footer_copyright');
						$footer_legal = get_sub_field('footer_legal');
						$footer_legal_link = get_sub_field('footer_legal_link');
						$footer_author = get_sub_field('footer_author');
						$footer_author_link = get_sub_field('footer_author_link');
					?>
						<div class="footer-copyright footer-bottom-column"><?php echo $footer_copyright; ?></div>
						<div class="footer-legal footer-bottom-column"><a href="<?php echo $footer_legal_link; ?>"><?php echo $footer_legal ?></a></div>
						<div class="footer-author footer-bottom-column">Website by: <a href="<?php echo $footer_author_link ?>"><?php echo $footer_author ?></a></div>
					<?php endwhile; ?>
				</div>

			</div>
		</footer><!-- /#footer -->
	</div><!-- /#wrapper -->
	<!-- JavaScript -->


	<script src="<?php echo get_template_directory_uri(); ?>/assets/js/main.js"></script>

	

	<?php
		wp_footer();
	?>
</body>
</html>