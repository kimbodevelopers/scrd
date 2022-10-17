<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress

 */

// Compile LESS using PHP

/* setup custom url with echo */
function custom_url() { echo site_url() . '/wp-content/themes/scrd/assets'; }

/* Compile LESS */
function website_scripts() {

$check_server = $_SERVER['HTTP_HOST'];
if ( $check_server == "localhost" ) {
	$site_path = "C:/mamp/htdocs/scrd/wp-content/themes/scrd/assets"; /**** <<--- CHANGE THIS TO YOUR LOCALHOST FOLDER NAME ****/
} else {
	//<<--- CHANGE THIS TO THE LIVE SITE USERNAME ****/
  $site_path = "/home/kimboagency8627/scrd.kimboagency.com/wp-content/themes/scrd/assets"; /**** <<--- CHANGE THIS TO THE LIVE SITE USERNAME ****/
}
	include( $site_path . '/scripts/php/lessc.inc.php' );
	
	$inputFile  = $site_path . '/less/styles.less';
	$outputFile = $site_path . '/css/styles.css';

	// load the cache
	$cacheFile = $inputFile.".cache";

	if (file_exists($cacheFile)) {
	    $cache = unserialize(file_get_contents($cacheFile));
	} else {
	    $cache = $inputFile;
	}

	$less = new lessc22;
	$newCache = $less->cachedCompile($cache);

	if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
	    file_put_contents($cacheFile, serialize($newCache));
	    file_put_contents($outputFile, $newCache['compiled']);
	}


}
add_action( 'wp_enqueue_scripts', 'website_scripts' );

if ( function_exists( 'register_nav_menus' ) ) {
	register_nav_menus(
		array(
			'nav-main-menu'   => 'Main Navigation Menu',
			'nav-sub-menu'   => 'Navigation Sub Menu',
			'footer-main-menu' => 'Main Footer Menu',
			)
	);
}

if(function_exists('acf_add_options_page')) {
	acf_add_options_page();

	acf_add_options_sub_page('Header', array(
		'page_title' => 'Header',
		'menu_title' => 'Header',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Footer / Address', array(
		'page_title' => 'Footer / Address',
		'menu_title' => 'Footer / Address',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Popular Services', array(
		'page_title' => 'Popular Services',
		'menu_title' => 'Popular Services',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Featured Parks and Rec', array(
		'page_title' => 'Featured Parks and Rec',
		'menu_title' => 'Featured Parks and Rec',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Featured Parks', array(
		'page_title' => 'Featured Parks',
		'menu_title' => 'Featured Parks',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Featured Recreation', array(
		'page_title' => 'Featured Recreation',
		'menu_title' => 'Featured Recreation',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Featured Services', array(
		'page_title' => 'Featured Services',
		'menu_title' => 'Featured Services',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Latest News', array(
		'page_title' => 'Latest News',
		'menu_title' => 'Latest News',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Current Projects', array(
		'page_title' => 'Current Projects',
		'menu_title' => 'Current Projects',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Get Informed', array(
		'page_title' => 'Get Informed',
		'menu_title' => 'Get Informed',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Notification / Information', array(
		'page_title' => 'Notification / Information',
		'menu_title' => 'Notification / Information',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Upcoming Events and Announcements', array(
		'page_title' => 'Upcoming Events and Announcements',
		'menu_title' => 'Upcoming Events and Announcements',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Departments Contact List', array(
		'page_title' => 'Departments Contact List',
		'menu_title' => 'Departments Contact List',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));
}

require get_template_directory() . '/inc/custom-walker-nav-menu.php';
require get_template_directory() . '/inc/park-filter.php';

add_action( 'init', 'gp_register_taxonomy_for_object_type' );
function gp_register_taxonomy_for_object_type() {
    register_taxonomy_for_object_type( 'post_tag', 'portfolio' );
};




add_filter( 'use_block_editor_for_post', '__return_false' ); 
add_theme_support('post-thumbnails');
add_post_type_support( 'parks-and-recreation', 'thumbnail' );

function add_acf_columns ( $columns ) {
	return array_merge ( $columns, array ( 
	  'date_of_event' => __ ( 'Date of Event' ),
	) );
  }
  add_filter ( 'manage_events-announcements_posts_columns', 'add_acf_columns' );

/*
 * Add columns to exhibition post list
 */
 function events_announcements_custom_column ( $column, $post_id ) {
	switch ( $column ) {
	  case 'date_of_event':

		if(get_post_meta ( $post_id, 'date_of_event', true )) {
			$new_date = date('F j Y', strtotime(get_post_meta ( $post_id, 'date_of_event', true )));
			echo $new_date;
		} else {
			echo '-';
		}
		break;
	}
  }
  add_action ( 'manage_events-announcements_posts_custom_column', 'events_announcements_custom_column', 10, 2 );

/**
* make column sortable
*/
function events_announcements_column_register_sortable($columns){
	$columns['date_of_event'] = 'date_of_event';
	return $columns;
  }
  
add_filter('manage_edit-events-announcements_sortable_columns','events_announcements_column_register_sortable');

function events_announcements_columns_orderby( $query ) {

    if( ! is_admin() )
        return;

    $orderby = $query->get( 'orderby');

    switch( $orderby ){
        case 'date_of_event': 
            $query->set('meta_key','date_of_event');
            $query->set('orderby','meta_value');
            break;
        default: break;
    }

}

add_action( 'pre_get_posts', 'events_announcements_columns_orderby' );


add_action('wp_ajax_data_fetch', 'data_fetch');
add_action('wp_ajax_nopriv_data_fetch', 'data_fetch');

