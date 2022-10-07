<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Single Park */
?>
<div class="container-fluid site-component-container">
    <div class="row site-component-row">
        <h2 class="title-text _50 col-12"><?php the_title(); ?></h2>
    </div>

    <div class="row site-component-row">

        <?php if(wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]) : ?>                
            <img class="single-page-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ; ?>" >
        <?php endif; ?>


        <?php if(get_field('address')) : ?>
            <p><?php the_field('address'); ?>
                <?php if(get_field('address_link')) : ?>
                    <span><a href="<?php echo get_field('address_link')['url']; ?>" target="__blank">(View in Google Maps)</a></span>
                <?php endif; ?>
            </p>
        <?php endif; ?>

        <?php if(get_the_content()) :  ?>
            <div><?php the_content(); ?></div>
        <?php endif; ?>


        <?php if(get_field('location')) : ?>
            <p><strong>Location</strong>: <?php the_field('location') ?></p>
        <?php endif; ?>

        <?php if(get_field('measure_of_area')) : ?>
            <p><strong>Area</strong>: <?php the_field('measure_of_area') ?></p>
        <?php endif; ?>

        <?php if(get_field('amenities')) : ?>
            <div><span><strong>Amenities</strong>: </span><span><?php the_field('amenities'); ?></span></div>
        <?php endif; ?>

        <?php if(get_field('pronunciation_introduction')) : ?>
            <div class="">
                <p><?php the_field('pronunciation_introduction') ?></p>
            </div>
        <?php endif; ?>

        <?php if(get_field('pronunciation')) : ?>
            <div><strong>Pronunciation</strong>: <?php the_field('pronunciation'); ?></div>
        <?php endif; ?>

        <?php if(get_field('map_download')) : ?>
            <p><strong>Map</strong>: <a href="<?php the_field('map_download') ?>" target="__blank"><?php the_title(); ?></a></p>
        <?php endif; ?>


        <div>Learn more about the project in this document.</div>

        <?php $area_terms = get_terms(array('taxonomy' => 'area')); ?>

        <?php if($area_terms) : ?>
            <?php foreach($area_terms as $area) : ?>
                <p><?php echo $area->name ?></p>
                <p><?php // echo $area->slug ?></p>
            <?php endforeach; ?>
        <?php endif; ?>




    </div>
</div>
<?php get_footer(); ?>