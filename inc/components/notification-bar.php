<?php while(have_rows('notification_bar', 'option')) : the_row(); 
	$display_notification = get_sub_field('display_notification');
	$notification_message = get_sub_field('notification_message');
	$notification_link = get_sub_field('notification_link');
	$background_colour = get_sub_field('background_colour');
	$icon = get_sub_field('icon');
?>
	<?php if($display_notification === 'enable') : ?>
		<?php $bg = ''; ?>
		<?php $text_colour_dark = ''; ?>
		<?php $invert_colour = ''; ?>

		<?php if($background_colour === 'alarm_red') : ?>
			<?php $bg = 'alarm-red' ?>
		<?php elseif($background_colour === 'deep_blue') : ?>
			<?php $bg = 'deep-blue' ?>
		<?php elseif($background_colour === 'rich_black') : ?>
			<?php $bg = 'rich-black' ?>
		<?php elseif($background_colour === 'dark_teal') : ?>
			<?php $bg = 'dark-teal' ?>
		<?php elseif($background_colour === 'light_blue') : ?>
			<?php $bg = 'light-blue' ?>
		<?php elseif($background_colour === 'yellow') : ?>
			<?php $bg = 'yellow' ?>
			<?php $text_colour_dark = 'dark-teal-text'; ?>
			<?php $invert_colour = 'invert-colour'; ?>
		<?php elseif($background_colour === 'green') : ?>
			<?php $bg = 'green' ?>
		<?php endif; ?>

		<?php $set_icon = ''; ?>

		<?php if($icon  === 'exclamation_triangle') : ?>
			<?php $set_icon = '<i class="fa-solid fa-triangle-exclamation ' . $invert_colour . '"></i>'; ?>
		<?php elseif($icon  === 'low_tempurature') : ?>
			<?php $set_icon = '<i class="fa-solid fa-temperature-low ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'high_tempurature') : ?>
			<?php $set_icon = '<i class="fa-solid fa-temperature-high ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'sun') : ?>
			<?php $set_icon = '<i class="fa-solid fa-sun ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'wind') : ?>
			<?php $set_icon = '<i class="fa-solid fa-wind ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'cloud') : ?>
			<?php $set_icon = '<i class="fa-solid fa-cloud ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'rain') : ?>
			<?php $set_icon = '<i class="fa-solid fa-cloud-showers-heavy ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'snowflake') : ?>
			<?php $set_icon = '<i class="fa-solid fa-snowflake ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'drought') : ?>
			<?php $set_icon = '<i class="fa-solid fa-sun-plant-wilt ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'calendar') : ?>
			<?php $set_icon = '<i class="fa-solid fa-calendar-days ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'traffic') : ?>
			<?php $set_icon = '<i class="fa-solid fa-traffic-light ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'construction_digging') : ?>
			<?php $set_icon = '<i class="fa-solid fa-person-digging ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'construction_helmet') : ?>
			<?php $set_icon = '<i class="fa-solid fa-helmet-safety ' . $invert_colour . '"></i>' ?>
		<?php elseif($icon  === 'car_crash') : ?>
			<?php $set_icon = '<i class="fa-solid fa-car-burst ' . $invert_colour . '"></i>' ?>
		<?php endif; ?>

		

		<div class="notification-bar-container container-fluid <?php echo $bg ?> hide-bar">
			<div class="row notification-bar-row">
				<div class="col-12 notice-column body-text _15">
					<?php echo $set_icon ?>
					<span class="notice <?php echo $text_colour_dark ?>"><?php echo $notification_message ?>
					<?php if($notification_link) : ?>
						<a class="<?php echo $text_colour_dark ?>" href="<?php echo $notification_link ?>" target="__blank"><strong>Read More <i class="fa-solid fa-chevron-right"></i></strong></a>
					<?php endif; ?>
					</span>
				</div>
				<div class="exit-wrapper">
					<div class="notification-close-button ">
						<i class="fa-solid fa-xmark <?php echo $invert_colour ?>"></i>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
<?php endwhile; ?>