</div><!-- #wrap end -->
<?php get_template_part('sidr'); ?>
<div id="footer-container">
  <div id="footer">
    <div class="footer_utility">
<?php
  wp_nav_menu(array(
    'container' => false,
    'theme_location' => 'place_sp_utility',
  ));
?>

    </div><!-- .footer_utility end -->
    <div class="footer_social clearfix">
      <ul>
        <li><a href="https://mobile.twitter.com/kengyu_n">Twitter</a></li>
        <li><a href="https://m.facebook.com/wp.business.book">Facebook</a></li>
      </ul>
    </div><!-- .footer_social end -->
    <div class="textwidget">
      <p>
        <a href="#"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/bnr_blog.jpg" width="215" height="110" alt="社長ブログ"></a>
      </p>
    </div><!-- end .textwidget -->
    <p class="top_link"><a onclick="scrollup(); return false;" href="#wrap">TOPへ戻る</a></p>
    <p id="copyright">
      <small>Copyright &copy; <?php bloginfo('name'); ?> All rights reserved.</small>
    </p>
  </div><!-- #footer end -->
</div><!-- #footer-container end -->
<?php wp_enqueue_script('scrolljs', get_template_directory_uri() . '/js/scroll.js'); ?>
<?php wp_footer(); ?>
</body>
</html>
