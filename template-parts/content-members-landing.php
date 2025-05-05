<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-members-landing full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2 copy">
        <?php the_content();?>
    </section><!--.row-2-->
    <section class="row-3 clear-bottom">
        <?php $menus_recipes_text = get_field("menus_recipes_text");
        $sources_resources_text = get_field("sources_resources_text");
        $tips_quips_text = get_field("tips_quips_text");
        $style_points_text = get_field("style_points_text");
        $menus_recipes_image = get_field("menus_recipes_image");
        $sources_resources_image = get_field("sources_resources_image");
        $tips_quips_image = get_field("tips_quips_image");
        $style_points_image = get_field("style_points_image");
        $menus_recipes_link = get_field("menus_recipes_link");
        $sources_resources_link = get_field("sources_resources_link");
        $style_points_link = get_field("style_points_link");
        $tips_quips_link = get_field("tips_quips_link");?>
        <?php if($menus_recipes_image&&$menus_recipes_text):
            if($menus_recipes_image):?>
                <div class="item">
                    <?php if($menus_recipes_link):?>
                        <a href="<?php echo $menus_recipes_link;?>">
                    <?php endif;?>
                        <header class="top"><h2><?php echo $menus_recipes_text;?></h2></header>
                        <img src="<?php echo $menus_recipes_image['sizes']['large'];?>" alt="<?php echo $menus_recipes_image['alt'];?>">
                    <?php if($menus_recipes_link):?>
                        </a>          
                    <?php endif;?>
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($style_points_image&&$style_points_text):
            if($style_points_image):?>
                <div class="item">
                    <?php if($style_points_link):?>
                        <a href="<?php echo $style_points_link;?>">
                    <?php endif;?>
                        <header class="top"><h2><?php echo $style_points_text;?></h2></header>
                        <img src="<?php echo $style_points_image['sizes']['large'];?>" alt="<?php echo $style_points_image['alt'];?>">
                    <?php if($style_points_link):?>
                        </a>    
                    <?php endif;?>
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($tips_quips_image&&$tips_quips_text):
            if($tips_quips_image):?>
                <div class="item">
                    <?php if($tips_quips_link):?>
                        <a href="<?php echo $tips_quips_link;?>">
                    <?php endif;?>
                        <header class="top"><h2><?php echo $tips_quips_text;?></h2></header>
                        <img src="<?php echo $tips_quips_image['sizes']['large'];?>" alt="<?php echo $tips_quips_image['alt'];?>">
                    <?php if($tips_quips_link):?>
                        </a>    
                    <?php endif;?>
                </div><!--.item-->
            <?php endif;
        endif;?>
        <?php if($sources_resources_image&&$sources_resources_text):
            if($sources_resources_image):?>
                <div class="item">
                    <?php if($sources_resources_link):?>
                        <a href="<?php echo $sources_resources_link;?>">
                    <?php endif;?>
                        <header class="top"><h2><?php echo $sources_resources_text;?></h2></header>
                        <img src="<?php echo $sources_resources_image['sizes']['large'];?>" alt="<?php echo $sources_resources_image['alt'];?>">
                    <?php if($sources_resources_link):?>
                        </a>          
                    <?php endif;?>
                </div><!--.item-->
            <?php endif;
        endif;?>
    </section><!--.row-3-->
    <?php $dish_post = get_field("dish_post");
    $args = array(
        'p'=>$dish_post,
        'posts_per_page'=>1,
    );
    $query = new WP_Query($args);
    if($query->have_posts()): $query->the_post();?>
        <section class="row-4">
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
        </section><!--.row-4-->
    <?php endif;?>
</article><!-- #post-## -->
