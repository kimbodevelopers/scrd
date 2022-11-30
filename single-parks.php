<?php defined('ABSPATH') or die(""); ?>

<?php 
if(get_the_title() === 'Dakota Ridge') {
        header("Location: ". get_site_url() . "/" . "dakota-ridge" . "/" );
    }
?>
<?php get_header(); 
/* Template Name: Single Park */
global $post;

?>
<div class="container-fluid site-component-container single-parks-container">
    <div class="row site-component-row single-parks-row">

        <div class="col-12 single-parks-title-column">
            <?php if(get_the_title()) : ?>
                <div class="col-12 title-column">
                    <h1 class="title-text english _50 col-12"><?php the_title(); ?></h1>
                </div>
            <?php endif; ?>

            <?php if(get_field('aboriginal_title')) : ?>
                <div class="col-12 title-column">
                    <h2 class="title-text aboriginal _50 col-12"><?php the_field('aboriginal_title'); ?></h2>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-5 col-md-6 single-parks-column left">
            <?php $areas = get_the_terms($post->ID, array('taxonomy' => 'area')); ?>

            <?php foreach($areas as $area) : ?>
                <h2 class="title-text _33"><?php echo $area->name ?></h1>
            <?php endforeach; ?>

            <?php if(get_the_content()) :  ?>
                <div class="body-text _17"><?php the_content(); ?></div>
            <?php endif; ?>

            <?php if(get_field('location')) : ?>
                <h3 class="title-text _25">Location</h3>
                <p class="body-text _17"><?php the_field('location') ?></p>
            <?php endif; ?>

            <?php if(get_field('amenities')) : ?>
                <h3 class="title-text _25">Amenities</h3>
                <div class="body-text _17"><?php the_field('amenities'); ?></div>
            <?php endif; ?>

            <?php if(get_field('features_list')) : ?>
                <h3 class="title-text _25">Features</h3>

                <div class="row site-component-row b1-table-row mr-4">
                    <?php while(have_rows('features_list')) : the_row(); 
                        $label = get_sub_field('label');
                        $file = get_sub_field('file');
                    ?>
                        <div class="col-12 b1-table-column">
                            <a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
                                <span class="body-text _17"><?php echo $label ?></span>
                                <span><i class="fa-solid fa-file-pdf"></i></span>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-lg-4 col-md-6 single-parks-column right">


            <?php $park_images = get_field('parks_gallery'); ?>
            <?php $index = 0; ?>

            <div id="carouselParkIndicator" class="carousel slide" data-bs-ride="false">
                <div class="carousel-indicators">

                    <?php if($park_images) : ?>

                        <?php if(wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]) : ?>
                            <button type="button" data-bs-target="#carouselParkIndicator" class="active" data-bs-slide-to="0" <?php if(get_row_index() === 0) : ?>aria-current="true"><?php endif; ?></button>
                        <?php endif; ?>

                        <?php foreach($park_images as $park_image) : ?>
                            <button type="button" data-bs-target="#carouselParkIndicator" class="" data-bs-slide-to="<?php echo $index + 1 ?>"></button>
                        
                        <?php $index++; ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="carousel-inner">

                    <?php if(wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0]) : ?>
                        <div class="carousel-item active">

                            <img class="single-page-image" src="<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0] ; ?>" >
                        </div>
                    <?php endif; ?>

                    <?php if($park_images) : ?>
                        <?php foreach($park_images as $park_image) : ?>
                            <div class="carousel-item">
                                <img src="<?php echo $park_image['url'] ?>" class="d-block w-100" alt="<?php echo $park_image['alt'] ?>">
                            </div>
                            <?php echo $index; ?>
                        <?php $index++; ?>
                        <?php endforeach; ?>
                    <? endif; ?>
                </div>

                <?php if($park_images) : ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselParkIndicator" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselParkIndicator" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                <?php endif; ?>
            </div>



            <?php if(get_field('address')) : ?>
                <p class="body-text _17"><strong>Address</strong>: <?php the_field('address'); ?>
                    <?php if(get_field('address_link')) : ?>
                        <span><a href="<?php echo get_field('address_link')['url']; ?>" target="__blank">(Google Maps)</a></span>
                    <?php endif; ?>
                </p>
            <?php endif; ?>


            <?php if(have_rows('alternative_addresses')) : ?>
                <?php while(have_rows('alternative_addresses')) : the_row(); 
                    $alternative_address = get_sub_field('alternative_address');
                    $alternative_address_link = get_sub_field('alternative_address_link');
                ?>
                    <p class="body-text _17">
                        <?php echo $alternative_address ?>
                        <span><a href="<?php echo $alternative_address_link['url']; ?>" target="__blank">(Google Maps)</a></span>
                    </p>
                <?php endwhile; ?>
            <?php endif; ?>

            <?php if(get_field('measure_of_area')) : ?>
                <p class="body-text _17"><strong>Area</strong>: <?php the_field('measure_of_area') ?></p>
            <?php endif; ?>

            <?php if(get_field('map_download')) : ?>
                <p class="body-text _17"><strong>Map</strong>: <a href="<?php the_field('map_download') ?>" target="__blank"><?php the_title(); ?></a> (PDF)</p>
            <?php endif; ?>

        </div>

    </div>


    <?php if(get_field('aboriginal_title')) : ?>
        <div class="row pronunciation-row">

            <?php if(get_field('aboriginal_title')) : ?>
                <div class="col-lg-9 pronunciation-title-column">
                    <h2 class="title-text _33 aboriginal-title"><?php the_field('aboriginal_title'); ?></h2>
                </div>
            <?php endif; ?>


            <div class="col-lg-4 col-md-6 pronunciation-column">
                <?php if(get_field('pronunciation_introduction')) : ?>
                    <p class="text-section"><?php the_field('pronunciation_introduction') ?></p>
                <?php endif; ?>

                <?php if(get_field('learn_more')) : ?>
                    <div>Learn more about the <a href="<?php the_field('learn_more'); ?>">project in this document</a>.</div>
                <?php endif; ?>
            </div>

            <div class="col-lg-5 col-md-6 pronunciation-column">
                <?php if(get_field('pronunciation')) : ?>
                    <div class="text-section"><strong>Pronunciation</strong>: <?php the_field('pronunciation'); ?></div>
                <?php endif; ?>

                <?php if(get_field('pronunciation_description')) : ?>
                    <p class="text-section"><?php the_field('pronunciation_description') ?></p>
                <?php endif; ?>

                <?php if(get_field('meaning')) : ?>
                    <p class="text-section"><strong>Meaning</strong>: <?php the_field('meaning') ?></p>
                <?php endif; ?>
            </div>

        </div>
    <?php endif; ?>

    <?php get_template_part('inc/components/contacts/parks-contact') ?>

</div>
<?php get_footer(); ?>