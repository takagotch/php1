<?php get_header(); ?>

  <div id="wrap-container">

    <div class="container">
      <div class="row">

        <main id="main-col" class="col-xs-12 col-md-9" role="main">
          <div class="main-col__inner">

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

          </div>
        </main>

<?php get_sidebar(); ?>
		
        </div>

      </div>
    </div>

  </div>

<?php get_footer(); ?>