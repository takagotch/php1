<?php get_header(); ?>

    <main id="wrap-container" role="main">

      <nav id="home-nav" class="home-nav">
        <div class="home-nav__title">
          <h2 class="text-center font-serif">MENU</h2>
        </div>

        <div class="container">
          <ul class="home-nav__list row list-unstyled">
            <li class="home-nav__cafe col-xs-12 col-sm-4">
              <div class="home-nav__thumbnail">
                <a href="<?php echo esc_url( home_url('/menu#menu-cafe') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/nav-cafe.jpg" alt="" class="img-responsive img-thumbnail"/></a>
              </div>
              <div class="home-nav__text">
                <h2><a href="<?php echo esc_url( home_url('/menu#menu-cafe') ); ?>" class="text-hide">CAFE</a></h2>
                <p>シェフの焼く絶品のパンと、バリスタの入れるコーヒーでリフレッシュする贅沢をお楽しみください。</p>
              </div>
            </li>
            <li class="home-nav__lunch ol-xs-12 col-sm-4">
              <div class="home-nav__thumbnail">
                <a href="<?php echo esc_url( home_url('/menu#menu-lunch') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/nav-lunch.jpg" alt="" class="img-responsive img-thumbnail"/></a>
              </div>
              <div class="home-nav__text">
                <h2><a href="<?php echo esc_url( home_url('/menu#menu-lunch') ); ?>" class="text-hide">LUNCH</a></h2>
                <p>おいしい野菜を使った、元気になれるメニューがいっぱい！平日のランチはもちろん、お休みの日にも美味しいランチタイムをお楽しみください。</p>
              </div>
            </li>
            <li class="home-nav__dinner col-xs-12 col-sm-4">
              <div class="home-nav__thumbnail">
                <a href="<?php echo esc_url( home_url('/menu#menu-dinner') ); ?>"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/nav-dinner.jpg" alt="" class="img-responsive img-thumbnail"/></a>
              </div>
              <div class="home-nav__text">
                <h2><a href="<?php echo esc_url( home_url('/menu#menu-dinner') ); ?>" class="text-hide">DINNER</a></h2>
                <p>すべて直送で新鮮な食材で、四季折々の旬の味をお楽しみいただけます。本格的なお料理をゆっくりとご堪能ください。</p>
              </div>
            </li>
          </ul>
        </div>
      </nav>

      <article id="home-postlist" class="home-postlist">
        <div class="home-postlist__title">
          <h2 class="text-center font-serif">BLOG</h2>
        </div>

        <div class="container">
          <div class="row">

            <?php
            $args = array(
              'category_name' => 'blog',
              'posts_per_page' => 4,
              'ignore_sticky_posts' => 1
            );
            $blog_posts = new WP_Query( $args );
            $first_post = true;

            if( $blog_posts->have_posts() ):
              while( $blog_posts->have_posts() ): $blog_posts->the_post(); ?>

                <section <?php post_class( 'entry entry--simple entry--excerpt col-xs-12 col-sm-6' ) ?>>
                  <div class="entry-thumbnail">
                    <a href="<?php the_permalink(); ?>">
                      <?php
                      if( $first_post ){
                        echo '<span class="entry__new-mark">NEW</span>';
                        $first_post = false;
                      } ?>
                      <?php
                      if( has_post_thumbnail() ):
                        the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-thumbnail', 'alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) ) );
                      else: ?>
                        <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/img-noimage.jpg" alt="<?php the_title_attribute(); ?>" title="<?php the_title_attribute(); ?>" class="img-thumbnail"/>
                      <?php endif; ?>
                    </a>
                  </div>

                  <div class="entry-meta">
                    <div class="entry-meta__time">
                      <span class="glyphicon glyphicon-time"></span><time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y/m/d' ); ?></time>
                    </div>
                  </div>
                  <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 30 ); ?></a></h2>
                  <div class="entry-content">
                    <?php the_excerpt(); ?>
                  </div>
                  <div class="entry-more"><a href="<?php the_permalink(); ?>"><span class="text-hide">続きを読む</span></a></div>
                </section>

              <?php
              endwhile;
            endif;
            wp_reset_postdata();
            ?>

          </div>
        </div>

      </article>

      <div id="home-utilities" class="home-utilities">
        <div class="container">
          <div class="row">

            <article class="home-news col-xs-12 col-md-6">
              <div class="home-utilities__title">
                <h3 class="text-center font-serif">NEWS</h3>
              </div>
              <ul class="list-unstyled">
                <?php
                $args = array(
                  'category_name' => 'news',
                  'posts_per_page' => 6,
                  'ignore_sticky_posts' => 1
                );
                $news_posts = new WP_Query( $args );

                if( $news_posts->have_posts() ):
                  while( $news_posts->have_posts() ): $news_posts->the_post(); ?>
                    <li class="clearfix">
                      <div class="home-news__meta pull-left">
                        <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y/m/d' ); ?></time><?php the_tags( '<span class="label label-warning">','</span><span class="label label-warning">', '</span>' );?>
                      </div>
                      <div class="home-news__content pull-right">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?> - <?php echo wp_trim_words( get_the_excerpt(), 30 );  ?></a>
                      </div>
                    </li>
                  <?php
                  endwhile;
                endif;
                wp_reset_postdata();
                ?>
              </ul>
            </article>

            <article class="home-map col-xs-12 col-md-6">
              <div class="home-utilities__title">
                <h3 class="text-center font-serif">ACCESS</h3>
              </div>
              <div class="home-map__img">
                <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/img-home-utilities__map.png" alt="" class="img-responsive" />
              </div>
              <address class="home-map__address address">
                <p class="address__name">Maverick Coffee</p>
                <p>東京都表参道１－１－１ <br/>
                  03-2382-2392</p>
                <p><span class="label label-default">営業時間</span><br/>
                  10:00～21:00</p>
                <p><span class="label label-default">定休日</span><br/>
                  毎週水曜日</p>
              </address>
            </article>
          </div>
        </div>
      </div>
    </main>

<?php get_footer(); ?>