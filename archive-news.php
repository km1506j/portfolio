<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb') ?>

<main class="main">
    <section class="news-table">
        <div class="news-table__container">
            <h1 class="news-table__title">News</h1>

            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $tags = get_field('news_tags_costom');
            $args = array(
                'post_type' => 'news',
                'posts_per_page' => 4,
                'paged' => $paged,
            );
            $news_query = new WP_Query($args);
            ?>

            <?php if ($news_query->have_posts()):?>
                <ul class="news-table__list">
                    <?php while ($news_query->have_posts()):
                        $news_query->the_post(); 
                        $post_id = get_the_ID();
                        $url = home_url('/news/' . $post_id);
                    ?>
                        <li class="news-table__list-item">
                            <a href="<?php echo esc_url($url); ?>" class="news-table__list-link">
                                <div class="news-table__info">
                                    <?php
                                    $date = get_field('custom_date');
                                    $tags = get_field('tags')
                                    ?>
                                    <time class="news-table__date" datetime="<?php the_time('Y-m-d'); ?>">
                                        <?php the_time('Y.m.d') ?>
                                    </time>
                                    <?php if ($tags): ?>
                                        <ul class="news-table__tag-list">
                                            <?php foreach ($tags as $tag): 
                                            $class = '';
                                            if ($tag == '重要') {
                                                $class = ' news-table__tag-item--important';
                                            }
                                            ?>
                                                <li class="news-table__tag-item<?php echo esc_attr($class); ?>">
                                                    <span><?php echo esc_html(($tag)); ?></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>

                                </div>
                                <p class="news-table__text"><?php echo esc_html(get_field('headline')); ?></p>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>

                <div class="pagination">
                    <ul>
                        <li class="prev-page">
                            <?php if ($paged > 1): ?>
                                <a href="<?php echo get_pagenum_link($paged - 1); ?>">« 前へ</a>
                            <?php else: ?>
                                <span class="disabled">« 前へ</span>
                            <?php endif; ?>
                        </li>

                        <?php
                        echo str_replace(
                            array('<ul class=\'page-numbers\'>', '</ul>'),
                            '',
                            paginate_links(array(
                                'total' => $news_query->max_num_pages,
                                'current' => $paged,
                                'mid_size' => 1,
                                'type' => 'list',
                                'prev_next' => false,
                            ))
                        );
                        ?>

                        <li class="next-page">
                            <?php if ($paged < $news_query->max_num_pages): ?>
                                <a href="<?php echo get_pagenum_link($paged + 1); ?>">次へ »</a>
                            <?php else: ?>
                                <span class="disabled">次へ »</span>
                            <?php endif; ?>
                        </li>
                    </ul>
                </div>


                <?php wp_reset_postdata(); ?>
            <?php else: ?>
                <p>投稿がありません。</p>
            <?php endif; ?>

        </div>

    </section>
</main>

<?php get_footer(); ?>