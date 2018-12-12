<?php get_header(); ?>
<h1 class="title-page">Последние новости и акции из мира туризма</h1>
<div class="posts-list">
  <?php 
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = array('post_type' => 'post', 'posts_per_page' => 5, 'paged' => $paged);
    $query = new WP_Query($args);
    while($query->have_posts() ):$query->the_post(); 
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
    wp_reset_postdata();
    endwhile; 
  ?>
</div>
<div class="pagenavi-post-wrap">
  <?php previous_posts_link( '<i class="icon icon-angle-double-left"></i> Новые записи '); ?>
  <?php next_posts_link(' Старые записи <i class="icon icon-angle-double-right"></i>', $query->max_num_pages); ?>
</div>
<?php get_footer(); ?>