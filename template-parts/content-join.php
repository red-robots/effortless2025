<?php
/**
 * Template part for displaying page content in about.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-join full-width-wrapper"); ?>>
	<?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2">
        <?php $image = get_field("step_1_image");
        $step_image = get_field("step_1_step_image");
        $link = get_field("step_1_link");
        $link_text = get_field("step_1_link_text");
        $link_active = get_field("step_1_link_active");
        $title = get_field("step_1_title");
        $copy = get_field("step_1_copy");?>
        <?php if($step_image||$title||$tag||$copy):?>
            <div class="column-1">
                <div class="wrapper">
                    <?php if($step_image||$title||$tag):?>
                        <div class="row-1 clear-bottom">
                            <?php if($step_image):?>
                                <img src="<?php echo $step_image['url'];?>" alt="<?php echo $step_image['alt'];?>">
                            <?php endif;//if for image?>
                            <?php if($title):?>
                                <header>
                                    <h2><?php echo $title;?></h2>
                                </header>
                            <?php endif;//if for title?>
                        </div><!--.row-1-->
                    <?php endif;//if for step image or title or tag?>
                    <?php if($copy):?>
                        <div class="row-2 copy">
                            <?php echo $copy;?>
                        </div><!--.row-2-->
                    <?php endif;//if for copy?>
                    <?php if($link&&strcmp($link_active,"yes")===0&&$link_text):?>
                        <a class="row-3" href="<?php echo $link;?>"><?php echo $link_text;?></a>
                    <?php endif;?>
                </div><!--.wrapper-->
            </div><!--.column-1-->
        <?php endif;//if for step image or title or tag or copy?>
        <?php if($image):?>
            <div class="column-2" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            </div><!--.column-2-->
        <?php endif;//if for image?>
    </section><!--.row-2-->
    <section class="row-3">
        <?php $image = get_field("step_2_image");
        $step_image = get_field("step_2_step_image");
        $title = get_field("step_2_title");
        $link = get_field("step_2_link");
        $link_text = get_field("step_2_link_text");
        $link_active = get_field("step_2_link_active");
        $copy = get_field("step_2_copy");?>
        <?php if($step_image||$title||$tag||$copy):?>
            <div class="column-1">
                <div class="wrapper">
                    <?php if($step_image||$title||$tag):?>
                        <div class="row-1 clear-bottom">
                            <?php if($step_image):?>
                                <img src="<?php echo $step_image['url'];?>" alt="<?php echo $step_image['alt'];?>">
                            <?php endif;//if for image?>
                            <?php if($title):?>
                                <header>
                                    <h2><?php echo $title;?></h2>
                                </header>
                            <?php endif;//if for title?>
                        </div><!--.row-1-->
                    <?php endif;//if for step image or title or tag?>
                    <?php if($copy):?>
                        <div class="row-2 copy">
                            <?php echo $copy;?>
                        </div><!--.row-2-->
                    <?php endif;//if for copy?>
                    <?php if($link&&strcmp($link_active,"yes")===0&&$link_text):?>
                        <a class="row-3" href="<?php echo $link;?>"><?php echo $link_text;?></a>
                    <?php endif;?>
                </div><!--.wrapper-->
            </div><!--.column-1-->
        <?php endif;//if for step image or title or tag or copy?>
        <?php if($image):?>
            <div class="column-2" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            </div><!--.column-2-->
        <?php endif;//if for image?>
    </section><!--.row-3-->
    <section class="row-4">
        <?php $image = get_field("step_3_image");
        $step_image = get_field("step_3_step_image");
        $title = get_field("step_3_title");
        $link = get_field("step_3_link");
        $link_text = get_field("step_3_link_text");
        $link_active = get_field("step_3_link_active");
        $copy = get_field("step_3_copy");?>
        <?php if($step_image||$title||$tag||$copy):?>
            <div class="column-1">
                <div class="wrapper">
                    <?php if($step_image||$title||$tag):?>
                        <div class="row-1 clear-bottom">
                            <?php if($step_image):?>
                                <img src="<?php echo $step_image['url'];?>" alt="<?php echo $step_image['alt'];?>">
                            <?php endif;//if for image?>
                            <?php if($title):?>
                                <header>
                                    <h2><?php echo $title;?></h2>
                                </header>
                            <?php endif;//if for title?>
                        </div><!--.row-1-->
                    <?php endif;//if for step image or title or tag?>
                    <?php if($copy):?>
                        <div class="row-2 copy">
                            <?php echo $copy;?>
                        </div><!--.row-2-->
                    <?php endif;//if for copy?>
                    <?php if($link&&strcmp($link_active,"yes")===0&&$link_text):?>
                        <a class="row-3" href="<?php echo $link;?>"><?php echo $link_text;?></a>
                    <?php endif;?>
                </div><!--.wrapper-->
            </div><!--.column-1-->
        <?php endif;//if for step image or title or tag or copy?>
        <?php if($image):?>
            <div class="column-2" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
            </div><!--.column-2-->
        <?php endif;//if for image?>
    </section><!--.row-4-->
</article><!-- #post-## -->
