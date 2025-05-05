<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<section id="post-<?php the_ID(); ?>" <?php post_class("template-mailchimp-embed"); ?>>
    <div class="copy"
        ><?php $form = get_field("form");
        if($form):
            echo $form;
        endif;?>
    </div><!--.copy-->
</section><!-- #post-## -->
