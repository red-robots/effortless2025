<?php
/**
 * The template for displaying all single sources & resources posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ACStarter
 */

// Use to be part of the members section
// wp_redirect(get_the_permalink(583));
// exit;
// get_header("login"); 

get_header();

?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'sources-resources' );


		endif; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
