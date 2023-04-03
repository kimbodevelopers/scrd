<?php if(get_field('file_related_post_option') === 'file') : ?>
	<div class="container-fluid site-component-container b1-table-container">
		<div class="row site-component-row b1-table-row">

			<div class="col-12 b1-table-column">

		
				<a href="#" onclick='window.open("<?php echo get_field('bylaw_file')['url']; ?>"); return false;'>
					<span class="title-text _21"><?php echo get_field('bylaw_file')['title'] ?></span>
					<span class="icon-wrapper file"><i class="fa-solid fa-file-pdf"></i></span>
				</a>
		

			</div>
		</div>
	</div>
<?php endif; ?>