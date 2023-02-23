<?php defined('ABSPATH') or die(""); ?>
<?php get_header(); 
/* Template Name: Parks */

global $post;

?>
<div class="container-fluid site-component-container">
	<div class="row site-component-row">
		<div class="col-12">
			<?php
			if ( function_exists('yoast_breadcrumb') ) {
				yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
			}
			?>
		</div>
	</div>
</div>

<div class="container-fluid large-cards-container site-component-container">
    <div class="row site-component-row">
		<div class="col-12">
			<h2 class="title-text _50 mb-0"><?php the_title() ?></h2>
		</div>
    </div>
	
</div>

<?php get_template_part('inc/components/custom-text-group') ?>

    <?php 
    
    $park_amenities = get_terms(array(
        'taxonomy' => 'park_amenities',
        'hide_empty' => true,
    )); 

    $areas = get_terms(array(
        'taxonomy' => 'area',
        'hide_empty' => true,
    )); 
    
    $submitted_park_amenities = [];
    $submitted_areas = [];

    require get_template_directory() . '/inc/park-filter.php';

    ?>
	
<div class="container-fluid large-cards-container site-component-container">
	
    <div  class="row site-component-row park-form-row">

        <!-- localhost -->
        <?php if(  $_SERVER['HTTP_HOST'] === 'localhost') : ?>
            <?php $action_slug = 'http://' . $_SERVER['HTTP_HOST'] . '/scrd/parks/'; ?>

        <?php elseif ($_SERVER['HTTP_HOST'] === 'scrd.kimboagency.com') : ?>
            <?php $action_slug = 'http://' . $_SERVER['HTTP_HOST'] . '/parks/'; ?>
        <?php endif; ?>


        <form method="post" action="<?php echo $action_slug ?>" class="parks-filter row">

            <?php if(isset($_POST['park_amenity'])) : ?>
                <?php $park_array = $_POST['park_amenity'] ?>
            <?php else : ?>
                <?php $park_array = []; ?>
            <?php endif; ?>

            <?php if(isset($_POST['area'])) : ?>
                <?php $area_array = $_POST['area'] ?>
            <?php else : ?>
                <?php $area_array = []; ?>
            <?php endif; ?>

            <div class="col-lg-3 col-md-4">
                <div class="dropdown show">
      
                    <a class="btn dropdown-toggle filter-dropdown-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Park Amenities
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php foreach($park_amenities as $park_amenity) : ?>
                            <div class="dropdown-item">
                                <label for="<?php echo $park_amenity->slug ?>"><?php echo $park_amenity->name ?></label>
                                <input id="<?php echo $park_amenity->slug ?>" type="checkbox" name="park_amenity[]" value="<?php echo $park_amenity->slug ?>" <?php if(in_array($park_amenity->slug, $park_array )) : ?>checked='checked'<?php else: ?><?php endif; ?>/>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="dropdown show">

                    <a class="btn dropdown-toggle filter-dropdown-button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Areas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php foreach($areas as $area) : ?>
                            <div class="dropdown-item">
                                <label for="<?php echo $area->slug ?>"><?php echo $area->name ?></label>
                                <input id="<?php echo $area->slug ?>" type="checkbox" name="area[]" value="<?php echo $area->slug ?>" <?php if(in_array($area->slug, $area_array )) : ?>checked='checked'<?php else: ?><?php endif; ?>/>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-4 submit-reset-column">
                <input type="submit" value="Submit" name="submit" class='global-submit'>
                <input type="submit" value="Reset" name="reset" class="global-submit reset-filter">
            </div>

        </form>

    </div>

    <?php 

        $paged = ( get_query_var('paged') ) ? absint( get_query_var('paged') ) : 1;
        if( get_query_var('paged') ) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        $park_posts = new WP_Query(array(
            'post_type' => 'parks',
            'posts_per_page' => 9,
            'post__status' => 'published',
            'order' => 'asc',
            'orderby' => 'title',
            'paged' => $paged,
            'tax_query' => array(
                'relation' => 'AND',
                array(
                    'relation' => 'OR',
                    'taxonomy' => 'park_amenities',
                    'field' => 'slug',
                    'terms' => $submitted_park_amenities
                ),

                array(
                    'relation' => 'OR',
                    'taxonomy' => 'area',
                    'field'    => 'slug',
                    'terms'    => $submitted_areas,
                ),
            

            )
        ));

        $wp_query = $park_posts;
    ?>    

    <div class="row site-component-row large-cards-row">

    <?php $posts_array_count = count($park_posts->posts) ?>

        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php get_template_part('inc/components/large-card') ?>
        <?php endwhile; ?>

    </div>


    <div class="row pagination-row site-component-row">
        <div class="col-12 text-center">
            <div class="pagination-wrapper">
                <?php echo paginate_links(array(
                    'next_text' => '<span class="paginate-icon next-icon"><i class="fa-solid fa-chevron-right"></i></span>',
                    'prev_text' => '<span class="paginate-icon prev-icon"><i class="fa-solid fa-chevron-left"></i></span>'
                )); ?>
            </div>
        </div>
    </div>
	
	<?php get_template_part('inc/components/contacts/parks-contact') ?>

</div>
<?php get_footer(); ?>