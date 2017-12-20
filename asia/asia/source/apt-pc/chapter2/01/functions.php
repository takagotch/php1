<?php

// カスタム投稿タイプ・カスタム分類
add_action('init', 'register_post_type_and_taxonomy');
function register_post_type_and_taxonomy() {
  // カスタム投稿タイプ tour
  register_post_type(
    'tour',
    array(
      'labels' => array(
        'name' => 'ツアー情報',
        'add_new_item' => '新規ツアーを追加',
        'edit_item' => 'ツアーの編集',
      ),
      'public' => true,
      'supports' => array(
        'title',
        'editor',
        'excerpt',
        'custom-fields',
        'thumbnail',
      ),
    )
  );
  // カスタム分類 area
  register_taxonomy(
    'area',
    'tour',
    array(
      'labels' => array(
        'name' => '地域',
        'add_new_item' => '新規地域を追加',
        'edit_item' => '地域の編集',
      ),
      'hierarchical' => true,
      'show_admin_column' => true,
    )
  );
  // カスタム投稿タイプ branch
  register_post_type(
    'branch',
    array(
      'labels' => array(
        'name' => '営業所情報',
        'add_new_item' => '新規営業所を追加',
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

// カスタムメニュー
register_nav_menus(
  array(
    'place_pc_global' => 'PCグローバル',
    'place_sp_global' => 'SPグローバル',
    'place_pc_utility' => 'PCユーティリティ',
    'place_sp_utility' => 'SPユーティリティ',
  )   
);

// アイキャッチ画像
add_theme_support('post-thumbnails');
set_post_thumbnail_size(208, 138, true);
add_image_size('main_image', 370);
add_image_size('tour-archive', 280);
add_image_size('sub_image', 150);


