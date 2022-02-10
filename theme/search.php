<?php
get_header();
?>
    <main id="main-content" tabindex="-1">
        <?php if (have_posts()) : ?>
            <div class="header">
                <h1 class="entry-title"
                    itemprop="name"><?php printf(esc_html__('Search Results for: %s', 'dayone'), get_search_query()); ?></h1>
            </div>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('entry'); ?>
            <?php endwhile; ?>
            <?php get_template_part('nav', 'below'); ?>
        <?php else : ?>
            <article id="post-0" class="post no-results not-found">
                <div class="header">
                    <h1 class="entry-title" itemprop="name"><?php esc_html_e('Nothing Found', 'dayone'); ?></h1>
                </div>
                <div class="entry-content" itemprop="mainContentOfPage">
                    <p><?php esc_html_e('Sorry, nothing matched your search. Please try again.', 'dayone'); ?></p>
                    <?php get_search_form(); ?>
                </div>
            </article>
        <?php endif; ?>
    </main>
<?php
get_sidebar();
?>
<?php
get_footer();
?>
