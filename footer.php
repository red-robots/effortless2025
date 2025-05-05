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
            <div class="email-signup clear-bottom">
                <div class="wrapper">
                    <?php $signuptext = get_field("signup_header_text","option");?>
                    <!-- Begin MailChimp Signup Form -->
                    <div id="mc_embed_signup">
                        <form action="//myeffortlessentertaing.us14.list-manage.com/subscribe/post?u=959a4d7fabeafa2e758654125&amp;id=20b4e3c60e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                            <div id="mc_embed_signup_scroll">
                                <?php if($signuptext) echo "<h2>".$signuptext."</h2>";?>
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
                </div><!--.wrapper-->
            </div><!--.email-signup-->
		</div><!-- wrapper -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
