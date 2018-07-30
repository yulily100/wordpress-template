<?php
// カスタム投稿タイプを定義
	function register_member() {
		$labels = array(
			'name' => __( 'メンバー', 'member' ),
			'singular_name' => __( 'メンバー', 'member' ),
			'add_new' => __( '新規作成', 'member' ),
			'add_new_item' => __( '新しいメンバープロフィールを追加', 'member' ),
			'edit_item' => __( '編集', 'member' ),
			'new_item' => __( '新しいメンバー', 'member' ),
			'view_item' => __( 'メンバープロフィールを見る', 'member' ),
			'search_items' => __( '検索', 'member' ),
			'not_found' => __( '見つかりません', 'member' ),
			'not_found_in_trash' => __( 'ゴミ箱にはありません', 'member' ),
			'parent_item_colon' => __( '親メンバー', 'member' ),
			'menu_name' => __( 'メンバー', 'member' ),
		);

		$args = array(
			'labels' => $labels,
			'hierarchical' => false,
			'supports' => array( 'title', 'thumbnail', 'custom-fields' ),

			'public' => true,
			'menu_position' => 5,
			'show_ui' => true,
			'show_in_menu' => true,

			'show_in_nav_menus' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'has_archive' => true,
			'query_var' => true,
			'can_export' => true,
			'rewrite' => true,
			'capability_type' => 'post'
		);
		register_post_type( 'member', $args );

		// カテゴリー追加
		$category = array(
			'label' => 'ジャンル',
			'public' => true,
			'hierarchical' => true
		);
		register_taxonomy('genre', 'member', $category);
	}
	add_action( 'init', 'register_member' );


	//アイキャッチ画像を使用する
	add_theme_support('post-thumbnails');

	//サイズを指定して切り抜きをする(縦：100px 横100px)
	set_post_thumbnail_size(300, 300, true);

	// entry page
	add_image_size('entry-image',800, 400, true);

	// member page
	add_image_size('member-image',300, 300, true);

	function redirect_404_to_home() {
	  if (is_404()) {
	    wp_safe_redirect(home_url('/'), 302);
	    exit();
	  }
	}
	add_action('template_redirect', 'redirect_404_to_home');

	function defer_script($tag) {
		return str_replace("type='text/javascript'", "defer", $tag);
	}
	add_filter('script_loader_tag','defer_script');

	// JSのロード
	wp_register_script('three', get_template_directory_uri() . '/js/three.min.js', array(), false, true);
	wp_register_script('three-postprocessing', get_template_directory_uri() . '/js/postprocessing.min.js', array('three'), false, true);
	wp_register_script('scrollreveal', 'https://unpkg.com/scrollreveal/dist/scrollreveal.min.js', array(), false, true);
	wp_register_script('index', get_template_directory_uri() . '/yokoito.js', array('three', 'three-postprocessing', 'scrollreveal'), false, true);
	wp_enqueue_script('index');
?>
