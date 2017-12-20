<?php get_header(); ?>

		<div id="wrap-container">

      <div class="container">
        <div class="row">

          <main id="main-col" class="col-xs-12 col-md-12" role="main">
            <div class="main-col__inner">

              <?php while( have_posts() ): the_post(); ?>
              <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <h1 class="entry-title"><?php the_title(); ?></h1>
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
              </article>
              <?php endwhile; ?>

            </div>
          </main>

        </div>
      </div>

    </div>

<?php get_footer(); ?>