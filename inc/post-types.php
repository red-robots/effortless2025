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
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'recipe',
      'menu_name' => 'Recipes',
      'plural'    => 'Recipes',
      'single'    => 'Recipe',
      'menu_icon' => 'dashicons-book',
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'tips-quips',
      'menu_name' => 'Tips & Quips',
      'plural'    => 'Tips & Quips',
      'single'    => 'Tip or Quip',
      'menu_icon' => 'dashicons-editor-help',
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'style-points',
      'menu_name' => 'Style Points',
      'plural'    => 'Style Points',
      'single'    => 'Style Point',
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'sources-resources',
      'menu_name' => 'Sources & Resources',
      'plural'    => 'Sources & Resources',
      'single'    => 'Source or Resource',
      'menu_icon' => 'dashicons-admin-links',
      'supports'  => array('title','editor','custom-fields','thumbnail')
    ),
    array(
      'post_type' => 'testimonial',
      'menu_name' => 'Testimonials',
      'plural'    => 'Testimonials',
      'single'    => 'Testimonial',
      'menu_icon' => 'dashicons-format-quote',
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
add_action( 'init', 'build_taxonomies', 0 ); 
function build_taxonomies() {
  $post_types = array(
    array(
      'post_type' => array('menu'),
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from',
      'rewrite'   => 'menu-from'
    ),
    array(
      'post_type' => array('menu','recipe','sources-resources','tips-quips','style-points'),
      'menu_name' => 'Tags',
      'plural'    => 'Tags',
      'single'    => 'Tag',
      'taxonomy'  => 'cpt-tag',
      'rewrite'   => true,
      'hierarchical'  => false, /* true = acts like categories | false = acts like tags */
    ),
    array(
      'post_type' => array('recipe'),
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-5',
      'rewrite'   => 'recipe-from',
    ),
    array(
      'post_type' => array('sources-resources'),
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-2',
      'rewrite'   => 'sources-resources-from',
    ),
    array(
      'post_type' => array('tips-quips'),
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-3',
      'rewrite'   => 'tips-quips-from',
    ),
    array(
      'post_type' => array('style-points'),
      'menu_name' => 'From',
      'plural'    => 'From',
      'single'    => 'From',
      'taxonomy'  => 'from-4',
      'rewrite'   => 'style-points-from',
    ),
    array(
      'post_type' => array('menu'),
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub',
      'rewrite'   => 'menu-sub',
    ),
    array(
      'post_type' => array('recipe'),
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-5',
      'rewrite'   => 'recipe-sub',
    ),
    array(
      'post_type' => array('sources-resources'),
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-2',
      'rewrite'   => 'sources-resources-sub',
    ),
    array(
      'post_type' => array('sources-resources'),
      'menu_name' => 'SR Categories',
      'plural'    => 'SR Categories',
      'single'    => 'SR Category',
      'taxonomy'  => 'sources-resources-category',
      'rewrite'   => 'sources-resources-categories',
    ),
    array(
      'post_type' => array('tips-quips'),
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-3',
      'rewrite'   => 'tips-quips-sub',
    ),
    array(
      'post_type' => array('style-points'),
      'menu_name' => 'Sub',
      'plural'    => 'Sub',
      'single'    => 'Sub',
      'taxonomy'  => 'sub-4',
      'rewrite'   => 'style-points-sub',
    )
  );

  if($post_types) {
    foreach($post_types as $p) {
      $p_type = ( isset($p['post_type']) && $p['post_type'] ) ? $p['post_type'] : ""; 
      $single_name = ( isset($p['single']) && $p['single'] ) ? $p['single'] : "Custom Post"; 
      $plural_name = ( isset($p['plural']) && $p['plural'] ) ? $p['plural'] : "Custom Post"; 
      $menu_name = ( isset($p['menu_name']) && $p['menu_name'] ) ? $p['menu_name'] : $p['plural'];
      $taxonomy = ( isset($p['taxonomy']) && $p['taxonomy'] ) ? $p['taxonomy'] : "";
      $rewrite = ( isset($p['rewrite']) && $p['rewrite'] ) ? $p['rewrite'] : $taxonomy;
      $query_var = ( isset($p['query_var']) ) ? $p['query_var'] : true;
      $hierarchical = ( isset($p['hierarchical']) ) ? $p['hierarchical'] : true;
      $show_admin_column = ( isset($p['show_admin_column']) ) ? $p['show_admin_column'] : true;
      $default_term = ( isset($p['default_term']) ) ? $p['default_term'] : '';

      $labels = array(
        'name' => _x( $menu_name, 'taxonomy general name' ),
        'singular_name' => _x( $single_name, 'taxonomy singular name' ),
        'search_items' =>  __( 'Search ' . $plural_name ),
        'popular_items' => __( 'Popular ' . $plural_name ),
        'all_items' => __( 'All ' . $plural_name ),
        'parent_item' => __( 'Parent ' .  $single_name),
        'parent_item_colon' => __( 'Parent ' . $single_name . ':' ),
        'edit_item' => __( 'Edit ' . $single_name ),
        'update_item' => __( 'Update ' . $single_name ),
        'add_new_item' => __( 'Add New ' . $single_name ),
        'new_item_name' => __( 'New ' . $single_name ),
      );

      if($default_term) {

        register_taxonomy($taxonomy, $p_type, array(
          'hierarchical' => $hierarchical,
          'labels' => $labels,
          'show_admin_column' => $show_admin_column,
          'query_var' => $query_var,
          'show_ui' => true,
          'show_in_rest' => true,
          'public' => true,
          '_builtin' => true,
          'default_term' => array( 'name' => $default_term['name'], 'slug' => $default_term['slug'] ),
          'rewrite' => array( 'slug' => $rewrite ),
        ));

      } else {
        register_taxonomy($taxonomy, $p_type, array(
          'hierarchical' => true,
          'labels' => $labels,
          'show_admin_column' => $show_admin_column,
          'query_var' => $query_var,
          'show_ui' => true,
          'show_in_rest' => true,
          'public' => true,
          '_builtin' => true,
          'rewrite' => array( 'slug' => $rewrite ),
        ));
      }

    }
  }
}



/*
Taxonomy Custom Column
manage_edit-$taxonomy_columns filter.
*/

add_action('init', 'category_data_init');
function category_data_init() {
  global $category_args;
  $category_args[] = array(
    'taxonomy'=>'category',
    'columns'=> array(
      'cb' => '<input type="checkbox" />',
      'name' => __('Name'),
      'tax_image' => __('Image'),
      'slug' => __('Slug'),
      'posts' => __('Posts')
    ) 
  );
  $category_args[] = array(
    'taxonomy'=>'sources-resources-category',
    'columns'=> array(
      'cb' => '<input type="checkbox" />',
      'name' => __('Name'),
      'tax_image' => __('Image'),
      'slug' => __('Slug'),
      'posts' => __('Posts')
    ) 
  );

  foreach($category_args as $k=>$c) {
    $index = $k+1;
    $taxonomy = $c['taxonomy'];
    $filter = "manage_edit-".$taxonomy."_columns";
    $columns = $c['columns'];
    add_filter($filter, function(){
      global $category_args;
      foreach($category_args as $cc) {
        return $cc['columns'];
      }
    }); 

    add_filter("manage_".$taxonomy."_custom_column", function($out, $column_name, $theme_id){
      global $category_args;
      foreach($category_args as $cc) {
        $taxonomy = $cc['taxonomy'];
        switch ($column_name) {
          case 'tax_image': 
              $photo = get_field('category_image', $taxonomy . '_' . $theme_id);
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
    }, 10, 3);
  }

}


//add_filter("manage_edit-category_columns", 'theme_columns'); 
// function theme_columns($theme_columns) {
//   $new_columns = array(
//     'cb' => '<input type="checkbox" />',
//     'name' => __('Name'),
//     'tax_image' => __('Image'),
//     //      'description' => __('Description'),
//     'slug' => __('Slug'),
//     'posts' => __('Posts')
//   );
//   return $new_columns;
// }


// add_filter("manage_category_custom_column", 'manage_theme_columns', 10, 3);
// function manage_theme_columns($out, $column_name, $theme_id) {
//     $theme = get_term($theme_id, 'category');
//     switch ($column_name) {
//         case 'tax_image': 
//             $photo = get_field('category_image',$theme); 
//             $out = '<span class="tmphoto" style="display:inline-block;width:50px;height:50px;background:#e2e1e1;text-align:center;">';
//             if($photo) {
//                 $out .= '<span style="display:block;width:100%;height:100%;background:url('.$photo['url'].');background-size:cover;background-position:center"></span>';
//             } else {
//                 $out .= '<i class="dashicons dashicons-camera" style="font-size:33px;position:relative;top:8px;left:-6px;opacity:0.3;"></i>';
//             }
//             $out .= '</span>';
//             break;
 
//         default:
//             break;
//     }
//     return $out;    
// }

