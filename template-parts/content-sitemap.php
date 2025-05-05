<?php
/**
 * The template for displaying content on page-sitemap.php.
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

            <article id="post-<?php the_ID(); ?>" <?php post_class("template-sitemap full-width-wrapper"); ?>>
                <?php $image = get_field("template_header_image");
                if ($image):?>
                    <header class="template-header row-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                        <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                        <h1><?php echo get_the_title(); ?></h1>
                    </header><!--.template-header-->
                <?php endif; ?>
                <div class="copy row-2">
                    <?php if(get_the_content()) the_content();?>
                    <nav class="sitemap">
                        <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                    </nav>
                </div><!-- .copy -->
            </article><!-- .error-404 -->

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();
