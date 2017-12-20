<?php get_header(); ?>

  <div id="wrap-container">

    <div class="container">
      <div class="row">

        <main id="main-col" class="col-xs-12 col-md-9" role="main">
          <div class="main-col__inner">

          <?php if( have_posts() ): ?>
            <?php while( have_posts() ): the_post(); ?>

              <article id="post-<?php the_ID(); ?>" <?php post_class('entry entry--excerpt entry--archive'); ?>>
                <header>
                  <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                </header>
                <?php if( has_post_thumbnail() ): ?>
                  <div class="entry-thumbnail">
                    <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'img-thumbnail img-responsive', 'alt' => the_title_attribute('echo=0'), 'title' => the_title_attribute('echo=0') ) ); ?></a>
                  </div>
                <?php endif; ?>
                <div class="entry-content">
                  <?php the_excerpt(); ?>
                </div>
                <footer class="entry-meta text-right">
                  <div class="entry-meta__time">
                    <span class="glyphicon glyphicon-time"></span><span class="vcard author"><?php the_author_posts_link(); ?></span> at <time class="updated" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time( 'Y/m/d' ); ?></time>
                  </div>
                  <?php if( has_tag() ): ?>
                    <div class="entry-meta__tag">
                      <span class="glyphicon glyphicon-tag"></span><?php the_tags( '<span>', '</span><span>', '</span>' ); ?>
                    </div>
                  <?php endif; ?>
                </footer>
              </article>

            <?php endwhile; ?>

            <nav class="prevnext-nav">
              <ul class="list-inline clearfix">
                <li class="prevnext-nav__left pull-left"><?php previous_posts_link( 'PREV' ); ?></li>
                <li class="prevnext-nav__right pull-right"><?php next_posts_link( 'NEXT' ); ?></li>
              </ul>
            </nav>

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