<h4>ツアー概要</h4>
<table class="editor_template_table">
    <tr>
        <th>地域</th>
        <td><?php tpl_taxonomy_list( array( 'type' => 'select', 'taxonomy' => 'area' ) ); ?></td>
    </tr>
    <tr>
        <th>メインイメージ</th>
        <td class="select_img"><?php tpl_post_thumbnail(); ?></td>
    </tr>
    <tr>
        <th>ツアーの概要</th>
        <td><?php tpl_excerpt( array( 'rows' => 5, 'cols' => 84 ) ); ?></td>
    </tr>
</table>

<h4>ツアー内容</h4>
<table class="editor_template_table">
    <tr>
        <th>訪問都市</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_destination' ) ); ?>
        </td>
    </tr>
    <tr>
        <th>開始日</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_start_day' ) ); ?>
        </td>
    </tr>
    <tr>
        <th>終了日</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_end_day' ) ); ?>            
        </td>
    </tr>
    <tr>
        <th>出発地</th>
        <td class="check_box">
            <span class="clearfix"><?php tpl_custom( array( 'meta_key' => 'cf_departure', 'type' => 'checkbox', 'items' => array('成田', '羽田', '大阪', '名古屋', '福岡', '札幌', 'その他') ) ); ?>
            </span>
        </td>
    </tr>
    <tr>
        <th>航空会社</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_airline', 'type' => 'select', 'items' => array('日系航空会社', '米系航空会社', '未定') ) ); ?>
        </td>
    </tr>
    <tr>
        <th>シートクラス</th>
        <td class="clearfix">
            <?php tpl_custom( array( 'meta_key' => 'cf_sheet', 'type' => 'radio', 'items' => array('エコノミークラス', 'ビジネスクラス', 'ファーストクラス') ) ); ?>
        </td>
    </tr>
    <tr>
        <th>ホテル</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_hotel' ) ); ?>
        </td>
    </tr>
    <tr>
        <th>食事</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_meal' ) ); ?>
        </td>
    </tr>
    <tr>
        <th>添乗員</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_conductor' ) ); ?>
        </td>
    </tr>
    <tr>
        <th>最低料金</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_min_fair' ) ); ?>
        </td>
    </tr>
    <tr>
        <th>最高料金</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_max_fair' ) ); ?>
        </td>
    </tr>
    <tr>
        <th>ツアーコード</th>
        <td>
            <?php tpl_custom( array( 'meta_key' => 'cf_tour_code' ) ); ?>
        </td>
    </tr>
</table>

<h4>プランのポイント</h4>
<table class="editor_template_table">
    <tr>
        <th class="sub_images">サブイメージ</th>
        <td class="clearfix select_img">
            <ul>
                <li>
                    <h5>画像1</h5>
                    <?php tpl_custom( array( 'meta_key' => 'cf_img_1', 'type' => 'image' ) ); ?>
                </li>
                <li>
                    <h5>画像2</h5>
                    <?php tpl_custom( array( 'meta_key' => 'cf_img_2', 'type' => 'image' ) ); ?>
                </li>
            </ul>
        </td>
    </tr>
</table>
<?php tpl_editor( array( 'cols' => 184 ) ); ?>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/i18n/jquery.ui.datepicker-ja.min.js"></script>
<link type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/themes/ui-lightness/jquery-ui.css" rel="stylesheet" />
<script>
  jQuery(function($){
    $('#post_custom-cf_start_day').datepicker();
    $('#post_custom-cf_end_day').datepicker();
  });
</script>