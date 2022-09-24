<?php
/*
Template Name: Search Page
*/
?>

<?php get_header(); ?>


<form action="<?php echo home_url(); ?>" id="search-form" method="get">
    <input type="text" name="s" id="s" value="type your search" onblur="if(this.value=='')this.value='type your search'"
    onfocus="if(this.value=='type your search')this.value=''" />
    <input type="hidden" value="submit" />
</form>

<div class="wrapper">
      <div class="contentarea clearfix">
        <div class="content">
            <ul>
                <?php if ( have_posts() ) : ?>

                    <header class="page-header">
                        <p><?php printf( __( 'Search Results for: %s' ), get_search_query() ); ?></p>
                    </header><!-- .page-header -->

                        <?php
                        // Start the Loop.
                        while ( have_posts() ) : the_post();
                        ?>
                        <li><h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3></li>
                        
                        <?php the_post_thumbnail('medium') ?>
                        <?php echo substr(get_the_excerpt(), 0, 200); ?>
           
                        <?php
                        endwhile;
                // If no content, include the "No posts found" template.
                get_template_part( 'content', 'none' );
                endif;
                ?>       
            </ul>                                 

        </div>
      </div>
    </div>

<?php get_footer(); ?>