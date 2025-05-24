<?php 
/* Custom Post Types */
add_action('init', 'js_custom_init');
function js_custom_init() {
  $post_types = array(
    array(
      'post_type' => 'menu',
      'menu_name' => 'Menus',
      'plural'    => 'Menus',
      'single'    => 'Menu',
      'menu_icon' => 'dashicons-editor-table',
      'menu_position' => 20,
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'recipe',
      'menu_name' => 'Recipes',
      'plural'    => 'Recipes',
      'single'    => 'Recipe',
      'menu_icon' => 'dashicons-book',
      'menu_position' => 20,
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'tips-quips',
      'menu_name' => 'Tips & Quips',
      'plural'    => 'Tips & Quips',
      'single'    => 'Tip or Quip',
      'menu_icon' => 'dashicons-editor-help',
      'menu_position' => 20,
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'style-points',
      'menu_name' => 'Style Points',
      'plural'    => 'Style Points',
      'single'    => 'Style Point',
      'menu_position' => 20,
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'sources-resources',
      'menu_name' => 'Sources & Resources',
      'plural'    => 'Sources & Resources',
      'single'    => 'Source or Resource',
      'menu_icon' => 'dashicons-admin-links',
      'menu_position' => 20,
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'testimonial',
      'menu_name' => 'Testimonials',
      'plural'    => 'Testimonials',
      'single'    => 'Testimonial',
      'menu_icon' => 'dashicons-format-quote',
      'menu_position' => 20,
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
  );

  if($post_types) {
    foreach ($post_types as $p) {
      $p_type = ( isset($p['post_type']) && $p['post_type'] ) ? $p['post_type'] : ""; 
      $single_name = ( isset($p['single']) && $p['single'] ) ? $p['single'] : "Custom Post"; 
      $plural_name = ( isset($p['plural']) && $p['plural'] ) ? $p['plural'] : "Custom Post"; 
      $menu_name = ( isset($p['menu_name']) && $p['menu_name'] ) ? $p['menu_name'] : $p['plural']; 
      $menu_icon = ( isset($p['menu_icon']) && $p['menu_icon'] ) ? $p['menu_icon'] : "dashicons-admin-post"; 
      $supports = ( isset($p['supports']) && $p['supports'] ) ? $p['supports'] : array('title','editor','custom-fields','thumbnail'); 
      $taxonomies = ( isset($p['taxonomies']) && $p['taxonomies'] ) ? $p['taxonomies'] : array(); 
      $parent_item_colon = ( isset($p['parent_item_colon']) && $p['parent_item_colon'] ) ? $p['parent_item_colon'] : ""; 
      $menu_position = ( isset($p['menu_position']) && $p['menu_position'] ) ? $p['menu_position'] : 20; 
      if($p_type) {
        $labels = array(
          'name' => _x($plural_name, 'post type general name'),
          'singular_name' => _x($single_name, 'post type singular name'),
          'add_new' => _x('Add New', $single_name),
          'add_new_item' => __('Add New ' . $single_name),
          'edit_item' => __('Edit ' . $single_name),
          'new_item' => __('New ' . $single_name),
          'view_item' => __('View ' . $single_name),
          'search_items' => __('Search ' . $plural_name),
          'not_found' =>  __('No ' . $plural_name . ' found'),
          'not_found_in_trash' => __('No ' . $plural_name . ' found in Trash'), 
          'parent_item_colon' => $parent_item_colon,
          'menu_name' => $menu_name
        );
    
    
        $args = array(
          'labels' => $labels,
          'public' => true,
          'publicly_queryable' => true,
          'show_ui' => true, 
          'show_in_menu' => true, 
          'show_in_rest' => true,
          'query_var' => true,
          'rewrite' => true,
          'capability_type' => 'post',
          'has_archive' => false, 
          'hierarchical' => false, // 'false' acts like posts 'true' acts like pages
          'menu_position' => $menu_position,
          'menu_icon'=> $menu_icon,
          'supports' => $supports
        ); 
        
        register_post_type($p_type,$args); // name used in query
      }
    }
  }
}


/* Custom Taxonomies     */
function build_taxonomies() {
// custom tax
    register_taxonomy( 'from', array('menu'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'From',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'menu-from' ),
			'_builtin' => true
    ) );
    register_taxonomy( 'cpt-tag',array('menu','recipe','sources-resources','tips-quips','style-points'), 
    array( 
      'hierarchical' => false, // true = acts like categories false = acts like tags
      'label' => 'Tags',
      'query_var' => true,
      'show_admin_column' => true,
      'public' => true,
      'rewrite' => true,
      '_builtin' => true
    ) );
    register_taxonomy( 'from-5', array('recipe'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'From',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'recipe-from' ),
			'_builtin' => true
    ) );
    
    register_taxonomy( 'from-2', array('sources-resources'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'From',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'sources-resources-from' ),
			'_builtin' => true
    ) );
    
    register_taxonomy( 'from-3', array('tips-quips'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'From',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'tips-quips-from' ),
			'_builtin' => true
    ) );
    
    register_taxonomy( 'from-4', array('style-points'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'From',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'style-points-from' ),
			'_builtin' => true
    ) );
    register_taxonomy( 'sub', array('menu'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Sub',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'menu-sub' ),
			'_builtin' => true
		) );
    register_taxonomy( 'sub-5', array('recipe'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Sub',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'recipe-sub' ),
			'_builtin' => true
		) );
    register_taxonomy( 'sub-2', array('sources-resources'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Sub',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'sources-resources-sub' ),
			'_builtin' => true
		) );
    register_taxonomy( 'sub-3', array('tips-quips'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Sub',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'tips-quips-sub' ),
			'_builtin' => true
		) );
    register_taxonomy( 'sub-4', array('style-points'),
		array(
			'hierarchical' => true, // true = acts like categories false = acts like tags
			'label' => 'Sub',
			'query_var' => true,
			'show_admin_column' => true,
			'public' => true,
			'rewrite' => array( 'slug' => 'style-points-sub' ),
			'_builtin' => true
		) );
} // End build taxonomies
add_action( 'init', 'build_taxonomies', 0 );



/*
Taxonomy Custom Column
manage_edit-$taxonomy_columns filter.
*/
add_filter("manage_edit-category_columns", 'theme_columns'); 
function theme_columns($theme_columns) {
    $new_columns = array(
        'cb' => '<input type="checkbox" />',
        'name' => __('Name'),
        'tax_image' => __('Image'),
//      'description' => __('Description'),
        'slug' => __('Slug'),
        'posts' => __('Posts')
        );
    return $new_columns;
}


add_filter("manage_category_custom_column", 'manage_theme_columns', 10, 3);
function manage_theme_columns($out, $column_name, $theme_id) {
    $theme = get_term($theme_id, 'category');
    switch ($column_name) {
        case 'tax_image': 
            $photo = get_field('category_image',$theme); 
            $out = '<span class="tmphoto" style="display:inline-block;width:50px;height:50px;background:#e2e1e1;text-align:center;">';
            if($photo) {
                $out .= '<span style="display:block;width:100%;height:100%;background:url('.$photo['url'].');background-size:cover;background-position:center"></span>';
            } else {
                $out .= '<i class="dashicons dashicons-camera" style="font-size:33px;position:relative;top:8px;left:-6px;opacity:0.3;"></i>';
            }
            $out .= '</span>';
            break;
 
        default:
            break;
    }
    return $out;    
}

