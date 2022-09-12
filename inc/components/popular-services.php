<?php if(get_field('popular_services', 'option')) : ?>

    <div class="popular-services-container container-fluid site-component-container">



        <div class="row site-component-row">
            <h2 class="title-text _50 col-12">Popular for <?php echo date('F jS, Y'); ?></h2>
        </div>

        <div class="popular-services-row row site-component-row">

            <?php while(have_rows('popular_services', 'option')) : the_row(); 
                $title = get_sub_field('title', 'option');
                $icon = get_sub_field('icon', 'option');
                $link = get_sub_field('link', 'option')
            ?>
                <div class="popular-service-column">
                    <div class="popular-service-item-wrapper">
                        <h3 class="body-text _20"><?php echo $title ?></h3>
                        <div class="icon-wrapper"><?php echo $icon ?></div>
                    </div>
                </div>
            <?php endwhile; ?>

        </div>

    </div>
<?php endif; ?>