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

	acf_add_options_sub_page('Featured Parks and Recreation', array(
		'page_title' => 'Featured Parks and Recreation',
		'menu_title' => 'Featured Parks and Recreation',
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


	acf_add_options_sub_page('Departments Contact List', array(
		'page_title' => 'Departments Contact List',
		'menu_title' => 'Departments Contact List',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Global Assets', array(
		'page_title' => 'Global Assets',
		'menu_title' => 'Global Assets',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));
	
	acf_add_options_sub_page('Wastewater Global', array(
		'page_title' => 'Wastewater Global',
		'menu_title' => 'Wastewater Global',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));
	
	acf_add_options_sub_page('Breadcrumb Link Remove', array(
		'page_title' => 'Breadcrumb Link Remove',
		'menu_title' => 'Breadcrumb Link Remove',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

	acf_add_options_sub_page('Parks', array(
		'page_title' => 'Parks',
		'menu_title' => 'Parks',
		'capability' => 'edit_posts',
		'parent_slug' => 'theme-option',
		'position' => 'false',
		'icon_urol' => 'false',
	));

}

require get_template_directory() . '/inc/custom-walker-nav-menu.php';

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

// 


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

$role_object = get_role( 'editor' );
$role_object->add_cap( 'edit_theme_options' );


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

// News Admin Column

function columns_news( $columns ) {
	return array_merge ( $columns, array ( 
	  'date_released' => __ ( 'Date Released' ),
	) );
}
add_filter('manage_news_posts_columns', 'columns_news');

 function news_custom_column ( $column, $post_id ) {
	switch ( $column ) {
	  case 'date_released':

		if(get_post_meta ( $post_id, 'date_released', true )) {
			$new_date = date('F j Y', strtotime(get_post_meta ( $post_id, 'date_released', true )));
			echo $new_date;
		} else {
			echo '-';
		}
		break;
	}
  }
  add_action ( 'manage_news_posts_custom_column', 'news_custom_column', 10, 2 );


// 

function news_column_register_sortable($columns){
	$columns['date_released'] = 'date_released';
	return $columns;
  }
  
add_filter('manage_edit-news_sortable_columns','news_column_register_sortable');

function news_columns_orderby( $query ) {

    if( ! is_admin() )
        return;

    $orderby = $query->get( 'orderby');

    switch( $orderby ){
        case 'date_of_event': 
            $query->set('meta_key','date_released');
            $query->set('orderby','meta_value');
            break;
        default: break;
    }

}

add_action( 'pre_get_posts', 'news_columns_orderby' );


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
        <?php echo '<div class="col-12"><h3>No Results Found</h3></div>'; ?>
    <?php endif; ?>

    <?php // die(); ?>




	<?php foreach(array_unique($post_types_array) as $post_type) : ?>
		<?php  if(
				$post_type !== 'attachment' 
				&& $post_type !== 'revision' 
				&& $post_type !== 'nav_menu_item' 
				&& $post_type !== 'custom_css' 
				&& $post_type !== 'customize_changeset' 
				&& $post_type !== 'oembed_cache' 
				&& $post_type !== 'user_request' 
				&& $post_type !== 'wp_block' 
				&& $post_type !== 'wp_template' 
				&& $post_type !== 'wp_template_part' 
				&& $post_type !== 'wp_global_styles' 
				&& $post_type !== 'wp_navigation' 
				&& $post_type !== 'acf-field-group' 
				&& $post_type !== 'acf-field-group' 
				&& $post_type !== "wpcf7_contact_form"
				&& $post_type !== "post"
				&& $post_type !== 'acf-field'
				)  : ?>
		
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
					<?php if($type_title[0]) : ?><h3 class="body-text _17 mt-4 mb-2"><span><?php echo 'Events and Announcements' ; ?></span></h3><?php endif ?>
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
	
					<?php if($newtitle) : ?>
						<h3 class="body-text _17 mt-4 mb-2"><span><?php echo $newtitle; ?></span></h3>
						<?php endif; ?>
					<?php endif; ?>

				<?php while($the_query_filtered->have_posts() ) : $the_query_filtered->the_post(); ?>

					<div class="col-6 search-post-column">

						<div class="search-post-wrapper">
							
							<p class="search-card-title body-text _17"><a href="<?php the_permalink(); ?>"><?php  the_title() ?></a></p>
							<!-- <section class="content-wrapper">
								<?php // the_content(); ?>
							</section> -->
						
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
                    keyword: keyword ,
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


// function that runs when shortcode is called
function wpb_button_shortcode($atts = []) { 

	$wporg_atts = shortcode_atts(
		array(
			'title' => '',
			'link' => '',
		), $atts
	);
  
	// Things that you want to do.
	$message = '<div class="row site-component-row button-row mt-4">
		<div class="col-12 button-column p-0">
			<a class="site-button body-text _26 ml-0" href="'. esc_html__( $wporg_atts['link'], 'wysiwyg_button' ) . ' ">
			' . esc_html__( $wporg_atts['title'], 'wysiwyg_button' ) .
			'</a>
		</div>'; 

	return $message;
}

function wporg_shortcodes_init() {
	add_shortcode('wysiwyg_button', 'wpb_button_shortcode');
}

add_action( 'init', 'wporg_shortcodes_init' );

function wastewater_shortcode() { 
  
	// Things that you want to do.
	$template = get_template_part('inc/components/global-component/wastewater-qa'); 

	return $template;
}

function wastewater_shortcodes_init() {
	add_shortcode('wastewater_qa', 'wastewater_shortcode');
}

add_action( 'init', 'wastewater_shortcodes_init' );

add_filter( 'facetwp_indexer_query_args', function( $args ) {
    $args['post_status'] = [ 'publish', 'inherit' ];
    return $args;
});

add_filter( 'facetwp_indexer_query_args', function( $args ) {
    $args['post_type'] = (array) get_post_types();
    $args['post_type'][] = 'wprm_recipe';
    return $args;
});


add_filter( 'facetwp_facet_sources', function( $sources ) {
    $sources['posts']['choices']['post_mime_type'] = 'application/pdf';
    return $sources;
});


add_action('admin_head', 'remove_content_section'); // admin_head is a hook my_custom_fonts is a function we are adding it to the hook

function remove_content_section() {
  echo '<style>
    #postdivrich{
        display: none;   
    }
	
	.post-type-parks #postdivrich {
		display: initial;
	}
  </style>';
}


add_filter( 'wpseo_breadcrumb_links', 'yoast_seo_breadcrumb_append_link' );

function yoast_seo_breadcrumb_append_link( $links ) {
    global $post;

    if ( is_singular ( 'parks' ) ) {
        $breadcrumb[] = array(
            'url' => site_url( '/parks/' ),
            'text' => 'Parks',
        );

        array_splice( $links, 1, -2, $breadcrumb );
    }

    return $links;
}

add_filter( 'wpseo_breadcrumb_single_link' ,'wpseo_just_remove_breadcrumb_link', 10 ,2);
function wpseo_just_remove_breadcrumb_link( $link_output , $link ){
    //In case you want to remove multiple links put those texts here in this array.

    $text_to_remove = []; 

	while(have_rows('remove_breadcrumb_links', 'option')) : the_row(); 
		$remove_link = get_sub_field('remove_link');
		array_push($text_to_remove, $remove_link);
	endwhile;
    
    if(in_array($link['url'] , $text_to_remove )) {
        $link_output = str_replace('href="'.$link['url'].'"' , "" , $link_output);
		
        return str_replace('data-wpel-link="internal"' , "" , $link_output);
    }
	
	
    return $link_output;
}

add_action( 'template_redirect', 'my_callback' );
function my_callback() {
  if ( is_page_template('events.php') ) {
    wp_redirect( "http://scrd.kimboagency.com/calendar/" );
    exit();
  }
}