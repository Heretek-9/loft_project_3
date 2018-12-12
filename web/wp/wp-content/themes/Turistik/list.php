<?php get_header(); ?>
<h1 class="title-page"><?php wp_title('', true,''); ?></h1>
<div class="posts-list">
  <?php 
    while ( have_posts() ) : the_post(); ?>
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
    <?php endwhile; 
  ?>
</div>
<?php get_footer(); ?>