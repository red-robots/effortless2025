<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-single full-width-wrapper"); ?>>
    <?php get_template_part("template-parts/content","template-header");?>
    <section class="row-2 clear-bottom">
        <?php if (get_the_content()): ?>
            <div class="column-1">
                <div class="wrapper copy">
                    <?php the_content(); ?>
                </div><!--.wrapper-->
            </div><!--.column-2-->
        <?php endif; 
        $watermark = get_field("row_2_watermark");?>
        <aside class="column-2 blockquote">
            <div class="outer-wrapper">
                <div class="inner-wrapper" <?php if($watermark) echo 'style="background-image: url('. $watermark['url'].');"';?>>
                    <?php $terms = get_the_terms($post,'category');
                    $current_post = array(get_the_ID());
                    $is_dish = false;
                    if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):
                        foreach($terms as $term):
                            if($term->term_id==353):
                                $is_dish = true;
                                break;
                            endif;
                        endforeach;
                    endif;
                    if(!$is_dish):?>


                            <div class="sidewrap">
                                <?php get_search_form(); ?>
                            </div>

                        <?php $signuptext = get_field("signup_header_text_blog","option");?>
                        <!-- Begin MailChimp Signup Form -->
                        <div id="mc_embed_signup">
                            <form action="//myeffortlessentertaing.us14.list-manage.com/subscribe/post?u=959a4d7fabeafa2e758654125&amp;id=20b4e3c60e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <?php if($signuptext) echo $signuptext;?>
                                    <div class="mc-field-group">
                                        <input type="email" value="" placeholder="Email" name="EMAIL" class="required email" id="mce-EMAIL">
                                    </div>
                                    <div class="mc-field-group">
                                        <input type="text" value="" placeholder="Name" name="FNAME" class="" id="mce-FNAME">
                                    </div>
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_959a4d7fabeafa2e758654125_20b4e3c60e" tabindex="-1" value=""></div>
                                    <input type="submit" value="Submit" name="subscribe" id="mc-embedded-subscribe">
                                </div>
                            </form>
                        </div>
                        <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
                        <!--End mc_embed_signup-->
                        <?php $args = array(
                            'post_type'=>'post',
                            'posts_per_page'=>-1,
                            'post__not_in'=>$current_post,
                            'category__not_in'=>array(353)
                        );
                        $side_query = new WP_Query($args);
                        if ($side_query->have_posts()): ?>
                            <?php $archive_title = get_field("archive_title",3079);?>
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
                    <?php else:?>
                        <?php $args = array(
                            'post_type'=>'post',
                            'posts_per_page'=>-1,
                            'post__not_in'=>$current_post,
                            'category__in'=>array(353)
                        );
                        $side_query = new WP_Query($args);
                        if ($side_query->have_posts()): ?>
                            <?php $archive_title = get_field("archive_title",3079);?>
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
                    <?php endif;?>
                </div><!--.inner-wrapper-->
            </div><!--.outer-wrapper-->
        </aside><!--column-2-->
    </section><!--.row-2-->
</article><!-- #post-## -->
