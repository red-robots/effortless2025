<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package ACStarter
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function acstarter_body_classes( $classes ) {
  global $post;
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

  if ( is_front_page() || is_home() ) {
    $classes[] = 'homepage';
  } else {
    $classes[] = 'subpage';
  }
  if(is_page() && $post) {
    $classes[] = $post->post_name;
  }

  $browsers = ['is_iphone', 'is_chrome', 'is_safari', 'is_NS4', 'is_opera', 'is_macIE', 'is_winIE', 'is_gecko', 'is_lynx', 'is_IE', 'is_edge'];
  $classes[] = join(' ', array_filter($browsers, function ($browser) {
      return $GLOBALS[$browser];
  }));

	return $classes;
}
add_filter( 'body_class', 'acstarter_body_classes' );


add_action('admin_enqueue_scripts', 'bellaworks_admin_style');
function bellaworks_admin_style() {
  wp_enqueue_style('admin-dashicons', get_template_directory_uri().'/css/dashicons.min.css');
  wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
}


function validate_email($email) {
  return (preg_match("/(@.*@)|(\.\.)|(@\.)|(\.@)|(^\.)/", $email) || !preg_match("/^.+\@(\[?)[a-zA-Z0-9\-\.]+\.([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/", $email)) ? false : true;
}

function extractYoutubeId($videoURL) {
  $youtubeId = '';
  if (strpos( strtolower($videoURL), 'youtube.com') !== false) {
    /* if iframe */
    if (strpos( strtolower($videoURL), 'youtube.com/embed') !== false) {
      $parts = extractURLFromString($videoURL);
      $youtubeId = basename($parts);
    } else {

      $parts = parse_url($videoURL);
      parse_str($parts['query'], $query);
      $youtubeId = (isset($query['v']) && $query['v']) ? $query['v']:''; 
      
    }
  } else if (strpos( strtolower($videoURL), 'youtu.be') !== false) {
    $parts = explode('https://youtu.be/', $videoURL);
    $parts2 = explode('?', $parts[1]);
    $youtubeId = $parts2[0];
  } 
  return $youtubeId;
}


function shortenText($string, $limit, $break=".", $pad="...") {
  // return with no change if string is shorter than $limit
  if(strlen($string) <= $limit) return $string;

  // is $break present between $limit and the end of the string?
  if(false !== ($breakpoint = strpos($string, $break, $limit))) {
    if($breakpoint < strlen($string) - 1) {
      $string = substr($string, 0, $breakpoint) . $pad;
    }
  }

  return $string;
}

function bella_acf_input_admin_footer() { ?>
<script type="text/javascript">
(function($) {
  acf.add_filter('color_picker_args', function( args, $field ){
    // do something to args
    args.palettes = ['#90b0ac','#776b65','#a9785f','#c5c5c5','#f7f7f7']
    return args;
  });
})(jQuery); 
</script>
<?php
}
add_action('acf/input/admin_footer', 'bella_acf_input_admin_footer');

// add new buttons
add_filter( 'mce_buttons', 'myplugin_register_buttons' );
function myplugin_register_buttons( $buttons ) {
  array_push( $buttons, 'edbutton1', 'cursive_heading');
  return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter( 'mce_external_plugins', 'myplugin_register_tinymce_javascript' );
function myplugin_register_tinymce_javascript( $plugin_array ) {
  $tinymceJs = get_stylesheet_directory_uri() . '/assets/js/custom-tinymce.js';
  $plugin_array['ctabutton'] = $tinymceJs;
  $plugin_array['cursive_heading_btn'] = $tinymceJs;
  return $plugin_array;
}
