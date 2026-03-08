<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb') ?>

<main class="main">
    <section class="news-detail">
        <div class="news-detail__container">
            <h1 class="news-detail__title">News</h1>
            <div class="news-detail__box">
                <div class="news-detail__content">
                    <div class="news-detail__info">
                        <?php
                        $date = get_field('custom_date');
                        $datetime = date('Y-m-d', strtotime($date));
                        $display = date('Y.m.d', strtotime($date));
                        $tags = get_field('tags')
                            ?>
                        <time class="news-detail__date" datetime="<?php echo esc_attr($datetime); ?>">
                            <?php echo esc_html($display); ?>
                        </time>
                        <?php if ($tags): ?>
                            <ul class="news-detail__tag-list">
                                <?php foreach ($tags as $tag):
                                    $class = '';
                                    if ($tag == '重要') {
                                        $class = ' news-detail__tag-item--important';
                                    }
                                    ?>
                                    <li class="news-detail__tag-item<?php echo esc_attr($class); ?>">
                                        <span><?php echo esc_html(($tag)); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                    <p class="news-detail__text"><?php echo esc_html(get_field('headline')); ?></p>
                </div>
                <?php the_field('sentence'); ?>
            </div>
            <div class="news-detail__pagination">
                <div class="news-detail__prev-post">
                    <?php if (get_previous_post()): ?>
                        <?php previous_post_link('%link', '« 前の記事'); ?>
                    <?php else: ?>
                        <span class="news-detail__disabled">« 前の記事</span>
                    <?php endif; ?>
                </div>
                <a href="<?php echo esc_url(home_url('/news/')) ?>" class="news-detail__more">一覧に戻る</a>

                <div class="news-detail__next-post">
                    <?php if (get_next_post()): ?>
                        <?php next_post_link('%link', '次の記事 »'); ?>
                    <?php else: ?>
                        <span class="news-detail__disabled">次の記事 »</span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>