<div id="sidr">
  <ul>
    <li id="home" class="first"><a href="<?php echo home_url('/'); ?>"><?php bloginfo('name');?></a></li>
  </ul>
  <ul>
    <li id="list_tour" class="first"><a href="<?php echo get_permalink(get_page_by_path('tour-info')); ?>">ツアー情報</a></li>
<?php wp_list_categories(array('taxonomy' => 'area', 'title_li' => false, 'hide_empty' => true)); ?>
  </ul>
  <ul>
    <li id="list_branch" class="first"><a href="<?php echo get_permalink(get_page_by_path('office')); ?>">営業所</a></li>
<?php wp_list_pages(array('post_type' => 'branch', 'title_li' => false)); ?>
  </ul>
  <ul>
    <li id="list_common" class="first"><a href="<?php echo get_permalink(get_page_by_path('about')); ?>">会社概要</a></li>
    <li><a href="<?php echo get_permalink(get_page_by_path('recruit')); ?>">採用情報</a></li>
    <li><a href="<?php echo get_permalink(get_page_by_path('csr')); ?>">社会貢献活動(CSR)</a></li>
    <li><a href="<?php echo get_permalink(get_page_by_path('news')); ?>">お知らせ</a></li>
    <li><a href="<?php echo get_permalink(get_page_by_path('sitemap')); ?>">サイトマップ</a></li>
    <li><a href="<?php echo get_permalink(get_page_by_path('inquiry')); ?>">お問い合わせ</a></li>
  </ul>
</div>
