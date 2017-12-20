<form role="search" method="get" class="search-form row" action="<?php echo esc_url( home_url() ) ?>">
  <label class="col-xs-12 col-md-9">
    <span class="screen-reader-text sr-only">検索</span>
    <input type="search" class="search-field form-control" placeholder="検索 …" value="<?php echo get_search_query() ?>" name="s" title="検索" />
  </label>
  <div class="col-xs-12 col-md-3">
    <input type="submit" class="search-submit" value="検索" />
  </div>
</form>
