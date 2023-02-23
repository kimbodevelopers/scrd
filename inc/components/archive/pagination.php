<div class="row pagination-row site-component-row mt-5 mb-5">
    <div class="col-12 text-center">
        <div class="pagination-wrapper">
            <?php echo paginate_links(array(
                'next_text' => '<span class="paginate-icon next-icon"><i class="fa-solid fa-chevron-right"></i></span>',
                'prev_text' => '<span class="paginate-icon prev-icon"><i class="fa-solid fa-chevron-left"></i></span>'
            )); ?>
        </div>
    </div>
</div>