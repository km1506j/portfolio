<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb') ?>

<main class="main">
    <section class="works-detail">
        <div class="works-detail__container">
            <h1 class="works-detail__title">Works</h1>
            <div class="works-detail__box">
                <?php
                $works_url = get_field('works_link');
                ?>
                <a href="<?php echo esc_url($works_url); ?>" class="works-detail__link">
                    <img src="<?php the_field('img') ?>" alt="" class="works-detail__img">
                    <span class="works-detail__img-link"><?php the_field('name') ?></span>
                </a>
                <div class="works-detail__content">
                    <h2 class="works-detail__header">
                        <?php the_field('name'); ?>
                    </h2>
                    <div class="works-detail__text-box">
                        <?php
                        $show = get_field('show_rich_text');
                        $content = get_field('id');

                        if ($show) {
                            echo apply_filters('the_content', $content);
                        }
                        ?>
                        <p class="works-detail__text">
                            <?php
                            echo nl2br(get_field('text'))
                                ?>
                        </p>
                    </div>
                </div>
            </div>
            <div class="news-detail__pagination">
                <div class="news-detail__prev-post">
                    <?php if (get_previous_post()): ?>
                        <?php previous_post_link('%link', '« 前の記事'); ?>
                    <?php else: ?>
                        <span class="news-detail__disabled">« 前の記事</span>
                    <?php endif; ?>
                </div>
                <a href="<?php echo esc_url(home_url('/works/')) ?>" class="news-detail__more">一覧に戻る</a>

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