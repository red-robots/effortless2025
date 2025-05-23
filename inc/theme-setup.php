<?php 
if ( ! function_exists( 'acstarter_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

add_action( 'init', 'acstarter_load_textdomain' );
function acstarter_load_textdomain() {
  load_theme_textdomain( 'acstarter', get_template_directory() . '/languages' );
}

function acstarter_setup() {
  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on ACStarter, use a find and replace
   * to change 'acstarter' to the name of your theme in all the template files.
   */
  //load_theme_textdomain( 'acstarter', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
   */
  add_theme_support( 'post-thumbnails' );

  // This theme uses wp_nav_menu() in one location.
  register_nav_menus( array(
    'primary' => esc_html__( 'Primary', 'acstarter' ),
    'sitemap' => esc_html__( 'Sitemap', 'acstarter' ),
    'sitemapbw' => esc_html__( 'Sitemap BW', 'acstarter' ),
    'account' => esc_html__( 'Account', 'acstarter' ),
    'footer' => esc_html__( 'Footer', 'acstarter' ),
    'login' => esc_html__( 'Login', 'acstarter' ),
    'myaccount' => esc_html__( 'My Account', 'acstarter' ),
  ) );

  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ) );

  /*
   * Enable support for Post Formats.
   * See https://developer.wordpress.org/themes/functionality/post-formats/
   */
  // add_theme_support( 'post-formats', array(
  //  'aside',
  //  'image',
  //  'video',
  //  'quote',
  //  'link',
  // ) );

  // Set up the WordPress core custom background feature.
  add_theme_support( 'custom-background', apply_filters( 'acstarter_custom_background_args', array(
    'default-color' => 'ffffff',
    'default-image' => '',
  ) ) );
}
endif;
add_action( 'after_setup_theme', 'acstarter_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function acstarter_content_width() {
  $GLOBALS['content_width'] = apply_filters( 'acstarter_content_width', 640 );
}
add_action( 'after_setup_theme', 'acstarter_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function acstarter_widgets_init() {
  register_sidebar( array(
    'name'          => esc_html__( 'Sidebar', 'acstarter' ),
    'id'            => 'sidebar-1',
    'description'   => '',
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );
}
add_action( 'widgets_init', 'acstarter_widgets_init' );

/** from codex
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 */
function wpdocs_excerpt_more( $more ) {
  return sprintf( '...<br><br><a class="read-more" href="%1$s">%2$s<span>%3$s</span></a>',
      get_permalink( get_the_ID() ),
      'Read More',
      '>'
  );
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );