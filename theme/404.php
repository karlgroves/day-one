<?php
get_header();
?>
    <main id="main-content" tabindex="-1">
        <div id="post-0" class="post not-found">
            <div class="header">
                <h1 class="entry-title" itemprop="name">
                    <?php
                        esc_html_e('Not Found', 'dayone');
                    ?>
                </h1>
            </div>
            <div class="entry-content" itemprop="mainContentOfPage">
                <p><?php esc_html_e('Nothing found for the requested page. Try a search instead?', 'dayone'); ?></p>
                <?php get_search_form(); ?>
            </div>
        </div>
    </main>
<?php
get_sidebar();
?>

<?php
get_footer();
?>
