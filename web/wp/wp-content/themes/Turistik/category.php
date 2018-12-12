<?php get_header(); ?>
<h1 class="title-page"><?php wp_title('', true,''); ?></h1>
<div class="posts-list">
  <?php 
    $currentCategory = get_queried_object();

    $subcategories = get_categories(array('child_of' => $currentCategory->term_id));

    if($subcategories) {
        foreach($subcategories as $subcategory) { ?>
          <div class="post-wrap">
            <div class="post-content">
              <div class="post-content__post-text">
                <div class="post-title"><?php echo $subcategory->name ?></div>
                <?php echo get_field('short_desc'); ?>
              </div>
              <a href="<?php echo get_category_link($subcategory->term_id) ?>">Перейти</a>
            </div>
          </div>
        <?php }
        echo '</div>';
    } else {
      if ($currentCategory->taxonomy == 'category') {
        global $wp_query;
        query_posts(
          array_merge(
           array('post_type' => 'post', 'posts_per_page' => 3, 'paged' => $paged, 'cat'=> $currentCategory->term_id),
            $wp_query->query
          )
        );
      }
      while(have_posts() ):the_post(); 
    ?>
    <!-- post-mini-->
    <div class="post-wrap">
      <?php 
      $image = get_field('image');
      if (!empty($image) && $image['sizes']['thumbnail']) { ?>
        <div class="post-thumbnail">
          <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="Image поста" class="post-thumbnail__image">
        </div>
      <?php } ?>
      
      <div class="post-content">
        <div class="post-content__post-info">
          <div class="post-date"><?php the_date() ?></div>
        </div>
        <div class="post-content__post-text">
          <div class="post-title"><?php the_title() ?></div>
          <?php echo get_field('short_desc'); ?>
        </div>
        <div class="post-content__post-control"><a href="<?php the_permalink() ?>" class="btn-read-post">Читать далее >></a></div>
      </div>
    </div>
    <!-- post-mini_end-->
    <?php 
      endwhile; 
  ?>
</div>
<div class="pagenavi-post-wrap">
  <?php previous_posts_link( '<i class="icon icon-angle-double-left"></i> Новые записи '); ?>
  <?php next_posts_link(' Старые записи <i class="icon icon-angle-double-right"></i>', $wp_query->max_num_pages); ?>
</div>
<?php } ?>
<?php get_footer(); ?>