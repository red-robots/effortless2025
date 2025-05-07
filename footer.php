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

	<footer id="colophon" class="site-footer site-footer-new" role="contentinfo">
    <div class="footWrapper">
      <div class="flexwrap">
        <div class="footCol footLeft">
          <?php $logo = get_field("logo","option"); ?>
          <?php if ($logo) { ?>
          <div class="fullwidth">
            <div class="footLogo">
              <img src="<?php echo $logo['url'] ?>" alt="" />
            </div>
          </div>
          <?php } ?>

          <div class="flexwrap">
            <div class="flexcol linksCol">
              <nav class="account footLinks">
                  <?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
              </nav>
            </div>

            <div class="flexcol socialMediaCol">
              <?php if ($socialMedia = get_field('social_media_links', 'option')) { ?>
                <ul class="social-media">
                <?php foreach ($socialMedia as $sm) {
                  $url = $sm['link'];
                  $icon = $sm['icon'];
                  if ( $url && filter_var($url, FILTER_VALIDATE_URL) ) { 
                    $parse = parse_url($url);
                    $strs = str_replace('www.','', $parse['host']);
                    $host = explode('.', $strs);
                    $name = ucwords($host[0]);
                    echo '<li><a href="'.$url.'" target="_blank" class="rc-icon"><span class="sr">'.$name.'</span>'.$icon.'</a></li>';
                  } else {
                    if( validate_email($url) ) {
                      echo '<li><a href="mailto:'.$url.'" class="rc-icon"><span class="sr">Email</span>'.$icon.'</a></li>';
                    }
                  }
                ?>
                <?php } ?>
                </ul>
              <?php } ?>
              <?php $email = get_field('email', 'option'); ?>
              <nav class="sitemap">
                <?php if ($email) { ?>
                <div class="email-info">
                  <a href="mailto:<?php echo antispambot($email,1) ?>"><?php echo antispambot($email) ?></a>
                </div>
                <?php } ?>
                <?php wp_nav_menu( array( 'theme_location' => 'sitemapbw' ) ); ?>
              </nav>
            </div>
          </div>
        </div>

        <div class="footCol footRight">
          <?php 
          $signup_header_text_blog = get_field('signup_header_text_blog', 'option'); 
          $formId = get_field('gravity_form_id', 'option'); ?>
          <?php if ($formId) { ?>
            <?php if ( do_shortcode('[gravityform id="'.$formId.'"]') ) { ?>
            <div class="subscriptionForm">
              <?php if ($signup_header_text_blog) { ?>
              <div class="formText"><?php echo anti_email_spam($signup_header_text_blog); ?></div>
              <?php } ?>
              <?php echo do_shortcode('[gravityform id="'.$formId.'" title="false" description="false" ajax="true"]'); ?>
            </div>  
            <?php } ?> 
          <?php } ?>
        </div>
      </div>
    </div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
