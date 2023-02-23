<?php if( get_row_layout() == 'p3_map' ): ?>

<?php if(get_row('p3_map')) : ?>
    <div class="container-fluid site-component-container picture-container">
        <div class="row site-component-row">
            <div class="col-12">
                <?php echo get_row('p3_map')['map'] ?>
				
            </div>
        </div>
    </div>
<?php endif; ?>

<?php endif; ?>