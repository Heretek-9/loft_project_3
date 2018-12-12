<?php get_header(); ?>
<h1 class="title-page"><?php the_title() ?></h1>
<div class="posts-list">
  <?php 
    while ( have_posts() ) : the_post(); 
      the_content();
    endwhile; 
  ?>
</div>
<?php get_footer(); ?>