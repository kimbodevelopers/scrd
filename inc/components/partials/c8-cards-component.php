
<div class="col-12 col-lg-3 col-md-4 col-sm-6 c8-card-column">


    <div class="c8-card-wrapper">

        <div class="body-text _15 card-doc-type">
            <?php if($post->post_type === 'attachment') : ?>
                DOCUMENT
            <?php else : ?>
                <?php echo strtoupper(str_replace('-', ' ', $post->post_type)) ?>
            <?php endif; ?>
        </div>

        
        <p class="body-text _15 card-taxonomy">
            <?php 
                $post_type = get_post_type(get_the_ID());   
                $taxonomies = get_object_taxonomies($post_type);   
                $taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
                
                if(!empty($taxonomy_names)) :

                    foreach($taxonomy_names as $key=>$value) : ?>              
                        <span><?php if($key !== 0) : ?>|<?php endif; ?> <?php echo $value; ?>  </span>
                    <?php endforeach;

                endif;
            ?>   
        </p>


        <h3 class="title-text _21 c8-card-title">
            <?php if($post->post_type !== 'attachment') : ?>
                <a href="<?php the_permalink(); ?>" target="__blank">
                    <?php the_title(); ?>
                </a>
            <?php else : ?>
                <?php the_title(); ?>
            <?php endif; ?>
        </h3>

        <div class="files-wrapper">
            <?php while(have_rows('files')) : the_row(); 
                $file = get_sub_field('file');
            ?>
                <?php if($file) : ?>
                    <a href="<?php echo $file['url'] ?>" target="__blank">
                        <i class="fa-solid fa-file-pdf"></i>
                        <div class="text-wrapper">
                            <span class="view-text">View this document</span>
                            <span class="file-size">

                                <?php if(intval($file['filesize']) * 0.001 < 1) : ?>
                                        <?php echo number_format($file['filesize'], 2) ?> KB
                                    <?php else : ?>
                                        <?php echo number_format($file['filesize'] * 0.001) ?> KB
                                <?php endif; ?>
                            </span>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endwhile; ?>

            <?php if($post->post_type === 'attachment') : ?>
                <a href="<?php the_permalink(); ?>" target="__blank">
                    <i class="fa-solid fa-file-pdf"></i>

                    <div class="text-wrapper">
                        <span class="view-text">View this document</span>
                        <span class="file-size">
                            <?php if(intval(wp_get_attachment_metadata(get_the_ID())['filesize']) * 0.001 < 1) : ?>
                                    <?php echo number_format(wp_get_attachment_metadata(get_the_ID())['filesize'], 2) ?> KB
                            <?php else : ?>
                                <?php echo number_format(wp_get_attachment_metadata(get_the_ID())['filesize'] * 0.001) ?> KB
                            <?php endif; ?>
                        </span>
                    </div>

                </a>
            <?php endif; ?>


            <?php if($post->post_type === 'agendas') : ?>
                <?php while(have_rows('agenda_files')) : the_row(); 
                        $file = get_sub_field('file');
                    ?>

                    <?php if($file) : ?>
                        <a href="<?php echo $file['url'] ?>" target="__blank">
                            <i class="fa-solid fa-file-pdf"></i>
                            <div class="text-wrapper">
                                <span class="view-text">View this document</span>
                                <span class="file-size">

                                    <?php if(intval($file['filesize']) * 0.001 < 1) : ?>
                                            <?php echo number_format($file['filesize'], 2) ?> KB
                                        <?php else : ?>
                                            <?php echo number_format($file['filesize'] * 0.001) ?> KB
                                    <?php endif; ?>
                                </span>
                            </div>
                        </a>
                    <?php endif; ?>

                <?php endwhile; ?>
            <?php endif; ?>

        </div>




      
    </div>
</div>