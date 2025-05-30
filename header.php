<?php
/**
 * The header for theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300..700;1,300..700&display=swap" rel="stylesheet">

<script src="https://use.typekit.net/vww2unj.js"></script>
<script>try{Typekit.load({ async: true });}catch(e){}</script>
<script>var params={};location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,function(s,k,v){params[k]=v});</script>
<?php $ga = get_field("google_analytics","option");
if($ga):
    echo $ga;
endif;?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header site-header-new <?php echo ( is_front_page() || is_home() ) ? 'is--home':'is--subpage' ?>" role="banner">
    <div class="row-1">
      <div class="wrapper">
        <?php if ( is_front_page() || is_home() ) { ?>
        <div class="leftCol">
          <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>    
          </nav>
        </div>
        <?php } ?>
        
        <div class="rightCol">
          <?php $account_link = get_field("account_link","option");
          $account_text = get_field("account_text","option");
          if($account_text&&$account_link) { ?>
              <div class="account button rc-icon" style="display:none;">
                  <a href="<?php echo $account_link;?>" class="surrounding">
                      <?php echo $account_text; ?>
                  </a>
              </div>
          <?php } ?>

          <?php if ($socialMedia = get_field('social_media_links', 'option')) { ?>
          <?php foreach ($socialMedia as $sm) {
            $url = $sm['link'];
            $icon = $sm['icon'];
            if ( $url && filter_var($url, FILTER_VALIDATE_URL) ) { 
              $parse = parse_url($url);
              $strs = str_replace('www.','', $parse['host']);
              $host = explode('.', $strs);
              $name = ucwords($host[0]);
              echo '<a href="'.$url.'" target="_blank" class="rc-icon"><span class="sr">'.$name.'</span>'.$icon.'</a>';
            } else {
              if( validate_email($url) ) {
                echo '<a href="mailto:'.$url.'" class="rc-icon"><span class="sr">Email</span>'.$icon.'</a>';
              }
            }
          ?>
          <?php } ?>
          <?php } ?>

          <?php $members_link = get_field("members_link","option");
          if($members_link) { ?>
          <a href="<?php echo $members_link;?>" class="member-link surrounding rc-icon">
            <i class="fa fa-user"></i><span class="sr">Account</span>
          </a>
          <?php }?>

          <?php $cartCount = WC()->cart->get_cart_contents_count(); ?>
          <div id="cart-icon" class="cart rc-icon">
            <a href="<?php echo wc_get_cart_url();?>" class="cart-contents">
              <i class="fa fa-shopping-cart"></i>
              <?php if ($cartCount>0) { ?>
              <span class="cart-count"><b><?php echo $cartCount ?></b></span><!--.num-->
              <?php } ?>
            </a>
          </div><!--.cart#cart-icon-->
        </div>

        <button class="mobileMenuToggle" aria-expanded="false" aria-controls="MobileHeader">
          <span class="sr-only">Mobile Menu</span><span class="bar"></span>
        </button>
      </div><!--.wrapper-->
    </div>
    <div class="row-2 logoContainer">
      <div class="wrapper">
        <?php 
        $logo = get_field("logo","option");
        if($logo) { ?>
        <div class="logo">
          <a href="<?php echo get_bloginfo("url");?>" class="surrounding">
            <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
          </a>
        </div>
        <?php } ?>
        <div class="mainNav">
          <?php if( !is_front_page() && !is_home() ) { ?>
          <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>    
          </nav>
          <?php } ?>
        </div>
      </div>
    </div>
	</header><!-- #masthead -->

  <div id="MobileHeader" class="MobileHeader">
    <div class="mobileHeaderInner">
      <button class="mobile-menu-close"><span class="sr-only">Mobile Menu Close</span><span class="times"></span></button>
      <nav id="mobile-site-navigation" class="mobile-main-navigation" role="navigation"></nav>
    </div>
    <div class="mobileOverlay"></div>
  </div>

  <?php $content_class = ( is_front_page() || is_home() ) ? 'fullwidth':'wrapper'; ?>
	<div id="content" class="site-content <?php echo $content_class ?>">
    <?php get_template_part('parts/hero'); ?>

