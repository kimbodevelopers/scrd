<div class="container-fluid  site-component-container agendas-container">

    <div class="row site-component-row agendas-row">

        <?php
        while(have_posts()) : the_post();?>

            <?php $post_id = get_the_ID();
                $agenda_types = get_field('agenda_type');
            ?>

            <div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA1">

                <?php foreach($agenda_types as $key=>$agenda_type) : ?>

                    <?php $has_upcoming_agenda_2 = true ?>

                    <?php foreach($agenda_type['agenda'] as $agenda) : ?>
                        <?php if($agenda['upcoming_meeting'] !== "yes" ) : ?>
                            <?php $has_upcoming_agenda_2 = false ?>

                        <?php endif; ?>
                    <?php endforeach; ?>

                    <?php if($has_upcoming_agenda_2 === false) : ?>
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="flush-heading-a1-<?php echo $key ?>">
                            <button class="accordion-button collapsed title-text _21" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse-a1-<?php echo $key ?>" aria-expanded="false" aria-controls="flush-collapse-a1-<?php echo $key ?>">
                                <?php echo $agenda_type['agenda_type_label'] ?>
                            </button>
                        </h3>

                        <div id="flush-collapse-a1-<?php echo $key ?>" class="accordion-collapse collapse" aria-labelledby="flush-heading-<?php echo $key ?>" data-bs-parent="#accordionFlushA1">
                            <div class="agenda-item-header row body-text _17 past">
                                <div class="time-header col-md-3 col-4">
                                    Date
                                </div>
        
                                <div class="agendas-header col-md-3 col-4">
                                    Agendas
                                </div>

                                <div class="late-items-header col-md-3 col-4">
                                    Late Items
                                </div>

                                <div class="watch-header col-md-3 col-4">
                                    Watch
                                </div>
                            </div>
                                
                            <?php foreach($agenda_type['agenda'] as $agenda) : ?>
                                <?php if($agenda['upcoming_meeting'] !== "yes") : ?>
                                    <div class="agenda-items-row row">
                                        <div class="time-item-column col-md-3 desktop">
                                            <div><?php echo $agenda['date'] ?></div>
                                            <div class="meeting-status"><?php echo $agenda['meeting_status'] ?></div>
                                        </div>

                                        <div class="col-md-3 col-4 agenda-icon-column">
                                            <?php if($agenda['agenda']) : ?>

                                                <a href="<?php echo $agenda['agenda'] ?>" download>
                                                    <span><i class="fa-solid fa-file-pdf"></i></span>
                                                </a>

                                            <?php else : ?>
                                                N/A
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-3 col-4 agenda-icon-column">

                                            <?php if($agenda['late_items']) : ?>
                                                <a href="<?php echo $agenda['late_items'] ?>" download>
                                                    <span><i class="fa-solid fa-file-pdf"></i></span>
                                                </a>                                    
                                            <?php else : ?>
                                                N/A
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-md-3 col-4 agenda-icon-column">
                                            <?php if($agenda['audio_video']) : ?>
                                                <a href="<?php echo $agenda['audio_video'] ?>" target="_blank">
                                                    <i class="fa-brands fa-youtube"></i>
                                                </a>
                                            <?php else : ?>
                                                N/A
                                            <?php endif; ?>
                                        </div>

                                        <div class="time-item-column col-sm-6 col-12 mobile">
                                            <div><span>Date: <?php echo $agenda['date'] ?> | </span>
                                                
                                                <span class="meeting-status"><?php echo $agenda['meeting_status'] ?></span>
                                            </div>
                                        </div>

                                    </div>
                                <?php endif; ?>    
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                <?php endforeach; ?>

            </div>

        <?php endwhile; wp_reset_postdata(); ?>
    </div>

</div>