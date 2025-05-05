<?php
/**
 * Enqueue scripts and styles.
 */
function acstarter_scripts() {
	wp_enqueue_style( 'acstarter-style', get_stylesheet_uri(), array(), '0123' );
  wp_enqueue_style( 'swiper', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', array(), '11.2.6' );

	if (!wp_script_is( 'jquery', 'enqueued' )) {
    wp_enqueue_script( 'jquery' );
  }

  wp_enqueue_script( 
  	'acstarter-blocks', 
  	get_template_directory_uri() . '/assets/js/vendors.js', 
  	array('jquery'), '20120206', 
  	true 
  );

  wp_enqueue_script( 
    'swiper', 
    'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', 
    array('jquery'), '11.2.6', 
    true 
  );

	wp_enqueue_script( 
			'acstarter-custom', 
			get_template_directory_uri() . '/assets/js/custom.js', 
			array('acstarter-blocks','jquery'), '20120206', 
			true 
		);
	wp_localize_script( 'acstarter-custom', 'bellaajaxurl', array(
		'url' => admin_url( 'admin-ajax.php' )
	));
	wp_enqueue_script( 
		'font-awesome', 
		'https://use.fontawesome.com/8f931eabc1.js', 
		array(), '20120206', 
		true 
	);
	// wp_enqueue_script( 
	// 		'acstarter-flexslider', 
	// 		get_template_directory_uri() . '/js/flexslider.js', 
	// 		array(), '20120206', 
	// 		true 
	// 	);

	// wp_enqueue_script( 
	// 		'acstarter-colorbox', 
	// 		get_template_directory_uri() . '/js/colorbox.js', 
	// 		array(), '20120206', 
	// 		true 
	// 	);

	// wp_enqueue_script( 
	// 		'acstarter-isotope', 
	// 		get_template_directory_uri() . '/js/isotope.js', 
	// 		array(), '20120206', 
	// 		true 
	// 	);

	// wp_enqueue_script( 
	// 		'acstarter-images-loaded', 
	// 		get_template_directory_uri() . '/js/images-loaded.js', 
	// 		array(), '20120206', 
	// 		true 
	// 	);


	// wp_enqueue_script( 
	// 		'acstarter-navigation', 
	// 		get_template_directory_uri() . '/js/navigation.js', 
	// 		array(), '20120206', 
	// 		true 
	// 	);

	// wp_enqueue_script( 
	// 		'nicescroll', 
	// 		get_template_directory_uri() . '/js/nicescroll.min.js', 
	// 		array(), '20120206', 
	// 		true 
	// 	);

	// wp_enqueue_script( 
	// 		'wow', 
	// 		get_template_directory_uri() . '/js/wow.js', 
	// 		array(), '20130115', 
	// 		true 
	// 	);

	// wp_enqueue_script( 
	// 		'acstarter-skip-link-focus-fix', 
	// 		get_template_directory_uri() . '/js/skip-link-focus-fix.js', 
	// 		array(), '20130115', 
	// 		true 
	// 	);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'acstarter_scripts' );


// add new buttons
add_filter( 'mce_buttons', 'myplugin_register_buttons' );
function myplugin_register_buttons( $buttons ) {
  array_push( $buttons, 'edbutton1');
  return $buttons;
}
 
// Load the TinyMCE plugin : editor_plugin.js (wp2.5)
add_filter( 'mce_external_plugins', 'myplugin_register_tinymce_javascript' );
function myplugin_register_tinymce_javascript( $plugin_array ) {
  $plugin_array['ctabutton'] = get_stylesheet_directory_uri() . '/assets/js/custom/custom-tinymce.js';
  return $plugin_array;
}
