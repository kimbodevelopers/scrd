<?php if( get_row_layout() == 'b1_table_items' ): 
    ?>

    <div class="container-fluid site-component-container b1-table-container">
        <div class="row site-component-row b1-table-row">

        <?php while(have_rows('b1_table')) : the_row(); 
            $label = get_sub_field('label');
            $file = get_sub_field('file');
        ?>
            <div class="col-12 b1-table-column">
                <a href="#" onclick='window.open("<?php echo $file; ?>"); return false;'>
                    <span class="title-text _21"><?php echo $label ?></span>
                    <span><i class="fa-solid fa-file-pdf"></i></span>
                </a>
            </div>
        <?php endwhile; ?>

        </div>
    </div>

<?php endif; ?>