<div class="container-fluid site-component-container breadcrumb-container">
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