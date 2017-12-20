<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1, minimum-scale=1" />
<title><?php apt_simple_title(); ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.ico" />
<link rel="apple-touch-icon-precomposed" href="<?php bloginfo('template_url'); ?>/images/apple-touch-icon.png" />
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="wrap">
  <div id="header" role="banner">
    <div class="inner clearfix">
      <<?php apt_site_id(); ?> class="site-id">
        <a href="<?php echo home_url('/'); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/site_id.png" width="205" height="30" alt="<?php bloginfo('description'); ?><?php bloginfo('name'); ?>" /></a>
      </<?php apt_site_id(); ?>>
      <div id="global_nav" role="navigation">
        <ul>
          <li class="gnav"><a id="sp_menu" href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gnav.png" width="50" height="30" alt="MENU" /></a></li>
        </ul>
      </div><!-- #global_nav end -->
    </div><!-- .inner end -->
  </div><!-- #header end -->
