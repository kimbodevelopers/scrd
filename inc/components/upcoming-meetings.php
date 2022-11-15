<?php
    while(have_posts()) : the_post();?>

    <?php $post_id = get_the_ID();
        $agenda_types = get_field('agenda_type');
        $has_upcoming_agenda = false;
    ?>

<?php foreach($agenda_types as $key=>$agenda_type) : ?>
                            
    <?php foreach($agenda_type['agenda'] as $agenda) : ?>
        <?php if($agenda['upcoming_meeting'] === "yes") : ?>
            <?php $has_upcoming_agenda = true; ?>

        <?php endif; ?>
    <?php endforeach; ?>

<?php endforeach; ?>


<?php if($has_upcoming_agenda === true ) : ?>

    <div class="container-fluid site-component-container">
        <div class="row site-component-row mt-5 ">
            <div class="col-md-10 col-12">
                <h2 class="title-text _33 upcoming-meeting-title">Upcoming Meetings</h2>
            </div>
        </div>
    </div>


    <div class="container-fluid site-component-container agendas-upcoming-container">
        <div class="row site-component-row agendas-row">
            <div class="agenda-item-header row body-text _17">

                <div class="time-header col-md-3">
                    Date / Time
                </div>

                <div class="meeting-header col-md-2 mobile">
                    Meeting
                </div>

                <div class="agendas-header col-md-1 col-4">
                    Agendas
                </div>

                <div class="late-items-header col-md-2 col-4">
                    Late Items
                </div>

                <div class="watch-header col-md-1 col-4">
                    Watch
                </div>

                <div class="zoom-header col-md-3">
                    Participate
                </div>
            </div>

            <?php foreach($agenda_types as $key=>$agenda_type) : ?>
                            
                <?php foreach($agenda_type['agenda'] as $agenda) : ?>

                    <?php if($agenda['upcoming_meeting'] === 'yes') :  ?>

                    <div class="agenda-items-row row">
                        <div class="time-item-column col-md-3 desktop">

                            <div><?php echo $agenda['date'] ?></div>
                            <?php if($agenda['upcoming_agenda_details']['time']) : ?>
                                <?php echo $agenda['upcoming_agenda_details']['time'] ?>
                            <?php endif; ?>

                            <?php if($agenda['meeting_status'] !== 'none') : ?>
                            <div class="meeting-status"><?php echo $agenda['meeting_status'] ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="col-md-2 meeting-item-column desktop">
                            <?php if($agenda['upcoming_agenda_details']['meeting_name']) : ?>
                                <?php echo $agenda['upcoming_agenda_details']['meeting_name'] ?>
                            <?php else : ?>
                                N/A
                            <?php endif; ?>
                        </div>

                        <div class="col-md-1 col-4 agenda-icon-column">
                            <?php if($agenda['agenda']) : ?>

                                <a href="<?php echo $agenda['agenda'] ?>" download>
                                    <span><i class="fa-solid fa-file-pdf"></i></span>
                                </a>

                            <?php else : ?>
                                N/A
                            <?php endif; ?>
                        </div>


                        <div class="col-md-2 col-4 agenda-icon-column">

                            <?php if($agenda['late_items']) : ?>
                                <a href="<?php echo $agenda['late_items'] ?>" download>
                                    <span><i class="fa-solid fa-file-pdf"></i></span>
                                </a>                                    
                            <?php else : ?>
                                N/A
                            <?php endif; ?>
                        </div>

                        <div class="col-md-1 col-4 agenda-icon-column">
                            <?php if($agenda['audio_video']) : ?>
                                <a href="<?php echo $agenda['audio_video'] ?>" target="_blank">
                                    <i class="fa-brands fa-youtube"></i>
                                </a>
                            <?php else : ?>
                                N/A
                            <?php endif; ?>
                        </div>


                        <div class="col-md-3 col-sm-6 col-12 webinar-icon-column">
                            <?php if($agenda['upcoming_agenda_details']['webinar_id'] || $agenda['upcoming_agenda_details']['zoom_link']) : ?>
                                <a href="<?php echo $agenda['upcoming_agenda_details']['zoom_link'] ?>">
                                    <img class="webinar-icon" src="<?php echo get_field('zoom_logo', 'option')['url'] ?>" />
                                </a>
                                <?php if($agenda['upcoming_agenda_details']['webinar_id']) : ?>
                                    <div class="body-text _17">Webinar ID: <?php echo $agenda['upcoming_agenda_details']['webinar_id'] ?></div>
                                <?php endif ?>

                                <?php if($agenda['upcoming_agenda_details']['passcode']) : ?>
                                    <div class="body-text _17">Passcode: <?php echo $agenda['upcoming_agenda_details']['passcode'] ?></div>
                                <?php endif; ?>

                            <?php else : ?>
                                N/A
                            <?php endif; ?>
                        </div>

                        <div class="time-item-column col-sm-6 col-12 mobile">
                            <div><span>Date: <?php echo $agenda['date'] ?>  </span>
                                <?php if($agenda['meeting_status'] !== 'none') : ?>
                                <span class="meeting-status">| <?php echo $agenda['meeting_status'] ?></span>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <?php endif; ?>
                            
                <?php endforeach; ?>
            <?php endforeach; ?>


        
        </div>
    </div>


    <?php endif; ?>

<?php endwhile; wp_reset_postdata(); ?>

