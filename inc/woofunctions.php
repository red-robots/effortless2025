<?php if(!function_exists('bella_add_customer_login_text')){
    add_action('woocommerce_login_form_start','bella_add_customer_login_text',0);
    function bella_add_customer_login_text(){
        echo 'You need to have a membership to access the member\'s section.
        To become a member, purchase your membership <a href="'.get_the_permalink(11).'">here</a>';
    }
};
if(!function_exists('bella_remove_hooks')){
    add_action('init','bella_remove_hooks', 10);
    function bella_remove_hooks(){
        remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper', 10);
        remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end', 10);
        remove_action('woocommerce_before_main_content','woocommerce_breadcrumb', 20);
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
        remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
        remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
        remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
        remove_action('woocommerce_before_shop_loop','woocommerce_catalog_ordering',30);
        remove_action( 'woocommerce_account_navigation', 'woocommerce_account_navigation',10 );
        if(class_exists('WC_Force_Sells')){
            $instance = WC_Force_Sells::get_instance();
            remove_action( 'woocommerce_after_add_to_cart_button', array( $instance, 'show_force_sell_products' ) );
        }
        if(class_exists('WC_Subscriptions_Cart')){
            remove_action( 'woocommerce_review_order_after_order_total', array('WC_Subscriptions_Cart' , 'display_recurring_totals') );
            remove_action( 'woocommerce_cart_totals_after_order_total', array('WC_Subscriptions_Cart' , 'display_recurring_totals') );
        }
    }
}
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_single_add_to_cart', 10 );

// Change number or products per row to 2
if (!function_exists('bella_loop_columns')) {
    add_filter('loop_shop_columns', 'bella_loop_columns');
	function bella_loop_columns() {
		return 2; // 2 products per row
	}
}

if(!function_exists('bella_change_image_shown')){
    add_filter( 'woocommerce_before_shop_loop_item_title', 'change_image_shown', 10 );
    function change_image_shown( $args ) {
        if ( has_post_thumbnail() ) {
            the_post_thumbnail( 'large' );
        } else {
            echo apply_filters( 'woocommerce_single_product_image_html', sprintf( '<img src="%s" alt="%s" />', wc_placeholder_img_src(), __( 'Placeholder', 'woocommerce' ) ), $product->post->ID );
        }
    }
}

add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_single_excerpt', 0 );

if(!function_exists('bella_add_template_header')){
    //add_action('woocommerce_before_shop_loop','bella_add_template_header', 0);
    function bella_add_template_header(){
        global $post;
        $post = get_post(632);
        setup_postdata($post);
        get_template_part("template-parts/content","template-header");
        wp_reset_postdata();
    }
}
if(!function_exists('bella_remove_x')){
    add_filter('woocommerce_cart_item_remove_link', 'bella_remove_x', 10, 2);
    function bella_remove_x($string, $cart_item_key) {
        $string = str_replace('class="remove"', '', $string);
        return str_replace('&times;', 'Remove', $string);
    }
}

if(!function_exists('bella_ajax_get_cart_count')){
    add_action( 'wp_ajax_bella_get_cart_count', 'bella_ajax_get_cart_count' );
    add_action( 'wp_ajax_nopriv_bella_get_cart_count', 'bella_ajax_get_cart_count' );
    function bella_ajax_get_cart_count() {
        $response    = array(
            'what'   => 'cart',
            'action' => 'get_cart_count',
            'data'   => WC()->cart->get_cart_contents_count(),
        );
        $xmlResponse = new WP_Ajax_Response( $response );
        $xmlResponse->send();
        die( 0 );
    }
}
if(!function_exists('bella_return_to_shop')){
    add_action('woocommerce_cart_collaterals','bella_return_to_shop');
    function bella_return_to_shop() {
        echo '<p class="return-to-shop"><a class="button wc-backward" href="' . 
        esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ).'">'.
         'Return to shop'.'</a></p>';
    }
}
if(!function_exists('bella_woocommerce_clear_cart_url')) {
	add_action('init', 'bella_woocommerce_clear_cart_url');
	function bella_woocommerce_clear_cart_url() {
		global $woocommerce;
		if( isset($_REQUEST['clear-cart']) ) {
			$woocommerce->cart->empty_cart();
		}
	}
}
if(!function_exists('bella_clear_cart')){
	add_action( 'bella_woocommerce_after_cart_table', 'bella_clear_cart',10);
	function bella_clear_cart() {
		echo '<form action="" method="post">';
		echo '<input type="submit" class="button" name="clear-cart" value="';
		echo _e("Clear Cart","woocommerce");
		echo '">';
		echo '</form>';
	}
}
if(!function_exists('bella_add_list_item_to_woo_account')){
    add_filter ( 'woocommerce_account_menu_items', 'bella_add_list_item_to_woo_account' );
    function bella_add_list_item_to_woo_account( $menu_links ){
    
        // we will hook "anyuniquetext123" later
        $new = array( 'bella_member_section' => 'Members Section' );
    
        // array_slice() is good when you want to add an element between the other ones
        $menu_links = array_slice( $menu_links, 0, 1, true ) 
        + $new 
        + array_slice( $menu_links, 1, NULL, true );
    
    
        return $menu_links;
    
    
    }
}
if(!function_exists('bella_add_woo_account_menu_hook')){
    add_filter( 'woocommerce_get_endpoint_url', 'bella_add_woo_account_menu_hook', 10, 4 );
    function bella_add_woo_account_menu_hook( $url, $endpoint, $value, $permalink ){
    
        if( $endpoint === 'bella_member_section' ) {
    
            // ok, here is the place for your custom URL, it could be external
            $url = get_permalink(1368);
    
        }
        return $url;
    
    }
}
if(!function_exists('bella_account_redirect')){
    function bella_account_redirect( $redirect, $user ) {
        if(isset($_GET['redirect_to'])){
            $redirect_to = $_GET['redirect_to'];
            return 'https://'.$_SERVER['HTTP_HOST'].$redirect_to;
        }
        return $redirect;
    }
    add_filter( 'woocommerce_login_redirect', 'bella_account_redirect', 1110, 2 );
}

if(!function_exists('bella_add_my_account_navigation')){ 
    add_action( 'woocommerce_account_navigation', 'bella_add_my_account_navigation',0 );
    function bella_add_my_account_navigation() {
        echo '<nav class="woocommerce-MyAccount-navigation">';
	        wp_nav_menu( array( 'theme_location' => 'myaccount' ) );
        echo "</nav>";
    }
}