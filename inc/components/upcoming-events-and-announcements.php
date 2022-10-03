
<div class="container-fluid site-component-container upcoming-events-and-announcements-container">

    <div class="row site-component-row">
        <h2 class="title-text _50 col-12">Events and Announcements</h2>
    </div>

    <div class="row site-component-row upcoming-events-and-announcements-row">
        <?php 
            $today = date('Ymd');

            $event_announcements = new WP_Query(array(
                'post_type' => 'events-announcements',
                'posts_per_page' => 3,
                'post__status' => 'published',
                'order' => 'ASC',
                'orderby' => 'meta_value',
                'meta_key' => 'date_of_event',
                'meta_query' => array (
                    'post__not_in' => array (
                    'key' => 'date_of_event',
                    'value' => $today,
                    'compare' => '>='
                    )
                
                ),
            ));

        ?>

        <?php while($event_announcements->have_posts()) : $event_announcements->the_post() ;
            $date_of_event = get_field('date_of_event');
            $day = date('d', strtotime($date_of_event));
            $month = date("F",strtotime($date_of_event));
            $year = date('Y', strtotime($date_of_event));
        ?>
            <div class="col-md-4 upcoming-events-and-announcements-column">
                <a href="<?php the_permalink(); ?>">
                    <div class="upcoming-events-and-announcements-wrapper">
                        <div class="date-wrapper row">
                            <div class="col-4">
                                <span class="title-text _67"><?php echo $day ?></span>
                            </div>
                            <div class="col-8">
                                <p class="title-text _25"><?php echo $month ?></p>
                                <p class="title-text _25"><?php echo $year ?></p>
                            </div>
                        </div>

                        <div class="snippet-wrapper">
                            <p class="body-text _27"><?php the_title() ?></p>
                            <p class="body-text _17 read-more" href="<?php the_permalink(); ?>">Read More >></p>
                        </div>

                    </div>
                </a>
            </div>

        <?php wp_reset_query(); ?>
        <?php endwhile; ?>
    </div>
</div>

