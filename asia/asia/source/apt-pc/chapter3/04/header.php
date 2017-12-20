<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<title><?php bloginfo('name'); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
  <div id="header" role="banner">
    <div class="inner clearfix">
      <h1 class="site-id">
        <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/site_id.png" width="322" height="42" alt="<?php bloginfo('description'); ?><?php bloginfo('name'); ?>" /></a>
      </h1>
      <div class="utility">
        <ul>
          <li><a href="#">採用情報</a></li>
        </ul>
        <div id="search" role="search">
          <form role="search" method="get" id="searchform" class="searchform" action="#">
            <div>
              <input type="text" value="" name="s" id="s" />
              <input type="submit" id="searchsubmit" value="検索" />
            </div>
          </form>          
        </div><!-- #search end -->
      </div><!-- .utility end -->
    </div><!-- .inner end -->
    <div id="global_nav">
      <ul>
        <li class="current-menu-item menu-item-slug-top"><a href="#">トップページ</a></li>
      </ul>
    </div>
  </div><!-- #header end -->
<?php
  if (!is_front_page()) :
?>
  <div class="category_image">
    <img src="<?php bloginfo('template_url'); ?>/images/sub/img_cat_def.png" width="950" height="120" alt="">
  </div><!-- .category_image end -->
<?php
  endif;
?>