function data_fetch() {
    $the_query = new WP_Query( 
        array( 
            'posts_per_page' => -1,
            's' => esc_attr( $_POST['keyword']),
			'orderby'=>'post_type',
			'order'=>'asc',
        )
    );
 ?>
	
	<?php $post_types_array = [] ?>

   <?php if( $the_query->have_posts() ) : ?>

		<?php $post_types = get_post_types(); ?>


		<?php while($the_query->have_posts() ) : $the_query->the_post(); ?>
			<?php foreach($post_types as $post_type) : ?>
				<?php array_push($post_types_array, $post_type); ?>

			<?php endforeach; ?>
        <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>


    <?php else : ?>
        <?php echo '<h3>No Results Found</h3>'; ?>
    <?php endif; ?>

    <?php // die(); ?>


	<?php foreach(array_unique($post_types_array) as $post_type) : ?>
		<?php  if($post_type !== 'attachment' && $post_type !== 'revision' && $post_type !== 'nav_menu_item' && $post_type !== 'custom_css' && $post_type !== 'customize_changeset' &&
     $post_type !== 'oembed_cache' && $post_type !== 'user_request' && $post_type !== 'wp_block' && $post_type !== 'wp_template' &&
     $post_type !== 'wp_template_part' && $post_type !== 'wp_global_styles' && $post_type !== 'wp_navigation' && $post_type !== 'acf-field-group' && $post_type !== 'acf-field-group' && $post_type !== 'acf-field')  : ?>
		
			<?php 
				$the_query_filtered = new WP_Query( 
					array( 
						'posts_per_page' => -1,
						's' => esc_attr( $_POST['keyword']),
						'post_type' => array($post_type, $_POST['keyword']),
					)
				);
			
			?>

			<?php $type_title = []; ?>
			<div class="search-post-row row">


				<?php while($the_query_filtered->have_posts() ) : $the_query_filtered->the_post(); ?>
					<?php if(get_the_title()) : ?>
						<?php array_push($type_title, $post_type); ?>
					<?php endif; ?>

				<?php endwhile; ?>

				<?php if(str_replace('-', ' ', $type_title[0] ) == 'events announcements' ) : ?>
					<?php if($type_title[0]) : ?><h1 class="title-text _25"><?php echo 'Events and Announcements' ; ?></h1><?php endif ?>
				<?php else :  ?>

					<?php 
						$smallwordsarray = array(
							'of','a','the','and','an','or','nor','but','is','if','then','else','when',
							'at','from','by','on','off','for','in','out','over','to','into','with'
						);	

						$remove_hyphen_word = str_replace('-', ' ', $type_title[0]);

						$words = explode(' ', $remove_hyphen_word);

						foreach ($words as $key => $word) {
							if (!$key or !in_array($word, $smallwordsarray))
							$words[$key] = ucwords($word);
						}

						$newtitle = implode(' ', $words);
					?>
	
					<h1 class="title-text _25"><?php echo $newtitle; ?></h1>
					
				<?php endif; ?>

				<?php while($the_query_filtered->have_posts() ) : $the_query_filtered->the_post(); ?>

					<div class="col-md-4 search-post-column">


						<div class="search-post-wrapper">
							<a href="<?php the_permalink(); ?>">
								<h2 class="search-card-title body-text _20"><?php  the_title() ?></h2>
								<section class="content-wrapper">
									<?php the_content(); ?>
								</section>
							</a>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php  die(); ?>

<?
}

// add the ajax fetch js
add_action('wp_footer', 'ajax_fetch');
function ajax_fetch() {
?>

<script type="text/javascript">
    function fetchResults() {
        let keyword = $('#searchInput').val();

		$('.searchform').submit(function() {
			return false;
		});

        if(keyword == '') {
            $('#datafetch').html('');

        } else {

            $.ajax({
                url: '<?php echo admin_url('admin-ajax.php'); ?>',
                type: 'post',
                data: {
                    action: 'data_fetch', 
                    keyword: keyword 
                },
                success: function(data) {
                    $('#datafetch').html(data);
                }
            });
        }
    }	

</script>

<?php

}

function filter_meetings() {

	$ajaxposts = new WP_Query(array(
		'post_type' => 'meetings',
		'posts_per_page' => -1,
		'order' => 'desc',
		'tax_query' => array(
			array(
				'taxonomy' => 'meeting_types',
				'field' => 'slug',
				'terms' => $_POST['term']
			)
		)
	));

	$response = '';

	if($ajaxposts->have_posts()) {
		$response .= '<div class="container-fluid  site-component-container">';
		$response .= '<div class="row site-component-row">';
		$response .= '<div class="accordion accordion-flush col-md-10 col-12 a1" id="accordionFlushA2">';

		$post_index = 0;
		while($ajaxposts->have_posts()) : $ajaxposts->the_post(); $post_index++;
		
			$question = get_the_title();
			$answer = get_the_content();


			$response .= "
				<div class='accordion-item'>
					<h3 class='accordion-header' id='flush-heading-$post_index'>
	
						<button class='accordion-button collapsed title-text _21' type='button' data-bs-toggle='collapse' data-bs-target='#flush-collapse-$post_index' aria-expanded='false' aria-controls='flush-collapse-$post_index'>
							$question
						</button>
					</h3>
					
					<div id='flush-collapse-$post_index' class='accordion-collapse collapse' aria-labelledby='flush-heading-$post_index' data-bs-parent='#accordionFlushA2'>
						<div class='accordion-body body-text _17'>$answer</div>
					</div>
				</div>
			";
			
		endwhile;
		wp_reset_query();
		$response .= '</div>';
		$response .= '</div>';
		$response .= '</div>';
	} else {
		$response = 'empty';
	}

	echo $response;
	
	exit;
}
add_action('wp_ajax_filter_meetings', 'filter_meetings');
add_action('wp_ajax_nopriv_filter_meetings', 'filter_meetings');


