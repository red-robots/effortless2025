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
<?php $ga = get_field("google_analytics","option");
if($ga):
    echo $ga;
endif;?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">

	<header id="masthead" class="site-header site-header-new clear-bottom" role="banner">
        <div class="row-1">
            <div class="wrapper">
              <div class="leftCol">
                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav>
              </div>

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

                <div id="cart-icon" class="cart rc-icon">
                  <a href="<?php echo wc_get_cart_url();?>">
                    <i class="fa fa-shopping-cart"></i>
                    <div class="num"></div><!--.num-->
                  </a>
                </div><!--.cart#cart-icon-->

              </div>
            </div><!--.wrapper-->
        </div><!--.row-1-->
        <div class="row-2">
            <div class="wrapper full-width-wrapper">
                <?php $logo = get_field("logo","option");
                if($logo):?>
                    <div class="logo">
                        <a href="<?php echo get_bloginfo("url");?>" class="surrounding">
                            <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                        </a>
                    </div><!--.logo-->
                <?php endif;?>
            </div><!-- wrapper -->
        </div><!--.row-2-->
        <div class="row-3">
            <div class="wrapper full-width-wrapper">
                <?php $mobilebuttontext = get_field("mobile_button_text","option");?>
                <?php if($mobilebuttontext):?>
                    <div class="button">
                        <?php echo $mobilebuttontext;?>
                    </div><!--.button-->
                <?php endif;?>
                <nav id="mobile-site-navigation" class="main-navigation" role="navigation">
                    <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
                </nav><!-- #mobile-site-navigation -->
            </div><!--.wrapper-->
        </div><!--.row-3-->
	</header><!-- #masthead -->


	<div id="content" class="site-content wrapper">
    <?php get_template_part('parts/hero'); ?>

