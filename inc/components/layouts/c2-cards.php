<?php if(get_row_layout() === 'c2_cards') : ?>

    <div class="container-fluid featured-services-container site-component-container">
        <div class="row site-component-row featured-services-row">
            <?php while(have_rows('cards')) : the_row(); 
                $icon = get_sub_field('icon');
                $title = get_sub_field('title');
                $link = get_sub_field('link');
                $snippet = get_sub_field('snippet');
            ?>
                <div class="col-lg-3 col-md-4 featured-services-column">
                    <a <?php if($link) : ?>href="<?php echo $link ?>" target="__blank"<?php endif; ?> >
                        <div class="featured-services-wrapper">
                            <div class="title-icon">
                                <h3 class="body-text _20"><?php echo $title ?></h3>
                                <div class="icon-wrapper"><?php echo $icon ?></div>
                            </div>

                            <p class="body-text _17"><?php echo $snippet; ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
			
			<?php while(have_rows('view_button')) : the_row(); 
                $text = get_sub_field('view_button_text');
                $link = get_sub_field('view_button_link');
            ?>

            <?php if($text || $link) : ?>
                <div class="row site-component-row button-row <?php if(!have_rows('cards') || !get_sub_field('cards_title') ) : ?>mt-0 mb-3<?php endif; ?>">
                    <div class="col-12 button-column">
                        <a href="<?php echo $link ?>" target="__blank" class="site-button body-text _26"><?php echo $text ?></a>
                    </div>
                </div>
            <?php endif; ?>
                
            <?php endwhile; ?>
			
        </div>
    </div>

<?php endif; ?>