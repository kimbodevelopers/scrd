<?php if( get_row_layout() == 'h2_small_banner' ): ?>

	<?php $text_colour = get_sub_field('text_colour'); ?>

	<?php if($text_colour === 'white') : ?>
		<?php $text_colour = 'white'; ?>
	<?php elseif($text_colour === 'dark_teal') : ?>
		<?php $text_colour = 'dark-teal'; ?>
	<?php elseif($text_colour === 'dark_blue') : ?>
		<?php $text_colour = 'dark-blue'; ?>
	<?php endif; ?>

	<div class="h2-small-banner-wrapper">
		<img src="<?php echo esc_url(get_sub_field('image')['url']); ?>" alt="<?php echo esc_attr(get_sub_field('image')['alt']); ?>" />

		<div class="headline-wrapper">
			<h2 class="title-text _50 <?php echo $text_colour ?>">
				<?php echo get_sub_field('headline') ?>
			</h2>
		</div>
	</div>
<?php endif; ?>