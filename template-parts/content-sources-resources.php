<?php
/**
 * Template part for displaying page content in single-recipe.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
global $bella_url;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-generic-single full-width-wrapper"); ?>>
    <aside class="column-1">
        <?php $bella_url = get_the_permalink(583);
        get_template_part( 'template-parts/content', 'terms-hidden' );?>
    </aside><!--.column-1-->
    <section class="column-2">
        <header>
            <h1><?php the_title();?></h1>
        </header>
        <div class="copy">
            <?php the_content();?>    
        </div><!--.directions-->
    </section><!--.column-2-->
    <aside class="column-3">
    </aside><!--.column-3-->
</article><!-- #post-## -->
