
<div class="col-12 col-lg-3 col-md-4 col-sm-6 c8-card-column">


    <div class="c8-card-wrapper">

        <div class="body-text _15 card-doc-type">
            <?php if($post->post_type === 'attachment') : ?>
                DOCUMENT
            <?php elseif($post->post_type === 'ocp') : ?>
                OFFICIAL COMMUNITY PLAN
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
                    <?php if($post->post_type === 'agendas') : ?>
                        <?php the_field('date') ?>
                    <?php else : ?>
                        <?php the_title(); ?>
                    <?php endif; ?>
                </a>
            <?php else : ?>
                <?php the_title(); ?>
            <?php endif; ?>
        </h3>

        <div class="files-wrapper">

            <!-- standard files -->
            <?php if(have_rows('files')) : ?>
                <?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-standard') ?>
            <?php endif; ?>

            <!-- Bid Opportunity Files -->
            <?php if($post->post_type === 'bid-opportunities') : ?>
                <?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-bid-opportunities') ?>
            <?php endif; ?>

            <!-- Attachment Files -->

            <?php if($post->post_type === 'attachment') : ?>
                <?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-attachment') ?>
            <?php endif; ?>

            <!-- Agenda Files -->
            <?php if($post->post_type === 'agendas') : ?>
                <?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-agendas') ?>
            <?php endif; ?>

            <!-- OCP Files -->

            <?php if($post->post_type === 'ocp') : ?>
                <?php get_template_part('inc/components/partials/c8-conditional-partials/view-doc-ocp') ?>

            <?php endif; ?>

        </div>




      
    </div>
</div>