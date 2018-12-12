<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="article-title title-page">
    <?php the_title() ?>
  </div>
  <?php 
    $image = get_field('image');
    if (!empty($image) && $image['sizes']['large']) { ?>
      <div class="article-image">
        <img src="<?php echo $image['sizes']['large'] ?>" alt="Image поста">
      </div>
    <?php } ?>
  <div class="article-info">
    <div class="post-date"><?php the_date() ?></div>
  </div>
  <div class="article-text">
    <?php the_content() ?>
  </div>
  <div class="article-pagination">
  <?php
  $previous_post = get_previous_post();
  if ($previous_post) { ?>
    <div class="article-pagination__block pagination-prev-left"><a href="<?php echo get_permalink($previous_post->ID) ?>" class="article-pagination__link"><i class="icon icon-angle-double-left"></i>Предыдущая статья</a>
      <div class="wrap-pagination-preview pagination-prev-left">
        <?php 
        $image = get_field('image', $previous_post->ID);
        if (!empty($image) && $image['sizes']['thumbnail']) { ?>
          <div class="preview-article__img"><img src="<?php echo $image['sizes']['thumbnail'] ?>" class="preview-article__image"></div>
        <?php } ?>
        <div class="preview-article__content">
          <div class="preview-article__info"><a href="<?php echo get_permalink($previous_post->ID) ?>" class="post-date"><?php echo $previous_post->post_date ?></a></div>
          <div class="preview-article__text"><b><?php echo $previous_post->post_title ?></b>
            <?php 
            $short_desc = get_field('short_desc', $previous_post->ID);
            if ($short_desc){
              echo '<br>'.$short_desc;
            } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php
  $next_post = get_next_post();
  if ($next_post) { ?>
    <div class="article-pagination__block pagination-prev-right"><a href="<?php echo get_permalink($next_post->ID) ?>" class="article-pagination__link">Сдедующая статья<i class="icon icon-angle-double-right"></i></a>
      <div class="wrap-pagination-preview pagination-prev-right">
        <?php 
        $image = get_field('image', $next_post->ID);
        if (!empty($image) && $image['sizes']['thumbnail']) { ?>
          <div class="preview-article__img"><img src="<?php echo $image['sizes']['thumbnail'] ?>" class="preview-article__image"></div>
        <?php } ?>
        <div class="preview-article__content">
          <div class="preview-article__info"><a href="<?php echo get_permalink($next_post->ID) ?>" class="post-date"><?php echo $next_post->post_date ?></a></div>
          <div class="preview-article__text"><b><?php echo $next_post->post_title ?></b>
            <?php 
            $short_desc = get_field('short_desc', $next_post->ID);
            if ($short_desc){
              echo '<br>'.$short_desc;
            } ?>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
  </div>
<?php endwhile; endif; ?>
<?php get_footer(); ?>