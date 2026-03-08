<!DOCTYPE html>
<html lang="ja">

<head>
    <!-- Google Tag Manager -->
    <script>(function (w, d, s, l, i) {
            w[l] = w[l] || []; w[l].push({
                'gtm.start':
                    new Date().getTime(), event: 'gtm.js'
            }); var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
                    'https://www.googletagmanager.com/gtm.js?id=' + i + dl; f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-WGSC62JL');</script>
    <!-- End Google Tag Manager -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IT axis</title>
    <meta name="description" content="webサイトのコーディングを仕事としています。HTML、CSS、JavaScriptに対応しております。" />
    <link rel="icon" href="<?php echo get_theme_file_uri('/assets/image/favicon.ico'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c:wght@100;300;400;500;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('/assets/style/main.css'); ?>" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WGSC62JL" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class="header">
        <div class="header__container">
            <div class="header__inner">
                <a href="<?php echo home_url('/') ?>" class="header__top-link">
                    <h1 class="header__name">
                        <img src="<?php echo get_theme_file_uri('/assets/image/logo.svg'); ?>" alt="ITAXIS"
                            class="header__logo">
                    </h1>
                </a>
                <div class="header__hamburger"></div>
            </div>
            <nav class="header__nav">
                <ul class="header__list">
                    <li class="header__nav-item">
                        <a href="<?php echo is_front_page() ? '#skill' : home_url('/#skill'); ?>"
                            class="header__nav-link">skill</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo is_front_page() ? '#works' : home_url('/#works'); ?>"
                            class="header__nav-link">works</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo is_front_page() ? '#news' : home_url('/#news'); ?>"
                            class="header__nav-link">news</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo is_front_page() ? '#about' : home_url('/#about'); ?>"
                            class="header__nav-link">about</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo home_url('/contact'); ?>" class="header__nav-link">contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>