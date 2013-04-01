<?php
/**
 * Header Template
 *
 * Here we setup all logic and XHTML that is required for the header section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
 
 global $woo_options;
 global $woocommerce;
 
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />

<title><?php woo_title(); ?></title>

<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame -->
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<?php woo_meta(); ?>

<link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" media="screen" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

<?php
	wp_head();
	woo_head();
?>
</head>

<body <?php body_class(); ?>>
<?php woo_top(); ?>

<div id="wrapper">

	<?php if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'top-menu' ) ) { ?>

	<div id="top">
		<nav class="col-full" role="navigation">
			<?php wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'top-nav', 'menu_class' => 'nav fl', 'theme_location' => 'top-menu' ) ); ?>
		</nav>
	</div><!-- /#top -->

    <?php } ?>

	<header id="header" class="col-full">
		
		<?php
		    $logo = get_template_directory_uri() . '/images/logo.png';
		    if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' ) { $logo = $woo_options['woo_logo']; }
		    if ( isset( $woo_options['woo_logo'] ) && $woo_options['woo_logo'] != '' && is_ssl() ) { $logo = preg_replace("/^http:/", "https:", $woo_options['woo_logo']); }
		?>
		<?php if ( ! isset( $woo_options['woo_texttitle'] ) || $woo_options['woo_texttitle'] != 'true' ) { ?>
		    <a id="logo" href="<?php bloginfo( 'url' ); ?>" title="<?php bloginfo( 'description' ); ?>">
		    	<img src="<?php echo $logo; ?>" alt="<?php bloginfo( 'name' ); ?>" />
		    </a>
	    <?php } ?>
	    
	    <hgroup>
	        
			<h1 class="site-title"><a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
			<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
		      	
		</hgroup>

		<?php if ( is_woocommerce_activated() ) { ?>

		<nav class="woocommerce-nav">
			<ul>
				<li class="my-account"><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>" title="<?php _e('My Account','woothemes'); ?>"><?php _e('Account','woothemes'); ?></a></li>
				<li class="cart">
					<?php _e('Cart:', 'woothemes'); ?> <a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item', '%d items', $woocommerce->cart->get_cart_contents_count(), 'woothemes'), $woocommerce->cart->get_cart_contents_count());?></a>
				</li>
				<li><?php echo $woocommerce->cart->get_cart_total(); ?></li>
				<li class="checkout"><a href="<?php echo $woocommerce->cart->get_checkout_url()?>"><?php _e('Checkout','woothemes') ?></a></li>
			</ul>
		</nav>

		<?php } ?>
		
		<div id="search-top">
	    
	    	<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url(); ?>">
				<label class="screen-reader-text" for="s"><?php _e('Search for:', 'woothemes'); ?></label>
				<input type="text" value="<?php the_search_query(); ?>" name="s" id="s"  class="field s" placeholder="<?php _e('Search', 'woothemes'); ?>" />
				<input type="image" class="submit btn" name="submit" value="<?php _e('Search', 'woothemes'); ?>" src="<?php echo get_template_directory_uri(); ?>/images/ico-search-grad.png" alt="Search">
				<?php if ($woo_options['woo_header_search_scope'] == 'products' ) { echo '<input type="hidden" name="post_type" value="product" />'; } else { echo '<input type="hidden" name="post_type" value="post" />'; } ?>	
			</form>
			<div class="fix"></div>
			
		</div><!-- /#search-top -->

	</header><!-- /#header -->

	<nav id="navigation" class="col-full" role="navigation">
	
	
		<div id="nav-home"><a href="<?php bloginfo('url'); ?>">Home</a></div>
		<?php
		if ( function_exists( 'has_nav_menu') && has_nav_menu( 'primary-menu') ) {
			wp_nav_menu( array( 'depth' => 6, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'main-nav', 'menu_class' => 'nav fl', 'theme_location' => 'primary-menu' ) );
		} else {
		?>
        <ul id="main-nav" class="nav fl">
			<?php
        	if ( isset($woo_options[ 'woo_custom_nav_menu' ]) AND $woo_options[ 'woo_custom_nav_menu' ] == 'true' ) {
        		if ( function_exists( 'woo_custom_navigation_output') )
					woo_custom_navigation_output();
			} else { ?>
	            <?php if ( is_page() ) $highlight = "page_item"; else $highlight = "page_item current_page_item"; ?>
	            <li class="<?php echo $highlight; ?>"><a href="<?php echo home_url( '/' ); ?>"><?php _e( 'Home', 'woothemes' ) ?></a></li>
	            <?php
	    			wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' );
			}
			?>
        </ul><!-- /#nav -->
        <?php } ?>
        
        
        <ul class="rss fr">
            <?php
            	$email = '';
            	$rss = get_bloginfo_rss( 'rss2_url' );
            	
            	if ( isset( $woo_options['woo_subscribe_email'] ) && ( $woo_options['woo_subscribe_email'] != '' ) ) {
            		$email = $woo_options['woo_subscribe_email'];
            	}
            	
            	if ( isset( $woo_options['woo_feed_url'] ) && ( $woo_options['woo_feed_url'] != '' ) ) {
            		$rss = $woo_options['woo_feed_url'];
            	}
            	
            	if ( $email != '' ) {
            ?>
            <li class="sub-email"><a href="<?php echo esc_url( $email ); ?>" target="_blank"><?php _e( 'Email', 'woothemes' ); ?></a> |</li>
            <?php } ?>
            <li class="sub-rss"><a href="<?php echo $rss; ?>"><?php _e( 'RSS', 'woothemes' ); ?></a></li>
        </ul>

	</nav><!-- /#navigation -->
