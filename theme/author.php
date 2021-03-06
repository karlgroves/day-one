<?php
get_header();
?>
    <main id="main-content" tabindex="-1">
        <div class="header">
            <?php the_post(); ?>
            <h1 class="entry-title author" itemprop="name"><?php the_author_link(); ?></h1>
            <div class="archive-meta" itemprop="description"><?php if ('' != get_the_author_meta('user_description')) {
                    echo esc_html(get_the_author_meta('user_description'));
                } ?></div>
            <?php rewind_posts(); ?>
        </div>

        <?php while (have_posts()) : the_post(); ?>
            <?php get_template_part('entry'); ?>
        <?php endwhile; ?>
        <?php get_template_part('nav', 'below'); ?>
    </main>
<?php
get_sidebar();
?>
<?php
get_footer();
?>
