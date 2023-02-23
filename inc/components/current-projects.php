<div class="container-fluid large-cards-container site-component-container">
    <?php if(get_field('current_projects_title', 'option')) : ?>
	<div class="row site-component-row">
        <div class="col-12">
            <h2 class="title-text _33"><?php the_field('current_projects_title', 'option') ?></h2>
        </div>
    </div>
	<?php endif; ?>


    <?php 
        $current_projects = new WP_Query(array(
            'post_type' => 'projects',
            'posts_per_page' => 4,
            'post__status' => 'published',
			'orderby' => 'menu_order',
			'tax_query' => array(
				array(
					'taxonomy' => 'project_type',
					'field' => 'slug',
					'terms' => 'current',
				),
			)
        ));

        $wp_query = $current_projects;
    ?>

<?php $posts_array_count = count($current_projects->posts) ?>


    <div class="row site-component-row large-cards-row">
        <?php while($wp_query->have_posts()) : $wp_query->the_post(); ?>
            <?php get_template_part('inc/components/large-card') ?>
        <?php endwhile; ?>

    </div>


    <?php if(get_field('current_projects_link', 'option')) : ?>
        <div class="row site-component-row button-row">
            <div class="col-12 button-column">
				<?php $link = get_field('current_projects_link', 'option') ?>
                <a href="<?php echo $link['url'] ?>" class="site-button body-text _26" target="__blank"><?php the_field('current_projects_button_text', 'option') ?></a>
            </div>
        </div>
    <?php endif; ?>


</div>
