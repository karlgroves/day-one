<?php
    get_header();
?>
    <main id="main-content" tabindex="-1">
        <div class="header">
            <h1 class="entry-title" itemprop="name">
                <?php single_term_title(); ?>
            </h1>
            <div class="archive-meta" itemprop="description"><?php if ('' != the_archive_description()) {
                    echo esc_html(the_archive_description());
                } ?></div>
        </div>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <?php get_template_part('entry'); ?>
        <?php endwhile; endif; ?>
        <?php get_template_part('nav', 'below'); ?>
    </main>
<?php
get_sidebar();
?>

<?php
get_footer();
?>
