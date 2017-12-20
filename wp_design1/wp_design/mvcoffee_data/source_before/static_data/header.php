<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php wp_head(); ?>

  <!--[if lt IE 9]>
  <meta http-equiv="Imagetoolbar" content="no" />
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5shiv.min.js"></script>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/respond.min.js"></script>
  <![endif]-->

</head>
<body <?php body_class(); ?>>
  <div id="wrapper">

    <header id="header" class="header">

      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-sm-3 col-md-3">
            <h1 class="header-logo text-hide"><a href="<?php echo esc_url( home_url() ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
          </div>
          <div class="col-xs-12 col-sm-9 col-md-9 xs-no-gutter">
            <nav class="global-nav" role="navigation">
              <button type="button" class="global-nav__toggle text-left visible-xs-block" data-toggle="collapse" data-target="#globalnav-collapse">
                <span class="sr-only">メニューを開閉</span>
                <span class="glyphicon glyphicon-menu-hamburger"></span>MENU
              </button>
              <div class="collapse" id="globalnav-collapse">
                <ul class="global-nav__list clearfix">
                  <li><a href="<?php echo esc_url( home_url() ); ?>"><span class="icon icon-home"></span>HOME</a></li>
                  <?php if( term_exists( 'news', 'category' ) ): ?>
                  <li><a href="<?php echo esc_url( get_term_link( 'news', 'category' ) ); ?>"><span class="icon icon-news"></span>NEWS</a></li>
                  <?php endif; ?>
                  <li><a href="<?php echo esc_url( home_url('/menu') ); ?>"><span class="icon icon-menu"></span>MENU</a></li>
                  <li><a href="<?php echo esc_url( home_url('/access') ); ?>"><span class="icon icon-access"></span>ACCESS</a></li>
                  <li><a href="<?php echo esc_url( home_url('/gallery') ); ?>"><span class="icon icon-gallery"></span>GALLERY</a></li>
                  <?php if( term_exists( 'blog', 'category' ) ): ?>
                  <li><a href="<?php echo esc_url( get_term_link( 'blog', 'category' ) ); ?>"><span class="icon icon-blog"></span>BLOG</a></li>
                  <?php endif; ?>
                </ul>
              </div>
            </nav>
          </div>
        </div>
      </div>

      <div class="mainvisual <?php if( !is_front_page() ): echo 'mainvisual--subpage'; endif; ?>">
        <div class="container page-title">
        <?php if( is_front_page() ): ?>
          <h2 class="font-serif text-right"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/img-home-mainvisual-effect.png" alt="HOME VISUAL" /></h2>
          <?php else: ?>
          <h2 class="page-title--subpage font-serif"><?php
            if( is_single() || is_page() ):
              the_title();
            elseif( is_search() ):
              echo '「'.esc_html( get_search_query() ).'」の検索結果';
            elseif( is_404() ):
              echo 'ページが見つかりませんでした';
            else:
              the_archive_title();
            endif;
             ?></h2>
          <?php endif; ?>
        </div>
      </div>

      <?php if( !is_front_page() ): ?>
      <nav id="breadcrumb-nav" class="container">
        <ul class="breadcrumb">
          <li><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><span class="glyphicon glyphicon-home"></span>HOME</a></li>
          <li><?php
            if( is_single() || is_page() ):
              the_title();
            elseif( is_search() ):
              echo '「'.esc_attr( get_search_query() ).'」の検索結果';
            elseif( is_404() ):
              echo '404 error not found';
            else:
              the_archive_title();
            endif;
            ?></li>
        </ul>
      </nav>
      <?php endif; ?>
      
    </header>