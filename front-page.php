<?php get_header(); ?>

<main class="main">
    <div class="main-visual">
        <div class="main-visual__img"></div>
    </div>

    <section id="skill" class="skill">
        <div class="skill__container">
            <h2 class="skill__title">Skill</h2>
            <ul class="skill__list">
                <li class="skill__item">
                    <div class="skill__inner">
                        <p class="skill__name">Webサイト制作</p>
                        <p class="skill__text">HTML/CSS/JavaScriptを使ったサイトを作ることができます。BEMを用いて可読性と保守性に優れたマークアップが可能です。
                        </p>
                    </div>
                </li>
                <li class="skill__item">
                    <div class="skill__inner">
                        <p class="skill__name">jQuery</p>
                        <p class="skill__text">スクロールに応じたアニメーションやホバーエフェクトなど、webサイトに動きを付けることができます。</p>
                    </div>
                </li>
                <li class="skill__item">
                    <div class="skill__inner">
                        <p class="skill__name">Sass</p>
                        <p class="skill__text">Sassを活用することで、効率的で見通しの良いスタイル設計が可能です。保守しやすく、後からの修正や機能追加にも柔軟に対応できます。</p>
                    </div>
                </li>
                <li class="skill__item">
                    <div class="skill__inner">
                        <p class="skill__name">WordPress</p>
                        <p class="skill__text">WordPressのテーマ構造を理解し、拡張性と保守性を意識した実装が可能です。カスタマイズや機能追加にも柔軟に対応できます。</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <section id="works" class="works">
        <div class="works__container">
            <h2 class="works__title">Works</h2>
            <?php
            $args = array(
                'post_type' => 'works',
                'posts_per_page' => 4,
            );
            $works_query = new WP_Query($args);

            if ($works_query->have_posts()):
                ?>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <?php while ($works_query->have_posts()):
                            $works_query->the_post(); ?>
                            <div class="swiper-slide">
                                <a href="<?php the_permalink(); ?>" class="works__link">
                                    <div class="works__img-box">
                                        <?php if (get_field('img')): ?>
                                            <img src="<?php the_field('img'); ?>" alt="" class="works__img">
                                        <?php endif; ?>
                                    </div>
                                    <p class="works__name"><?php the_field('name'); ?></p>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <div class="swiper-pagination"></div>
                    <a href="<?php echo home_url('/works') ?>" class="works__more">一覧</a>
                </div>
                <?php
            endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>

    <section id="news" class="news">
        <div class="news__container">
            <h2 class="news__title">News</h2>
            <?php
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => 3,
            );
            $news_query = new WP_Query($args);
            if ($news_query->have_posts()):
                ?>
                <ul class="news__list">
                    <?php while ($news_query->have_posts()):
                        $news_query->the_post();
                        $tags = get_field('tags');
                    ?>
                        <li class="news__item">
                            <a href="<?php the_permalink(); ?>" class="news__link">
                                <div class="news__info">
                                    <time class="news__date" datetime="<?php the_time('Y-m-d'); ?>">
                                        <?php the_time('Y-m-d'); ?></time>
                                    <?php if ($tags): ?>
                                        <ul class="news__tag-list">
                                            <?php foreach ($tags as $tag):
                                                $class = '';
                                                if ($tag == '重要') {
                                                    $class = ' news__category--important';
                                                }
                                                ?>
                                                <li class="news__category<?php echo esc_attr($class); ?>">
                                                    <span><?php echo esc_html($tag); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <p class="news__headline"><?php the_field('headline'); ?></p>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
                <a href="<?php echo esc_url(home_url('/news')); ?>" class="news__more">一覧</a>
            <?php endif;
            wp_reset_postdata();
            ?>
        </div>
    </section>

    <section id="about" class="about">
        <div class="about__container">
            <h2 class="about__title">About Me</h2>
            <div class="about__flex">
                <img src="<?php echo get_theme_file_uri('/assets/image/face.png') ?>" alt="" class="about__img">
                <div class="about__content">
                    <div class="about__name-box">
                        <p class="about__name-kana">Takashi Kajihara</p>
                        <h2 class="about__name">梶原 崇史</h2>
                    </div>
                    <div class="about__text-box">
                        <p class="about__text">
                            デザインをもとにしたコーディングを専門に行っており、HTML/CSS/JavaScriptを使ったWebサイトの実装全般をお任せいただけます。</p>
                        <p class="about__text">再現性と保守性を重視した丁寧なコーディングを心がけています。</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="contact" class="contact">
        <a href="<?php echo home_url('/contact') ?>" class="contact__link">contact</a>
    </div>
</main>

<div class="to-the-top">
    <a href="#" class="to-the-top__button"></a>
</div>

<?php get_footer(); ?>