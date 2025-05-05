<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-one-column full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2 clear-bottom">
        <?php if (get_the_content()): ?>
            <div class="wrapper copy">
                <?php the_content(); ?>
            </div><!--.wrapper-->
        <?php endif; ?>
    </section><!--.row-2-->
</article><!-- #post-## -->
