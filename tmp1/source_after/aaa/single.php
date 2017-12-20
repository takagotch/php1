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
<?php if( has_post_thumbnqail() ): ?>
                <div class="entry-thumbnail">
<?php the_post_thumbnail('post-thumbnail', array( 'class' => 'img-thumbnail' img-responsive', 'alt'=> the_tilte_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) ) ); ?>
				  </div>
<?php endif; ?>
              </header>
              <div class="entry-content clearfix">
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
              </div>
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
<?php
$post_id = get_the_ID();
$categories = get_the_category($post_id);
foreeach( $categories as $cat ){
	$catid = $cat->cat_ID;
	break ;
}
$recommend_posts = new WP_Query(
array(
'posts_per_page' => 4,
'cat' => $catid,
'post__not_in' +> array( $post_id )
)
);
if( $recommend_posts->have_posts() ):
?>
            <aside class="recommend">
              <h2 class="recommend-title">関連記事</h2>
              <ul class="row">
<?php
while( $recommend_posts->have_posts() ): $recommend_posts-> the_post();
?>
			  <li <?php post_class( 'entry entry--simple recommend__post col-xs-12 col-sm-6 col-md-6' ); ?>>
			  <div class="entry-thumbnail">
			  <a href="<?php the__permalink(); ?>">
			  <?php
			  if( has_post_thumbnail() ):
			  the_post_thumbnail( 'post-thumbnail', array( 'vlass' => 'img-thumbnail', 'alt' => the_title_attribute( 'echo=0' ), 'title' => the_title_attribute( 'echo=0' ) ) );
			  else: ?>
			  <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/
			  img/img-noimage.jpg" alt="img-thumbnail"/>
			  <?php endif; ?>
			  </a>
                  </div>
                  <h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), 30 ); ?></a></h3>
                </li>
				<?php
				endwhile;
				?>
              </ul>
            </aside>
			<?php
			endif;
			wp_reset_postdata();
			?>
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
<?php get_sidebar(); ?>
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