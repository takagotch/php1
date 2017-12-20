<?php get_header(); ?>
  <div id="container">
    <div id="main" role="main">
      <div id="content">
        <div class="main_image">
          <a href="<?php echo get_permalink(get_page_by_path('tour-info')); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/top/main_image.png" alt="想像以上の旅をご提供いたします。" /></a>
        </div><!-- .main_image end -->
<?php
  add_filter('nav_menu_css_class', 'apt_slug_nav', 10, 2);
  wp_nav_menu(array(
    'container' => 'div',
    'container_id' => 'top_menu',
    'theme_location' => 'place_sp_global',
  ));
  remove_filter('nav_menu_css_class', 'apt_slug_nav');
?>
      </div><!-- end #content -->
      <div id="top_info">
        <div class="inner clearfix">
          <h2><img src="<?php bloginfo('stylesheet_directory'); ?>/images/top/ttl_news.png" width="80" height="20" alt="お知らせ" /></h2>
          <p class="list_link"><a href="<?php echo get_permalink(get_page_by_path('news')); ?>"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/top/btn_linklist.png" width="76" height="21" alt="一覧を見る" /></a></p>
          <ul>
<?php
  query_posts('post_type=post');
  while (have_posts()) :
    the_post();
    get_template_part('content-top-info');
  endwhile;
  wp_reset_query();
?>
          </ul>
        </div><!-- end .inner -->
      </div><!-- end #top_info -->
    </div><!-- end #main -->
  </div><!-- end #container -->
<?php get_footer(); ?>
