<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-archive full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header-category");?>
    <section class="row-2 clear-bottom">
        <?php if (have_posts()): ?>
            <div class="column-1">
                <div class="wrapper copy">
                    <ul>
                        <?php while(have_posts()): the_post();?>
                            <li><a href="<?php echo get_the_permalink();?>"><?php the_title();?></a></li>
                        <?php endwhile;?>
                    </ul>
                </div><!--.wrapper-->
                <?php pagi_posts_nav_no_query()?>
            </div><!--.column-2-->
        <?php endif; ?>
        <?php $watermark = get_field("row_2_watermark",15);?>
        <aside class="column-2 blockquote">
            <div class="outer-wrapper">
                <div class="inner-wrapper" <?php if($watermark) echo 'style="background-image: url('. $watermark['url'].');"';?>>
                    <div class="list copy">
                        <ul>
                            <?php wp_get_archives(array('type'=>'monthly'));?>
                        </ul>
                    </div>
                </div><!--.inner-wrapper-->
            </div><!--.outer-wrapper-->
        </aside><!--column-3-->
    </section><!--.row-2-->
</article><!-- #post-## -->
