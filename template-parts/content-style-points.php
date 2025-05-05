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
        <?php $bella_url = get_the_permalink(581);
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
        <?php $gallery = get_field("gallery");
        if($gallery):
            foreach($gallery as $row):?>
                <div class="item">
                    <?php if($row['link']):?>
                        <a href="<?php echo $row['link'];?>" target="_blank">
                    <?php endif;?>
                        <?php if($row['image']):?>
                            <img src="<?php echo $row['image']['sizes']['large'];?>" alt="<?php echo $row['image']['alt'];?>">
                        <?php endif;
                        if($row['company']||$row['product_title']):?>
                            <header>
                                <?php if($row['product_title']):?>
                                    <h2><?php echo $row['product_title'];?></h2>
                                <?php endif;?>
                                <?php if($row['company']):?>
                                    <h3><?php echo $row['company'];?></h3>
                                <?php endif;?>
                            </header>
                        <?php endif;?>
                    <?php if($row['link']):?>
                        </a>
                    <?php endif;?>
                </div><!--.item-->
            <?php endforeach;
        endif;?>
    </aside><!--.column-3-->
</article><!-- #post-## -->
