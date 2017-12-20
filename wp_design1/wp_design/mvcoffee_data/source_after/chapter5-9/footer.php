    <footer id="footer" class="footer">

      <div class="footer__pagetop-btn">
        <a href="#wrapper" onclick="scrollup(); return false;" class="img-circle text-hide">TOP</a>
      </div>

      <div class="footer__social">
        <ul class="text-center clearfix">
          <li><a href="https://www.facebook.com/wp.business.book"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/btn-facebook.png" alt="Facebook"/></a></li>
          <li><a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/btn-twitter.png" alt="Twitter"/></a></li>
          <li><a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/btn-instagram.png" alt="instagram"/></a></li>
        </ul>
      </div>

      <div class="footer__copyright">
        <p class="text-center"><small>Copyright &copy; <?php bloginfo( 'name' ); ?></small></p>
      </div>

    </footer>

  </div>

	<?php wp_footer(); ?>

</body>
</html>