<!DOCTYPE html>
<html lang="ru">
  <head>
    <title><?php wp_title('', true,''); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/libs.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css">
    <?php #wp_head(); ?>
  </head>
  <body>
    <div class="wrapper">
      <header class="main-header">
        <div class="top-header">
          <div class="top-header__wrap">
            <div class="logotype-block">
              <div class="logo-wrap"><a href="/"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="Логотип" class="logo-wrap__logo-img"></a></div>
            </div>
            <?php wp_nav_menu() ?>
          </div>
        </div>
        <div class="bottom-header">
          <div class="search-form-wrap">
            <form role="search" method="get" id="searchform" class="searchform search-form" action="<?php echo home_url(); ?>">
              <input type="hidden" name="category_name" value="sales">
              <input type="text" name="s" id="s" placeholder="Поиск по акциям..." class="search-form__input" value="<?php echo $_GET['s']??'' ?>">
              <button class="search-form__btn-search" id="searchsubmit" type="submit"><i class="icon icon-search"></i></button>
            </form>
          </div>
        </div>
      </header>
      <!-- header_end-->
      <div class="main-content">
        <div class="content-wrapper">
          <div class="content">