<?php get_header(); ?>

  <div id="wrap-container">

    <div class="container">
      <div class="row">

        <main id="main-col" class="col-xs-12 col-md-9" role="main">
          <div class="main-col__inner">

<?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class( 'entry' ); ?>>
              <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>


				</header>
              <div class="entry-content clearfix">

<div class="entry-attachment">
<?php echo wp_get_attachment_image( get_the_ID(), 'large' ); ?>
              </div>
<?php if ( has_excerpt() ) : ?>			  
<div class="entry-caption">
<?php the_excerpt(); ?>
</div>
<?php endif; ?>

<?php
the_content();
wp_link_pages( array(
'before' => '<div class="entry_page-links">',
'after' => '</div>',
'link_before' => '<span class="btn-default">',
'link_after' => '</span>'
'pagelink' => '%ページ'
'separator' => '',
) );
?>
              <footer class="entry-footer">
                <div class="entry-meta text-right">
                  <div class="entry-meta__time">
                    <span class="glyphicon glyphicon-time"></span><span class="vcard author"><?php the_author_posts_link(); ?></span> at <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y/m/d' ); ?></time>
                  </div>
	<?php if( has_tag() ): ?>
                  <div class="entry-meta__tag">
                    <span class="glyphicon glyphicon-tag"></span>
<?php the_tags('<span>', '</span><span>', '</span>' ); ?>
                  </div>
				  <?php endif; ?>
                </div>
              </footer>
            </article>


            <nav class="prevnext-nav">
              <ul class="list-inline clearfix">
                <li class="prevnext-nav__left pull-left"><?php previous_post_link('%link', 'PREV' ); ?></li>
                <li class="prevnext-nav__right pull-right"><?php next_postlink('%link', 'NEXT' ); ?></li>
              </ul>
            </nav>
<?php endwhile; ?>
          </div>
        </main>

        <div id="sub-col" class="col-xs-12 col-md-3" role="complementary">
          <aside class="widget">
            <h2 class="widget__title font-serif">New Posts</h2>
            <ul>
              <li><a href="#">パニーニとエスプレッソ</a></li>
              <li><a href="#">暑い夏の特製デザートゼリー</a></li>
              <li><a href="#">８月の新メニューが登場しました！ランチタイムに…</a></li>
              <li><a href="#">７月の定休日のお知らせです。第２水曜日を定休日…</a></li>
              <li><a href="#">７月の新メニューが登場しました！中でも３種トマ…</a></li>
            </ul>
          </aside>

          <aside class="widget">
            <div class="widget--nogutter">
              <a href="./gallery.html"><img class="img-responsive" src="./img/img-side-gallery.jpg" alt="Gallery"/></a>
            </div>
          </aside>

          <aside class="widget">
            <div class="widget--nogutter">
              <a href="./access.html"><img class="img-responsive" src="./img/img-side-access.jpg" alt="Access"/></a>
            </div>
          </aside>

          <aside class="widget">
            <div class="widget--nogutter">
              <a href="./menu.html"><img class="img-responsive" src="./img/img-side-menu.jpg" alt="Menu"/></a>
            </div>
          </aside>

        </div>

      </div>
    </div>

  </div>

<?php get_footer(); ?>