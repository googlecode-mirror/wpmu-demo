<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options, $woocommerce;
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php woo_title( '' ); ?></title>
<?php woo_meta(); ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>" />
<?php
wp_head();
woo_head();
?>
</head>
<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="top-login-bar" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/images/top_login_bar.png' ); ?>); height: 37px;">
    <div style="max-width: 960px; margin: 0 auto; text-align: right;">
        <div style="display: inline-block; padding: 2px;">
            <span style="color: #d0dfe9">Member Login : </span>
            <input type="text" name="username" id="username-input" alt="username"/>
            <input type="text" name="password" id="password-input" alt="password"/>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/buttons/loginBt.png'); ?>"/>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/images/buttons/applyToAgentBt.png'); ?>"/>
        </div>
        <div style="display: inline-block; position: relative;">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/cart_basket.png' ); ?>" />
            <span style="color: #d0dfe9">
                <a class="cart-content" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>"><span><?php echo $woocommerce->cart->get_cart_contents_count();?></span></a>
                item(s) - 0.00 THB
            </span>
        </div>
    </div>
</div>

<div id="wrapper">

    <?php woo_header_before(); ?>

	<header id="header">
		<div class="col-full">

			<div class="header-left">
                <?php woo_header_inside(); ?>
			</div><!-- /.header-left -->

	        <?php woo_nav_before(); ?>

	        <div class="header-right">
				<nav id="navigation" class="col-full" role="navigation">
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/buttons/button_bar_head.png'); ?>" style="float: left" />
                    <?php
					if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'primary-menu' ) ) {
						wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fl', 'theme_location' => 'primary-menu' ) );
					} else {
					?>
			        <ul id="main-nav" class="nav fl">
						<?php if ( is_page() ) $highlight = 'page_item'; else $highlight = 'page_item current_page_item'; ?>
						<li class="<?php echo $highlight; ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e( 'Home', 'woothemes' ); ?></a></li>
						<?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
					</ul><!-- /#nav -->
			        <?php } ?>
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/buttons/button_bar_tail.png'); ?>" style="float: right" />
				</nav><!-- /#navigation -->
			</div><!-- /.header-right -->

			<?php woo_nav_after(); ?>

		</div><!-- /.col-full -->

	</header><!-- /#header -->

	<?php woo_content_before(); ?>