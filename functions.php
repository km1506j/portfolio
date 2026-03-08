<?php
/**
 * ======================================
 * スクリプト・スタイル読み込み
 * ======================================
 */

add_action('wp_enqueue_scripts', 'it_axis_scripts');
function it_axis_scripts() {

  // Swiper
  wp_enqueue_script(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
    [],
    null,
    true
  );

  // WordPress標準 jQuery
  wp_enqueue_script('jquery');

  // 自作JS（Swiper + jQuery に依存）
  wp_enqueue_script(
    'it-axis-main',
    get_template_directory_uri() . '/assets/script/main.js',
    ['jquery', 'swiper'],
    null,
    true
  );
}

/**
 * ======================================
 * プラグイン挙動調整
 * ======================================
 */
add_filter('wpcf7_autop_or_not', '__return_false');

add_action('init', function () {
    // /news/123 → news の単一記事(ID参照)
    add_rewrite_rule(
        '^news/([0-9]+)/?$',
        'index.php?post_type=news&p=$matches[1]',
        'top'
    );
}, 5);

/**
 * ======================================
 * カスタム投稿「news」URL制御
 * ======================================
 */

// --- ニュースのパーマリンクを ID 形式で出力 ---
add_filter('post_type_link', function ($post_link, $post) {
    if ($post->post_type === 'news') {
        return home_url(user_trailingslashit('news/' . $post->ID));
    }
    return $post_link;
}, 10, 2);

// /news/slug → /news/ID に正規化（301）
add_action('template_redirect', function () {
    if (is_singular('news')) {
        $target = home_url(user_trailingslashit('news/' . get_queried_object_id()));
        $current = home_url(user_trailingslashit(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/')));
        if ($current !== $target) {
            wp_redirect($target, 301);
            exit;
        }
    }
});

