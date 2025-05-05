<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="wrapper full-width-wrapper">
			<div class="site-info clear-bottom">
                <div class="wrapper">
                    <nav class="account">
                        <?php wp_nav_menu( array( 'theme_location' => 'account' ) ); ?>
                    </nav>
                    <?php $email = get_field("email","option");
                    if($email):?>
                        <div class="email">
                            <a href="mailto:<?php echo $email;?>"><?php echo $email;?></a>
                        </div><!--.email-->
                    <?php endif;?>
                    <nav class="sitemapbw">
                        <?php wp_nav_menu( array( 'theme_location' => 'sitemapbw' ) ); ?>
                    </nav>
                </div><!--.wrapper-->
            </div><!-- .site-info -->
            <?php $facebook = get_field("facebook_link","option");
            $instagram = get_field("instagram_link","option");
            if($instagram||$facebook):?>
                <div class="social">
                    <?php if($facebook):?>
                        <div class="facebook">
                            <a href="<?php echo $facebook;?>">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </div><!--.facebook-->
                    <?php endif;
                    if($instagram):?>
                        <div class="instagram">
                            <a href="<?php echo $instagram;?>">
                                <i class="fa fa-instagram"></i>                    
                            </a>
                        </div><!--.instagram-->
                    <?php endif;?>        
                </div><!--.social-->
            <?php endif;?>
            <div class="email-signup">
            </div><!--.email-signup-->
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
