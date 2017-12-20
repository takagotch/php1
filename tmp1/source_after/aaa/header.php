<!DOCTYPE html>
<html language_attributes(); ?>
<head>
  <meta charset="<?php bloginfo('charset' ); ?>">
  <title>Maverick Coffee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="apple-touch-icon" href="./img/touch-icon.png" />
  <link rel="shortcut icon" href="./favicon.ico" />
  <link rel="stylesheet" href="./css/bootstrap-custom.css"/>
  <link rel="stylesheet" href="./css/app.css"/>

  <?php wp_head(); ?>
  <!--[if lt IE 9]>
  <meta http-equiv="Imagetoolbar" content="no" />
  <script src="<?php echo esc_url(get_template_directory_uri() ); ?>/js/html5shiv.min.js"></script>
  <script src="<?php echo esc_url(get_template_directory_uri() ); ?>/js/respond.min.js"></script>
  <![endif]-->

</head>
<body <?php body_class(); ?>>
<div id="wrapper">

  <header id="header" class="header">

    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-sm-3 col-md-3">
          <h1 class="header-logo text-hide"><a href="<?php echo esc_url(home_url() ); ?>"><?php bloginfo( 'name' )?></a></h1>
        </div>
        <div class="col-xs-12 col-sm-9 col-md-9 xs-no-gutter">
          <nav class="global-nav" role="navigation">
            <button type="button" class="global-nav__toggle text-left visible-xs-block" data-toggle="collapse" data-target="#globalnav-collapse">
              <span class="sr-only">メニューを開閉</span>
              <span class="glyphicon glyphicon-menu-hamburger"></span>MENU
            </button>
            <div class="collapse" id="globalnav-collapse">
              <ul class="global-nav__list clearfix">

                <li><a href="<?php echo esc_url(home_url() ); ?>"><span class="icon icon-home"></span>HOME</a></li>
                <li><a href="<?php echo esc_url(home_url( '/news' ) ); ?>"><span class="icon icon-news"></span>NEWS</a></li>
                <li><a href="<?php echo esc_url(home_url( '/menu' ) ); ?>"><span class="icon icon-menu"></span>MENU</a></li>
                <li><a href="<?php echo esc_url(home_url( '/access' ) ); ?>"><span class="icon icon-access"></span>ACCESS</a></li>
                <li><a href="<?php echo esc_url(home_url( '/gallery' ) ); ?>"><span class="icon icon-gallery"></span>GALLERY</a></li>
                <li><a href="<?php echo esc_url(home_url( '/blog' ) ); ?>"><span class="icon icon-blog"></span>BLOG</a></li>

              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>

    <div class="mainvisual ">
      <div class="container page-title">

        <h2 class="font-serif text-right"><img src="<?php echo esc_url(get_template_directory_uri() ); ?>/img/img-home-mainvisual-effect.png" alt="HOME VISUAL" /></h2>

      </div>
    </div>

  </header>