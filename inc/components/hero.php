<?php if(have_rows('hero_slides')) : ?>

<div id="carouselHeroIndicator" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php while(have_rows('hero_slides')) : the_row(); ?>
            <button type="button" data-bs-target="#carouselHeroIndicator" class="<?php if(get_row_index() === 1) : ?>active<?php endif; ?>" data-bs-slide-to="<?php echo get_row_index() - 1 ?>" <?php if(get_row_index() === 1) : ?>aria-current="true"><?php endif; ?></button>
        <?php endwhile; ?>
    </div>
    <div class="carousel-inner">
        <?php while(have_rows('hero_slides')) : the_row();
            $slide_image = get_sub_field('slide_image');    
        ?>
            <div class="carousel-item <?php if(get_row_index() === 1): ?>active<?php endif; ?>">
                <img src="<?php echo $slide_image['url'] ?>" class="d-block w-100" alt="<?php echo $slide_image['alt'] ?>">
            </div>

        <?php endwhile; ?>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselHeroIndicator" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselHeroIndicator" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<?php endif; ?>