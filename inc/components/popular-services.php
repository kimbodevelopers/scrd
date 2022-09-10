<?php if(get_field('popular_services', 'option')) : ?>

    <div class="popular-services-container container-fluid">

        <div class="popullar-srevices-row row site-row">

        <?php while(have_rows('popular_services', 'option')) : the_row(); 
            $title = get_sub_field('title', 'option');
            $icon = get_sub_field('icon', 'option');
            $link = get_sub_field('link', 'option')
        ?>
            <div class="popular-service-column">
                <div class="popular-service-item-wrapper">
                    <h3><?php echo $title ?></h3>
                    <div><?php echo $icon ?></div>
                </div>
            </div>
        <?php endwhile; ?>

        </div>

    </div>
<?php endif; ?>