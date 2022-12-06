<?php if( get_row_layout() == 'b1_table_items' ): 
    ?>

    <div class="container-fluid site-component-container b1-table-container">
        <div class="row site-component-row b1-table-row">

        <?php while(have_rows('b1_table')) : the_row(); 
            $label = get_sub_field('label');
            $file = get_sub_field('file');
            $link = get_sub_field('link');
            $image = get_sub_field('image');
        ?>
            <div class="col-12 b1-table-column">

                <?php if($file) : ?>
                    <a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
                        <span class="title-text _21"><?php echo $label ?></span>
                        <span><i class="fa-solid fa-file-pdf"></i></span>
                    </a>
                <?php endif; ?>

                <?php if($link) : ?>
                    <a href="<?php echo $link ?>" target="__blank">
                        <span class="title-text _21"><?php echo $label ?></span>
                        <span><i class="fa-solid fa-arrow-up-right-from-square"></i></span>
                    </a>
                <?php endif; ?>

                <?php if($image) : ?>

                    <button type="button" class="btn image-row-wrapper" data-bs-toggle="modal" data-bs-target="#imageModal-<?php echo $image['name'] ?>">
                        <span class="title-text _21"><?php echo $label ?></span>
                        <span><i class="fa-regular fa-image"></i></span>                    
                    </button>

                    <div class="modal fade" id="imageModal-<?php echo $image['name'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
        
                <?php endif; ?>

            </div>
        <?php endwhile; ?>

        </div>
    </div>

<?php endif; ?>