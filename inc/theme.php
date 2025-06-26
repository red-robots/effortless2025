<?php
/**
 * Custom theme functions.
 *
 * 
 *
 * @package ACStarter
 */

// function SearchFilter($query) {
//     if ($query->is_search) {
//         $query->set('post_type', 'post');
//     }
//     return $query;
// }
// add_filter('pre_get_posts','SearchFilter');


add_filter('woocommerce_save_account_details_required_fields', 'wc_save_account_details_required_fields' );
function wc_save_account_details_required_fields( $required_fields ){
    unset( $required_fields['account_display_name'] );
    return $required_fields;
}

 /*-------------------------------------
  Move Yoast to the Bottom
---------------------------------------*/
function yoasttobottom() {
  return 'low';
}
add_filter( 'wpseo_metabox_prio', 'yoasttobottom');
/*-------------------------------------
	Custom client login, link and title.
---------------------------------------*/
function my_login_logo() { ?>
<style type="text/css">
  body.login div#login h1 a {
  	background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png);
  	background-size: 100% auto;
  	width: 327px;
  	height: 91px;
  }
</style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );

// Change Link
function loginpage_custom_link() {
	return the_permalink();
}
add_filter('login_headerurl','loginpage_custom_link');
/*-------------------------------------
	Font Awesome
---------------------------------------*/
function mytheme_fontawesome() {
    echo '<script src="https://use.fontawesome.com/4945cee666.js"></script>';
}
add_action('wp_head', 'mytheme_fontawesome');
/*-------------------------------------
	Favicon.
---------------------------------------*/
function mytheme_favicon() { 
 echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_template_directory_uri().'/images/favicons/apple-touch-icon.png">
 <link rel="icon" type="image/png" sizes="32x32" href="'.get_template_directory_uri().'/images/favicons/favicon-32x32.png">
 <link rel="icon" type="image/png" sizes="16x16" href="'.get_template_directory_uri().'/images/favicons/favicon-16x16.png">
 <link rel="manifest" href="'.get_template_directory_uri().'/images/favicons/manifest.json">
 <link rel="mask-icon" href="'.get_template_directory_uri().'/images/favicons/safari-pinned-tab.svg" color="#5bbad5">
 <link rel="shortcut icon" href="'.get_template_directory_uri().'/images/favicons/favicon.ico">
 <meta name="msapplication-config" content="'.get_template_directory_uri().'/images/favicons/browserconfig.xml">
 <meta name="theme-color" content="#ffffff">'; 
} 
add_action('wp_head', 'mytheme_favicon');

/*-------------------------------------
	Adds Options page for ACF.
---------------------------------------*/
add_action('acf/init', function() {
  if( function_exists('acf_add_options_page') ) {acf_add_options_page();}
});

/*-------------------------------------
  Hide Front End Admin Menu Bar
---------------------------------------*/
if ( ! current_user_can( 'manage_options' ) ) {
    show_admin_bar( false );
}
/*-------------------------------------
  Custom WYSIWYG Styles

  If you are using the Plugin: MRW Web Design Simple TinyMCE

  Keep this commented out to keep from getting duplicate "Format" dropdowns

---------------------------------------*/
// function acc_custom_styles($buttons) {
//   array_unshift($buttons, 'styleselect');
//   return $buttons;
// }
// add_filter('mce_buttons_2', 'acc_custom_styles');


/*
* Callback function to filter the MCE settings


  But always use this to get the custom formats

*/
 
function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
  $style_formats = array(  
    // Each array child is a format with it's own settings
    array(  
      'title' => 'Custom Color',  
      'block' => 'span',  
      'classes' => 'custom-color',
      'wrapper' => true,
      
    )
  );  
  // Insert the array, JSON ENCODED, into 'style_formats'
  $init_array['style_formats'] = json_encode( $style_formats );  
  
  return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 
// Add styles to WYSIWYG in your theme's editor-style.css file
function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
/*-------------------------------------
  Change Admin Labels
---------------------------------------*/
function change_post_menu_label() {
    global $menu;
    global $submenu;
    $menu[5][0] = 'News';
    $submenu['edit.php'][5][0] = 'News';
    $submenu['edit.php'][10][0] = 'Add News Item';
    //$submenu['edit.php'][15][0] = 'Status'; // Change name for categories
    //$submenu['edit.php'][16][0] = 'Labels'; // Change name for tags
    echo '';
}

function change_post_object_label() {
        global $wp_post_types;
        $labels = &$wp_post_types['post']->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News Item';
        $labels->add_new = 'Add News Item';
        $labels->add_new_item = 'Add News Item';
        $labels->edit_item = 'Edit News Item';
        $labels->new_item = 'News Item';
        $labels->view_item = 'View News Item';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
    }
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

/*-------------------------------------
  Add a last and first menu class option
---------------------------------------*/

function ac_first_and_last_menu_class($items) {
  foreach($items as $k => $v){
    $parent[$v->menu_item_parent][] = $v;
  }
  foreach($parent as $k => $v){
    $v[0]->classes[] = 'first';
    $v[count($v)-1]->classes[] = 'last';
  }
  return $items;
}
add_filter('wp_nav_menu_objects', 'ac_first_and_last_menu_class');

function get_template_part_string($start,$end){
  ob_start();
  get_template_part($start,$end);
  return ob_get_clean();
}

/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function my_login_redirect( $redirect_to, $user ) {
	//is there a user to check?
	if ( isset( $user->roles ) && is_array( $user->roles ) ) {
		if (in_array( 'subscriber', $user->roles )) {
		    return get_the_permalink(1368);
		} else {
			return $redirect_to;
		}
	} else {
		return $redirect_to;
	}
}
add_filter( 'woocommerce_login_redirect', 'my_login_redirect', 10, 2 );