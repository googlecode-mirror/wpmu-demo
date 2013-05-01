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
<?php
wp_register_script( 'bxSlider', get_template_directory_uri() . '/includes/jquery.bxslider/jquery.bxslider.js', array( 'jquery' ) );
wp_enqueue_script( 'bxSlider' );
?>
<script type="text/javascript">
    $(document).ready(function(){
        alert("55555");
        $('.slider4').bxSlider({
            slideWidth: 300,
            minSlides: 2,
            maxSlides: 3,
            moveSlides: 1,
            slideMargin: 10,
            pager: false,
            auto: true
        });
    });
</script>
<div id="top-login-bar" style="background-image: url(<?php echo esc_url( get_template_directory_uri() . '/images/top_login_bar.png' ); ?>); height: 37px;">
    <div id="top-login-bar-wrapper">
        <div style="display: inline-block; padding: 2px;">
            <?php if ( ! is_user_logged_in() ) : ?>
            <form action="./wp-login.php" method="post" id="form-login-bar">
                <span style="color: #d0dfe9">Member Login : </span>
                <input type="text" name="log" id="username-input" alt="username"/>
                <input type="password" name="pwd" id="password-input" alt="password"/>
                <input type="hidden" name="redirect_to" value="<?php echo get_home_url() ?>" />
                <input type="image" class="submit-btn" src="<?php echo esc_url(get_template_directory_uri() . '/images/buttons/loginBt.png'); ?>" />
                <input type="image" class="submit-btn" src="<?php echo esc_url(get_template_directory_uri() . '/images/buttons/applyToAgentBt.png'); ?>" />
            </form>
            <?php else :?>
            <span id="welcome-msg">ยินดีต้อนรับ :<a href="http://localhost/srikrung/my-account/"> <?php  echo wp_get_current_user()->user_firstname  ?></a></span>
            <span>(<a href="<?php echo wp_logout_url() ?>">Logout</a>)</span>
            <?php endif ?>
        </div>
        <div style="display: block; float: right; width: 140px; padding: 3px;">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/images/icons/cart_basket.png' ); ?>" />
            <span style="color: #d0dfe9">
                <a class="cart-content" href="<?php echo esc_url( $woocommerce->cart->get_cart_url() ); ?>"><span><?php echo $woocommerce->cart->get_cart_contents_count();?></span></a>
                item(s) - <span><?php echo $woocommerce->cart->get_total(); ?></span>
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
				<nav id="navigation" class="col-full" role="navigation" style="width: 660px !important; float: right;">
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
                    <img src="<?php echo esc_url(get_template_directory_uri() . '/images/buttons/button_bar_tail.png'); ?>" style="float: left;" />
				</nav><!-- /#navigation -->
			</div><!-- /.header-right -->

			<?php woo_nav_after(); ?>

		</div><!-- /.col-full -->

	</header><!-- /#header -->

	<?php woo_content_before(); ?>