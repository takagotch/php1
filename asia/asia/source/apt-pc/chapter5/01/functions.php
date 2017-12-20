<?php

// カスタムメニュー
register_nav_menus(
  array(
    'place_pc_global' => 'PCグローバル',
    'place_sp_global' => 'SPグローバル',
    'place_pc_utility' => 'PCユーティリティ',
    'place_sp_utility' => 'SPユーティリティ',
  )   
);

// wp_nav_menuにslugのクラス属性を追加する。
function apt_slug_nav($css, $item) {
  if ($item->object == 'page') {
    $page = get_post($item->object_id);
    $css[] = 'menu-item-slug-' . esc_attr($page->post_name);
  }
  return $css;
}

// 最上位の固定ページ情報を取得する。
function apt_page_ancestor() {
  global $post;
  $anc = array_pop(get_post_ancestors($post));
  $obj = new stdClass;
  if ($anc) {
    $obj->ID = $anc;
    $obj->post_title = get_post($anc)->post_title;
  } else {
    $obj->ID = $post->ID;
    $obj->post_title = $post->post_title;
  }
  return $obj;
}

// カテゴリIDを取得する。
function apt_category_id($tax='category') {
  global $post;
  $cat_id = 0;
  if (is_single()) {
    $cat_info = get_the_terms($post->ID, $tax);
    if ($cat_info) {
      $cat_id = array_shift($cat_info)->term_id;
    }
  }
  return $cat_id;  
}

// カテゴリ情報を取得する。
function apt_category_info($tax='category') {
  global $post;
  $cat = get_the_terms($post->ID, $tax);
  $obj = new stdClass;
  if ($cat) {
    $cat = array_shift($cat);
    $obj->name = $cat->name;
    $obj->slug = $cat->slug;
  } else {
    $obj->name = '';
    $obj->slug = '';
  }
  return $obj;
}

// カスタム投稿タイプ・カスタム分類
add_action('init', 'register_post_type_and_taxonomy');
function register_post_type_and_taxonomy() {
  register_post_type(
    'branch',
    array(
      'labels' => array(
        'name' => '営業所情報',
        'add_new_item' => '営業所を追加',
        'edit_item' => '営業所の編集',
      ),
      'public' => true,
      'hierarchical' => true,
      'supports' => array(
        'title',
        'editor',
        'excerpt',
        'custom-fields',
        'thumbnail',
        'page-attributes',
      ),
    )
  );
}

