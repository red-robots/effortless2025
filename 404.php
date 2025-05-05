<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main " role="main">
            <?php $post = get_post(131);
            if($post):
                setup_postdata($post);?>
                <section class="error-404 full-width-wrapper">
                    <?php $image = get_field("template_header_image");
                    if ($image):?>
                        <header class="template-header row-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                            <h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></h1>
                        </header><!--.template-header-->
                    <?php endif; ?>
                    <div class="copy row-2">
                        <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'acstarter' ); ?></p>
                        <nav class="sitemap">
                            <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                        </nav>
                    </div><!-- .copy -->
                </section><!-- .error-404 -->
            <?php endif;//if post?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
