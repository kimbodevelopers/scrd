
<?php 
	$post_type = get_post_type(get_the_ID());   
	$taxonomies = get_object_taxonomies($post_type);   
	$taxonomy_names = wp_get_object_terms(get_the_ID(), $taxonomies,  array("fields" => "names")); 
?>

<?php if(!empty($taxonomy_names)) : ?>
<div class="container-fluid site-component-container pb-0">
	<div class="row site-component-row">
		<div class="col-12">
			<span class="title-text _21 dark-blue">Tags:&nbsp;</span>
			<?php foreach($taxonomy_names as $key=>$value) : ?>
			<span class="title-text _21 dark-blue"><?php if($key !== 0) : ?>|<?php endif; ?> <?php echo $value; ?></span>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<?php endif; ?> 