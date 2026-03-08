<?php get_header(); ?>

<?php get_template_part('template-parts/breadcrumb') ?>

<main class="main">
    <section class="contact-section">
        <div class="contact-section__container">
            <h1 class="contact-section__title">Contact</h1>
            <div class="contact-section__box">
                <?php echo do_shortcode('[contact-form-7 id="4880be3" title="お問い合わせ"]'); ?>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>