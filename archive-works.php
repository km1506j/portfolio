<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb') ?>

<main class="main">
    <section class="works-table">
        <div class="works-table__container">
            <h1 class="works-table__title">Works</h1>

            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;

            $args = array(
                'post_type' => 'works',
                'posts_per_page' => 4,
                'paged' => $paged,
            );
            $works_query = new WP_Query($args);
            ?>

            <?php if ($works_query->have_posts()): ?>
                <ul class="works-table__list">
                    <?php while ($works_query->have_posts()):
                        $works_query->the_post(); ?>
                        <li class="works-table__list-item">
                            <a href="<?php the_permalink(); ?>" class="works-table__list-link">
                                <div class="works-table__background">
                                    <img src="<?php echo esc_url(get_field('img')); ?>" alt=""
                                        class="works-table__background-img">
                                </div>
                                <p class="works-table__text"><?php echo esc_html(get_field('name')); ?></p>
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
                                'total' => $works_query->max_num_pages,
                                'current' => $paged,
                                'mid_size' => 1,
                                'type' => 'list',
                                'prev_next' => false,
                            ))
                        );
                        ?>

                        <li class="next-page">
                            <?php if ($paged < $works_query->max_num_pages): ?>
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