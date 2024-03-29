<?php if( get_row_layout() == 'f1_form' ): ?>

            <?php $form_description = get_sub_field('form_description'); ?>
            <?php $form_shortcode = get_sub_field('form_shortcode'); ?>
			<?php $reposition_form = get_sub_field('reposition_form'); ?>

    <div class="container-fluid site-component-container f1-form-container">
        <div class="row site-component-row f1-form-row <?php if($reposition_form === 'top_down') : ?>flex-column<?php endif; ?>">

            <?php if($form_description) : ?>
                <div class="<?php if($reposition_form === "top_down") : ?>col-md-8 <?php else : ?>col-md-6<?php endif; ?> form-description-column">
                    <div class="form-description-wrapper">
                        <?php echo $form_description ?>
                    </div>
                </div>
            <? endif; ?>

            <?php if($form_description) : ?>
                <?php $form_column_width = 'col-md-6'; ?>
            <?php else : ?>
                <?php $form_column_width = 'col-md-8'; ?>
            <?php endif; ?>

            <div class="<?php echo $form_column_width ?> form-column">
                <?php echo $form_shortcode ?>
            </div>


            
        </div>
    </div>

<?php endif; ?>


