<?php get_header(); ?>

<div id="wrap-container">

  <div class="container">
    <div class="row">

      <main id="main-col" class="col-xs-12 col-md-9" role="main">
        <div class="main-col__inner">
          <?php while( have_posts() ): the_post(); ?>

            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <header class="entry-header">
                <h1 class="entry-title"><?php the_title(); ?></h1>
              </header>

              <div class="entry-content clearfix">
                <div class="entry-attachment">
                  <?php
                  echo wp_get_attachment_image( get_the_ID(), 'large' );
                  ?>

                  <?php if ( has_excerpt() ): ?>
                    <div class="entry-caption">
                      <?php the_excerpt(); ?>
                    </div>
                  <?php endif; ?>

                </div>

                <?php
                the_content();

                wp_link_pages( array(
                  'before'      => '<div class="entry__page-links">',
                  'after'       => '</div>',
                  'link_before' => '<span class="btn btn-default">',
                  'link_after'  => '</span>',
                  'pagelink'    => '%ページ',
                  'separator'   => '',
                ) );

                ?>

              </div>

              <footer class="entry-footer">
                <div class="entry-meta text-right">
                  <div class="entry-meta__time">
                    <span class="glyphicon glyphicon-time"></span><span class="vcard author"><?php the_author_posts_link(); ?></span> at <time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y/m/d' ); ?></time>
                  </div>
                </div>
              </footer>
            </article>

            <nav class="prevnext-nav">
              <ul class="list-inline clearfix">
                <li class="prevnext-nav__left pull-left"><?php previous_image_link( false, 'PREV' ); ?></li>
                <li class="prevnext-nav__right pull-right"><?php next_image_link( false, 'NEXT' ); ?></li>
              </ul>
            </nav>

          <?php endwhile; ?>
        </div>
      </main>

      <div id="sub-col" class="col-xs-12 col-md-3" role="complementary">
        <?php get_sidebar(); ?>
      </div>

    </div>
  </div>
</div>

<?php get_footer(); ?>