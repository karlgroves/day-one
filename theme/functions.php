<?php
add_action('wp_enqueue_script', 'dayone_load_jquery');
function dayone_load_jquery(){
  wp_enqueue_script('jquery');
}

add_action('after_setup_theme', 'dayone_setup');
function dayone_setup(){
  load_theme_textdomain('dayone', get_template_directory() . '/languages');
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('responsive-embeds');
  add_theme_support('automatic-feed-links');
  add_theme_support('html5', array('search-form'));
  add_theme_support('woocommerce');
  global $content_width;
  if (null === $content_width) {
    $content_width = 1920;
  }
  register_nav_menus(array('main-menu' => esc_html__('Main Menu', 'dayone')));
}

add_action('wp_enqueue_scripts', 'dayone_enqueue');
function dayone_enqueue(){
  wp_enqueue_style('dayone-style', get_stylesheet_uri());
}

add_filter('document_title_separator', 'dayone_document_title_separator');
function dayone_document_title_separator(){
  return '|';
}

add_filter('the_title', 'dayone_title');
function dayone_title($title = ''){
  if ($title === '') {
    return 'Untitled';
  } else {
    return $title;
  }
}

add_filter('nav_menu_link_attributes', 'dayone_schema_url', 10);
function dayone_schema_url($atts){
  $atts['itemprop'] = 'url';
  return $atts;
}

if (!function_exists('dayone_wp_body_open')) {
  function dayone_wp_body_open()
  {
    do_action('wp_body_open');
  }
}

add_action('wp_body_open', 'dayone_skip_link', 5);
function dayone_skip_link(){
  echo '<a href="#main-content" class="skip-link">' . esc_html__('Skip to content', 'dayone') . '</a>';
}

add_filter('the_content_more_link', 'dayone_read_more_link');
function dayone_read_more_link(){
  if (!is_admin()) {
    return ' <a href="' . esc_url(get_permalink()) . '" class="more-link">' . sprintf(__('...%s', 'dayone'), '<span class="sr-only">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
  }
}

add_filter('excerpt_more', 'dayone_excerpt_read_more_link');
function dayone_excerpt_read_more_link($more){
  if (!is_admin()) {
    global $post;
    return ' <a href="' . esc_url(get_permalink($post->ID)) . '" class="more-link">' . sprintf(__('...%s', 'dayone'), '<span class="sr-only">  ' . esc_html(get_the_title()) . '</span>') . '</a>';
  }
}

add_filter('big_image_size_threshold', '__return_false');
add_filter('intermediate_image_sizes_advanced', 'dayone_image_insert_override');
function dayone_image_insert_override($sizes){
  unset($sizes['medium_large']);
  unset($sizes['1536x1536']);
  unset($sizes['2048x2048']);
  return $sizes;
}

add_action('widgets_init', 'dayone_widgets_init');
function dayone_widgets_init(){
  register_sidebar(array(
    'name' => esc_html__('Sidebar Widget Area', 'dayone'),
    'id' => 'primary-widget-area',
    'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
    'after_widget' => '</li>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ));
}

add_action('wp_head', 'dayone_pingback_header');
function dayone_pingback_header(){
  if (is_singular() && pings_open()) {
    printf('<link rel="pingback" href="%s" />' . "\n", esc_url(get_bloginfo('pingback_url')));
  }
}

add_action('comment_form_before', 'dayone_enqueue_comment_reply_script');
function dayone_enqueue_comment_reply_script(){
  if (get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

function dayone_custom_pings($comment){
  ?>
  <li <?php comment_class(); ?>
    id="li-comment-<?php comment_ID(); ?>"><?php echo esc_url(comment_author_link()); ?></li>
  <?php
}

add_filter('get_comments_number', 'dayone_comment_count', 0);
function dayone_comment_count($count){
  if (!is_admin()) {
    global $id;
    $get_comments = get_comments('status=approve&post_id=' . $id);
    $comments_by_type = separate_comments($get_comments);
    return count($comments_by_type['comment']);
  } else {
    return $count;
  }
}
