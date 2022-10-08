<div class="hero-slider">
    <?php while(have_rows('hero_slides')) : the_row(); 
        $slide_image = get_sub_field('slide_image');
    ?>
        <div><img src="<?php echo $slide_image['url'] ?>" /></div>
    <?php endwhile; ?>
</div>
			