<?php get_header(); ?>

  <div id="wrap-container">
    <div class="container">
      <div class="row">
        <main id="main-col" class="col-xs-12 col-md-9" role="main">
          <div class="main-col__inner">

            <?php if( have_posts() ): ?>
              <?php while ( have_posts() ) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
                  <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <?php if( has_post_thumbnail() ): ?>
                      <div class="entry-thumbnail">
                        <?php the_post_thumbnail( 'post-thumbnail', array( 'class' =>'img-thumbnail img-responsive', 'alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) ) ); ?>
                      </div>
                    <?php endif; ?>
                  </header>
                  <div class="entry-content clearfix">
                    <?php
                    the_content();
                    wp_link_pages( array(
                      'before' => '<div class="entry__page-links">',
                      'after' => '</div>',
                      'link_before' => '<span class="btn btn-default">',
                      'link_after' => '</span>',
                      'pagelink' => '%ページ',
                      'separator' => '',
                    ) );
                    ?>
                  </div>
                  <footer class="entry-footer">
                    <div class="entry-meta">
                      <div class="entry-meta__time text-right">
                        <span class="glyphicon glyphicon-time"></span><span class="vcard author"><a href="#" class="fn">Maverick staff</a></span> at <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y/m/d' ); ?></time>
                      </div>
                      <?php if( has_tag() ): ?>
                        <div class="entry-meta__tag">
                          <span class="glyphicon glyphicon-tag"></span><?php the_tags( '<span>', '</span><span>', '</span>' ); ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </footer>
                </article>

                <nav class="prevnext-nav">
                  <ul class="list-inline clearfix">
                    <li class="prevnext-nav__left pull-left"><?php previous_post_link( '%link', 'PREV' ); ?></li>
                    <li class="prevnext-nav__right pull-right"><?php next_post_link( '%link', 'NEXT' ); ?></li>
                  </ul>
                </nav>

              <?php endwhile; ?>
            <?php else: ?>

              <section class="not-found">
                <h1 class="not-found__title">ページが見つかりませんでした</h1>
                <p>お探しのページは一時的にアクセスができない状態にあるか、ページが移動もしくは削除されてしまった可能性があります。</p>
                <p>以下の方法をお試し下さい。</p>
                <ul>
                  <li>アドレスを再入力する。</li>
                  <li><a href="javascript:history.back();">前のページに戻る。</a></li>
                  <li><a href="<?php echo esc_url( home_url() ); ?>">トップページに戻る</a></li>
                  <li>下部の検索バーよりキーワード検索を試す。</li>
                </ul>
                <?php get_search_form(); ?>
              </section>

            <?php endif; ?>

          </div>
        </main>

        <div id="sub-col" class="col-xs-12 col-md-3" role="complementary">
          <?php get_sidebar(); ?>
        </div>

      </div>
    </div>
  </div>

<?php get_footer(); ?>