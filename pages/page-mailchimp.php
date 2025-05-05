<?php
/**
 * Template Name: Mailchimp Embed
 */

get_header("simple"); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'mailchimp' );

            endif;
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer("simple");
