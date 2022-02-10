<?php $args = array(
    'prev_text' => sprintf(esc_html__('%s older', 'dayone'), '<span class="meta-nav previous">&nbsp;</span>'),
    'next_text' => sprintf(esc_html__('newer %s', 'dayone'), '<span class="meta-nav next">&nbsp;</span>')
);
the_posts_navigation($args);