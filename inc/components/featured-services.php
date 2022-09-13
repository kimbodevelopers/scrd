<div class="container-fluid featured-services-container site-component-container">
    <div class="row site-component-row featured-services-row">
        <?php while(have_rows('featured_services_items', 'option')) : the_row(); 
            $icon = get_sub_field('featured_services_icon');
            $link = get_sub_field('featured_services_link');
            $snippet = get_sub_field('featured_services_snippet');
        ?>
            <div class="col-md-3 featured-services-column">
                <div class="featured-services-wrapper">
                    <div class="title-icon">
                        <h3 class="body-text _20"><?php print_r($link['title']) ?></h3>
                        <div class="icon-wrapper"><?php echo $icon ?></div>
                    </div>

                    
                    <p class="body-text _17"><?php echo $snippet; ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>