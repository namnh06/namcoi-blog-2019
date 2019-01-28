<div class="Pagination">

  <?php the_posts_pagination(
        array(
            'type' => 'list',
            'mid_size' => 2,
            'prev_text' => __('&#9666;'),
            'next_text' => __('&#9656;'),
        )
    );
    ?>
</div>