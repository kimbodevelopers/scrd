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
}

require get_template_directory() . '/inc/custom-walker-nav-menu.php';

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
			'order'=>'asc'
        )
    );
 ?>
	

   <?php if( $the_query->have_posts() ) : ?>

		<div class=""><pre><?php print_r(get_post_types()) ; ?></pre></div>

		<?php $post_types = get_post_types(); ?>

		<?php foreach($post_types as $post_type) : ?>
			<?php echo $post_type; ?>
		<?php endforeach; ?>


        <?php while($the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php if(get_post_type() !== 'page') : ?>
				<div class="col-md-4">
					<a href="<?php the_permalink(); ?>">
						<h2 class="search-card-title"><?php the_title() ?></h2>
						<p><?php echo get_post_type(); ?></p>
					</a>
				</div>
			<?php endif; ?>

        <?php endwhile; ?>

    <?php wp_reset_postdata(); ?>

    <?php else : ?>
        <?php echo '<h3>No Results Found</h3>'; ?>
    <?php endif; ?>

    <?php die(); 
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