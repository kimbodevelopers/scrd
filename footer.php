</main><!-- /#main -->

		<footer>
			<div class="container-fluid site-component-container">
				<div class="row site-component-row">
					<div class="col-md-4">
						<div class="address-wrapper">
							<p class="body-text _20 address-title">Sunshine Coast Regional District Administration Office</p>
							<p><i class="fa-solid fa-location-dot"></i>&nbsp;1975 Field Road Sechelt, BC V7Z 0A8</p>
							<p><i class="fa-solid fa-phone"></i>&nbsp;604-885-6800</p>
							<p><i class="fa-solid fa-phone"></i>&nbsp;TOLL FREE 1-800-687-5753</p>
							<p><i class="fa-solid fa-fax"></i>&nbsp;604-885-7909</p>
							<p><i class="fa-solid fa-envelope"></i>&nbsp;info@scrd.ca</p>
						</div>

						<?php
						$main_menu_param = array(
							'theme_location' => 'footer-main-menu',
							'menu_class' => 'footer-main-menu',
							
						);
					?>

					<?php wp_nav_menu($main_menu_param); ?>
					</div>

					<div class="col-md-8">
						<div></div>
						<div></div>
						<div><p class="body-text _16">The Sunshine Coast Regional District is located on the territories of the shíshálh and Sḵwx̱wú7mesh Nations.</p></div>
					</div>
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