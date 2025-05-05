<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

if(in_category(353)):
	if( !in_array( 'administrator', wp_get_current_user()->roles)&&!in_array( 'subscriber', wp_get_current_user()->roles) ):
		$redirect_to = $_SERVER['REQUEST_URI'];
		wp_redirect(esc_url(add_query_arg( 'redirect_to', $redirect_to , get_permalink( get_option('woocommerce_myaccount_page_id')))));
		exit;
	endif;
	get_header("login");
else:
	get_header();
endif; ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

		endif; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
if(in_category(353)):
	get_footer();
else:
	get_footer('blog');
endif;
