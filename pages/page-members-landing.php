<?php
/**
 * Template Name: Members Landing
 */
if( !in_array( 'administrator', wp_get_current_user()->roles)&&!in_array( 'complimentary_membership', wp_get_current_user()->roles) ){
	$redirect_to = $_SERVER['REQUEST_URI'];
	wp_redirect(esc_url(add_query_arg( 'redirect_to', $redirect_to , get_permalink( get_option('woocommerce_myaccount_page_id')))));
	exit;
}
get_header("login"); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'members-landing' );

            endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
