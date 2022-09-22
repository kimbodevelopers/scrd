<?php if(get_field('get_informed_section', 'option')) : ?>

    <div class="container-fluid site-component-container get-informed-container">
        <div class="row site-component-row get-informed-row">
            <?php while(have_rows('get_informed_section', 'option')) : the_row() ; 
                $title = get_sub_field('title');
                $subtitle = get_sub_field('subtitle');
                $button_link = get_sub_field('button_link');
                $button_label = get_sub_field('button_label');
                $image = get_sub_field('image');
            ?>
            <div class="col-lg-7 col-sm-6 get-informed-content-column">
                <div class="get-informed-content-wrapper">
                    <h2 class="title-text _68"><?php echo $title ?></h2>
                    <h3 class="title-text _44"><?php echo $subtitle ?></h3>
                    
                    <?php if($button_label) : ?>
                        <div class="row site-component-row button-row">
                            <div class="col-12 button-column">
                                <a href="<?php echo $button_link ?>" class="site-button body-text _26"><?php echo $button_label ?></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>


            </div>
            <div class="col-lg-5 col-sm-6 get-informed-image-column">
                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
            </div>

            <?php endwhile; ?>
        </div>
    </div>

<?php endif; ?>