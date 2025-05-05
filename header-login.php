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

	<header id="masthead-login" class="site-header clear-bottom" role="banner">
        <div class="row-1">
            <div class="wrapper full-width-wrapper clear-bottom">
                <?php $return_text = get_field("return_to_main_site_text","option");
                if($return_text):?>
                    <a class="return" href="<?php echo get_bloginfo("url");?>"><i class="fa fa-arrow-left"></i>&nbsp;<?php echo $return_text;?></a>
                <?php endif;?>
                <div id="cart-icon" class="cart">
                    <a href="<?php echo wc_get_cart_url();?>">
                        <i class="fa fa-shopping-cart"></i>
                        <div class="num"></div><!--.num-->
                    </a>
                </div><!--.cart#cart-icon-->
                <?php $members_link = get_field("members_link","option");
                if($members_link):?>
                    <div class="members button">
                        <a href="<?php echo $members_link;?>" class="surrounding">
                            <i class="fa fa-user"></i>
                        </a>
                    </div>
                <?php endif;?>
                <?php $account_link = get_field("account_link","option");
                $account_text = get_field("account_text","option");
                if($account_text&&$account_link):?>
                    <div class="account button">
                        <a href="<?php echo $account_link;?>" class="surrounding">
                            <?php echo $account_text; ?>
                        </a>
                    </div>
                <?php endif;?>
                <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) );?>">
                    <label>
                        <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' );?></span>
                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' );?>" value="<?php echo get_search_query();?>" name="s" />
                    </label>
                </form>
            </div><!--.wrapper-->
        </div><!--.row-1-->
        <div class="row-2">
            <div class="wrapper full-width-wrapper clear-bottom">
                <?php $logo = get_field("logo","option");
                if($logo):?>
                    <div class="logo">
                        <a href="<?php echo get_the_permalink(1368);?>" class="surrounding">
                            <img src="<?php echo $logo['url'];?>" alt="<?php echo $logo['alt'];?>">
                        </a>
                    </div><!--.logo-->
                <?php endif;?>
                <?php $mobilebuttontext = get_field("mobile_button_text","option");?>
                <?php if($mobilebuttontext):?>
                    <div class="button">
                        <?php echo $mobilebuttontext;?>
                    </div><!--.button-->
                <?php endif;?>
                <nav id="login-site-navigation" class="login-nav">
                    <?php wp_nav_menu( array( 'theme_location' => 'login' ) ); ?>
                </nav>
            </div><!-- wrapper -->
        </div><!--.row-2-->
	</header><!-- #masthead -->
	<div id="content" class="site-content wrapper">
