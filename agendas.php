<?php defined('ABSPATH') or die(""); 

$agenda_years = new WP_Query(array(
    'post_type' => 'agendas',
    'posts_per_page' => -1,
    'post__status' => 'published',
    'order' => 'desc',
    'orderby' => 'title',

));

$wp_query_years = $agenda_years;
$post_years = [];

foreach($agenda_years->posts as $agenda_post) {
    array_push($post_years, intval($agenda_post->post_title));
}

header("Location: ". get_site_url() . "/" . "agendas" . "/" . max($post_years) . "/");

die();
?>


<?php get_header(); 
/* Template Name: Agendas */

global $post;

?>


<?php get_footer(); ?>