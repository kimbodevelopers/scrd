<?php if( get_row_layout() == 'b3_table_items' ): ?>

    <?php while(have_rows('table_group')) : the_row(); 
        $title = get_sub_field('title');
        $subtitle = get_sub_field('subtitle');
        $sub_text = get_sub_field('sub_text');
    ?>

        <div class="container-fluid site-component-container b3-table-container">
            <div class="row site-component-row b3-table-row">

                <div class="col-12">
                    <?php if($title) : ?>
                        <h3 class="title-text _33 table-title"><?php echo $title ?></h3>
                    <?php endif; ?>

                    <?php if($subtitle) : ?>
                        <h4 class="title-text _25 table-subtitle"><?php echo $subtitle ?></h4>
                    <?php endif; ?>
                </div>

                <div class="col-12 b3-table-column">

                    <?php 

                        $table = get_sub_field( 'table' );

                        if ( ! empty ( $table ) ) {
                            echo '<table border="0">';
                                if ( ! empty( $table['caption'] ) ) {
                                    echo '<caption>' . $table['caption'] . '</caption>';
                                }
                                if ( ! empty( $table['header'] ) ) {
                                    echo '<thead>';
                                        echo '<tr>';
                                            foreach ( $table['header'] as $th ) {
                                                echo '<th>';
                                                    echo $th['c'];
                                                echo '</th>';
                                            }
                                        echo '</tr>';
                                    echo '</thead>';
                                }

                                echo '<tbody>';
                                    foreach ( $table['body'] as $tr ) {
                                        echo '<tr>';
                                            foreach ( $tr as $td ) {
                                                echo '<td>';
                                                    echo $td['c'];
                                                echo '</td>';
                                            }
                                        echo '</tr>';
                                    }
                                echo '</tbody>';
                            echo '</table>';
                        }

                    ?>

                </div>

                <div class="col-12 mt-4 pl-3">
                    <div class="body-text _17">
                        <?php echo $sub_text ?>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

<?php endif; ?>