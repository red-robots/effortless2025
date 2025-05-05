<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-blog full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2 clear-bottom">
        <?php $args = array(
            'post_type'=>'post',
            'posts_per_page'=>8,
            'paged'=>$paged,
            'category__in'=>array(353)
        );
        $current_posts = array();
        $query = new WP_Query($args);
        if ($query->have_posts()): ?>
            <div class="column-1">
                <div class="wrapper copy">
                    <?php while($query->have_posts()): $query->the_post(); $current_posts[] = get_the_ID();?>
                        <section class="post">
                            <?php if(has_post_thumbnail()):?>
                                <div class="col-1">
                                    <?php the_post_thumbnail('full');?>
                                </div><!--.col-1-->
                            <?php endif;?>
                            <div class="col-2">
                                <div class="wrapper">
                                    <header>
                                        <h3><?php the_date('m.d.Y');?></h3>
                                        <h2><?php the_title();?></h2>
                                    </header>
                                    <div class="copy">
                                        <?php the_excerpt();?>
                                    </div><!--.copy-->
                                </div><!--.wrapper-->
                            </div><!--.col-2-->
                        </section><!--.post-->
                    <?php endwhile;?>
                </div><!--.wrapper-->
            </div><!--.column-1-->
            <?php wp_reset_postdata();
        endif; ?>
        <?php $watermark = get_field("row_2_watermark",15);?>
        <aside class="column-2 blockquote">
            <div class="outer-wrapper">
                <div class="inner-wrapper" <?php if($watermark) echo 'style="background-image: url('. $watermark['url'].');"';?>>
                    <?php $args = array(
                        'post_type'=>'post',
                        'posts_per_page'=>-1,
                        'post__not_in'=>$current_posts,
                        'category__in'=>array(353)
                    );
                    $side_query = new WP_Query($args);
                    if ($side_query->have_posts()): ?>
                        <?php $archive_title = get_field("archive_title");?>
                        <div class="list copy">
                            <?php if($archive_title):?>
                                <header><h2><?php echo $archive_title;?></h2></header>
                            <?php endif;?>    
                            <ul>
                                <?php while($side_query->have_posts()): $side_query->the_post();?>
                                    <li><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                                <?php endwhile;?>
                            </ul>
                        </div>
                        <?php wp_reset_postdata();
                    endif;?>
                </div><!--.inner-wrapper-->
            </div><!--.outer-wrapper-->
        </aside><!--column-3-->
    </section><!--.row-2-->
    <div class="row-3">
        <?php pagi_posts_nav_blog($query);?>
    </div><!--.row-3-->
</article><!-- #post-## -->
