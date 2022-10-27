<?php if( get_row_layout() == 'b1_table_items' ): 
    ?>

    <div class="container-fluid site-component-container b1-table-container">
        <div class="row site-component-row b1-table-row">

        <?php while(have_rows('b1_table')) : the_row(); 
            $label = get_sub_field('label');
            $file = get_sub_field('file');
            $link = get_sub_field('link');
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

            </div>
        <?php endwhile; ?>

        </div>
    </div>

<?php endif; ?>