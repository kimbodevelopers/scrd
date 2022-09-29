<div class="container-fluid site-component-container notification-information-container">
    <div class="row site-component-row notification-information-row">
        <?php while(have_rows('information_notification', 'option')) : the_row(); 
            $title = get_sub_field('title');
            $icon = get_sub_field('icon');
            $description = get_sub_field('description');
        ?>
            <div class="col-lg-4 col-sm-6 notification-information-column">
                <div class="notification-information-wrapper top">
                    <div class="title-wrapper">
                        <h3 class="title-text _27"><?php echo $title; ?></h3>
                    </div>
                    <div class="icon-wrapper">
                        <?php echo $icon; ?>
                    </div>
                </div>

                <div class="notification-information-wrapper bottom">
                    <div class="notification-information-content body-text ._27"><?php echo $description ?></div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>