<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */
$popup_active = get_field("popup_active");
if($popup_active && strcmp($popup_active,'yes')===0):?>
    <div style="display: none;">
        <div id="eff-embed-signup">
            <?php $popup_text = get_field("popup_text");
            if($popup_text):?>
                <div class="copy">
                    <?php echo $popup_text;?>
                </div>
            <?php endif;
            $form_post = get_post(474);
            if($form_post):?>
                <div class="popup-form">
                    <iframe scrolling="no" class="dynamic-embed" src="<?php echo get_the_permalink($form_post);?>"></iframe>
                </div>
            <?php endif;?>
        </div>
    </div>
<?php endif;?>
<article id="post-<?php the_ID(); ?>" <?php post_class("template-index full-width-wrapper"); ?>>
    <?php $images = get_field("row_1_images");
    $tag = get_field("row_1_tag");
    $copy = get_field("row_1_copy");
    $button_text = get_field("row_1_button_text");
    $button_link = get_field("row_1_button_link"); 
    $button_text_two = get_field("row_1_button_text_two");
    $button_link_two = get_field("row_1_button_link_two"); 
    ?>
    <?php if ( $tag || $copy || ($button_link && $button_text)): ?>
        <section class="row-1">
            <?php if ($tag || $copy || ($button_link && $button_text)): ?>
                <div class="outer-wrapper">
	                <?php if($images):?>
                        <div class="slide-wrapper">
                            <?php foreach($images as $image):?>
                                <div class="slide" style="background-image: url(<?php echo $image['url'];?>);">
                                </div><!--.slide-->
                            <?php endforeach;?>
                        </div><!--slide-wrapper-->
                    <?php endif;?>
                    <div class="inner-wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                        <?php if ($button_text && $button_link): ?>
                            <div class="button">
                                <a class="surrounding" href="<?php echo $button_link; ?>">
                                    <?php echo $button_text; ?>
                                </a>
                            </div>
                        <?php endif;//if for button text and link?>
                        <div class="clear"></div>
                        <?php if ($button_text_two && $button_link_two): ?>
                            <div class="button floatit">
                                <a class="surrounding" href="<?php echo $button_link_two; ?>">
                                    <?php echo $button_text_two; ?>
                                </a>
                            </div>
                        <?php endif;//if for button text and link?>
                    </div><!--.inner-wrapper-->
                </div><!--.outer-wrapper-->
            <?php endif;//if for tag or copy or button?>
        </section><!--.row-1-->
    <?php endif; ?>
    <?php $image = get_field("row_2_image");
    $tag = get_field("row_2_tag");
    $copy = get_field("row_2_copy");
    $button_text = get_field("row_2_button_text");
    $button_link = get_field("row_2_button_link");
    $watermark = get_field("row_2_watermark");?>
    <?php if ($image || $tag || $copy || ($button_link && $button_text)): ?>
        <section class="row-2" <?php if($watermark):
            echo 'style="background-image: url('. $watermark['url'].');"';
        endif;?>>
            <?php if ($image): ?>
                <div class="column-1">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy || ($button_text && $button_link)): ?>
                <div class="column-2" <?php if($watermark):
                    echo 'style="background-image: url('. $watermark['url'].');"';
                endif;?>>
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                        <?php if ($button_text && $button_link): ?>
                            <div class="button">
                                <a class="surrounding" href="<?php echo $button_link; ?>">
                                    <?php echo $button_text; ?>
                                </a>
                            </div>
                        <?php endif;//if for button text and link?>
                    </div><!--.wrapper-->
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-2-->
    <?php endif;//if for tag or image or copy or button text and link?>
    <?php $image = get_field("row_3_image");
    $icon = get_field("row_3_icon");
    $tag = get_field("row_3_tag");
    $copy = get_field("row_3_copy");
    $link = get_field("row_3_link"); ?>
    <?php if ($image || $tag || $copy): ?>
        <section class="row-3">
            <?php if ($image): ?>
                <div class="column-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy): ?>
                <div class="column-2">
                    <div class="background"></div><!--.background-->
                    <?php if($link):?>
                        <!-- <a class="surrounding" href="<?php echo $link;?>"> -->
                    <?php endif;?>
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if($icon):?>
                            <img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                        <?php endif;?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                    </div><!--.wrapper-->
                    <?php if($link):?>
                        <!-- </a> -->
                    <?php endif;?>
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-3-->
    <?php endif;//if for tag or image or copy or button text and link?>
    <?php $image = get_field("row_4_image");
    $icon = get_field("row_4_icon");
    $tag = get_field("row_4_tag");
    $copy = get_field("row_4_copy");
    $link = get_field("row_4_link");?>
    <?php if ($image || $tag || $copy): ?>
        <section class="row-4">
            <?php if ($image): ?>
                <div class="column-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy): ?>
                <div class="column-2">
                    <div class="background"></div><!--.background-->
                    <?php if($link):?>
                        <!-- <a class="surrounding" href="<?php echo $link;?>"> -->
                    <?php endif;?>
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if($icon):?>
                            <img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                        <?php endif;?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                    </div><!--.wrapper-->
                    <?php if($link):?>
                        <!-- </a> -->
                    <?php endif;?>
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-4-->
    <?php endif;//if for tag or image or copy or button text and link?>
    <?php $image = get_field("row_5_image");
    $icon = get_field("row_5_icon");
    $tag = get_field("row_5_tag");
    $copy = get_field("row_5_copy");
    $link = get_field("row_5_link"); ?>
    <?php if ($image || $tag || $copy): ?>
        <section class="row-5">
            <?php if ($image): ?>
                <div class="column-1" <?php echo 'style="background-image: url('. $image['url'].');"';?>>
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                </div><!--.column-1-->
            <?php endif;//if for image?>
            <?php if ($tag || $copy): ?>
                <div class="column-2">
                    <div class="background"></div><!--.background-->
                    <?php if($link):?>
                        <a class="surrounding" href="<?php echo $link;?>">
                    <?php endif;?>
                    <div class="wrapper">
                        <?php if ($tag): ?>
                            <div class="tag"><?php echo $tag; ?></div><!--.tag-->
                        <?php endif;//if for tag?>
                        <?php if($icon):?>
                            <img class="icon" src="<?php echo $icon['url']; ?>" alt="<?php echo $icon['alt']; ?>">
                        <?php endif;?>
                        <?php if ($copy): ?>
                            <div class="copy"><?php echo $copy; ?></div><!--.copy-->
                        <?php endif;//if for copy?>
                    </div><!--.wrapper-->
                    <?php if($link):?>
                        </a>
                    <?php endif;?>
                </div><!--.column-2-->
            <?php endif;//if for tag or copy or button text and link?>
        </section><!--.row-5-->
    <?php endif;//if for tag or image or copy or button text and link?>
    <?php $row_6_post = get_field("row_6_post");
    $args = array(
        'p'=>$row_6_post,
        'posts_per_page'=>1,
    );
    $query = new WP_Query($args);
    if($query->have_posts()): $query->the_post();?>
        <section class="row-6">
            <?php if(has_post_thumbnail()):?>
                <div class="col-1">
                    <?php the_post_thumbnail('full');?>
                </div><!--.col-1-->
            <?php endif;?>
            <div class="col-2">
                <div class="wrapper">
                    <header>
                        <h2 class="bigger">The Dish</h2>
                        <span><?php the_date('m.d.Y');?></span>
                        <h2><?php the_title();?></h2>
                    </header>
                    <div class="copy">
                        <?php the_excerpt();?>
                    </div><!--.copy-->
                </div><!--.wrapper-->
            </div><!--.col-2-->
        </section><!--.row-6-->
    <?php endif;?>
    <?php $wp_query = new WP_Query();
            $wp_query->query(array(
                'post_type'=>'testimonial',
                'posts_per_page' => 1,
                'orderby' => 'rand'
            ));
        if ($wp_query->have_posts()) : ?>
        <section class="testimonials">
            <h2>What People Are Saying</h2>
            <img class="icon" src="<?php bloginfo('template_url'); ?>/images/icon.png" style="width: 30px;"></img>
            <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="testimonial">
                    <?php the_content(); ?>
                    <div class="signature">
                        <?php the_title(); ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
</article><!-- #post-## -->






