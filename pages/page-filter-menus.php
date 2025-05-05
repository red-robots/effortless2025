<?php
/**
 * Template Name: Menus
 *
 */

if( !in_array( 'administrator', wp_get_current_user()->roles)&&!in_array( 'complimentary_membership', wp_get_current_user()->roles) ){
	$redirect_to = $_SERVER['REQUEST_URI'];
	wp_redirect(esc_url(add_query_arg( 'redirect_to', $redirect_to , get_permalink( get_option('woocommerce_myaccount_page_id')))));
	exit;
}
global $post_type;
global $tax;
global $from_tax;
$from_tax = 'from';
$tax = 'sub';
$post_type = array('menu');
get_header("login"); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', 'filter' );
			endif; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
