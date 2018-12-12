<!-- sidebar-->
<div class="sidebar">
  <div class="sidebar__sidebar-item">
    <div class="sidebar-item__title">Теги</div>
    <div class="sidebar-item__content">
      <ul class="tags-list">
        <?php
        $tags = get_tags();
        foreach ( $tags as $tag ) {
          $tag_link = get_tag_link( $tag->term_id ); ?>
          <li class="tags-list__item"><a href="<?php echo $tag_link ?>" class="tags-list__item__link"><?php echo $tag->name ?></a></li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="sidebar__sidebar-item">
    <div class="sidebar-item__title">Акции</div>
    <div class="sidebar-item__content">
      <ul class="category-list">
        
        <?php 
        $newsCat = get_category_by_slug('sales');
        $categories = get_categories(array('child_of' => $newsCat->term_id, 'number' => 5));
        foreach($categories as $category) { ?>
          <li class="category-list__item">
            <a href="<?php echo get_category_link($category->term_id) ?>" class="category-list__item__link"><?php echo $category->name ?></a>
            
            <?php 
              $query = new WP_Query(array('cat'=> $category->term_id, 'posts_per_page'=>5 ) );
              if ($query->have_posts()) : ?>
                <ul class="category-list__inner">
                  <?php while($query->have_posts() ):$query->the_post(); ?>
                    <li class="category-list__item"><a href="<?php the_permalink(); ?>" class="category-list__item__link"><?php the_title(); ?></a></li>
                  <?php endwhile; ?>
                </ul>
                <?php endif;
            ?>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>
  <div class="sidebar__sidebar-item">
    <?php get_calendar(); ?>
  </div>
</div>