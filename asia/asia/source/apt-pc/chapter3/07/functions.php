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
