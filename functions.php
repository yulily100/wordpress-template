<?php
	//アイキャッチ画像を使用する
	add_theme_support('post-thumbnails');

	// entry page
	add_image_size('entry-top',740, 416, true);

	// title
	add_theme_support( 'title-tag' );

	// カスタム投稿タイプ
	function register_plan () {
		$args = array(
			'label' => 'プラン',
			'labels' => array(
				'name' => 'プラン一覧',
				'add_new' => '新しいプランを追加',
				'add_new_item' => '新しいプランを追加',
			),
			'public' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', 'custom-fields'),
			'menu_position' => 5,
			'menu_icon'   => 'dashicons-welcome-edit-page',
			'has_archive' => 'true',
			'rewrite' => array('with_front' => false), // パーマリンク書き換え、設定空更新必要
		);
		register_post_type( "plan", $args);

		$tags = array(
			'label' => 'タグ',
			'public' => true,
		);
		register_taxonomy( 'plan_tags', 'plan', $tags);

		$categories = array(
			'label' => 'カテゴリー',
			'public' => true,
		);
		register_taxonomy( 'plan_categories', 'plan', $categories);
	}
	add_action('init', 'register_plan');



	// ダッシュボードのメニューをカスタマイズ
	function remove_menus () {
		global $menu;
		unset($menu[25]); // コメント
	}
	add_action('admin_menu', 'remove_menus');

	// 日本語URL禁止
	function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
	}
	add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );
?>
