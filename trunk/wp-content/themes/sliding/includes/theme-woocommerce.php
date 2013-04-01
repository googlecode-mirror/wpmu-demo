<?php
/*-------------------------------------------------------------------------------------------*/
/* WOOCOMMERCE OVERRIDES */
/*-------------------------------------------------------------------------------------------*/

// Disable WooCommerce styles 
if ( !defined( 'WOOCOMMERCE_USE_CSS' ) ) { define( 'WOOCOMMERCE_USE_CSS', false ); }

/*-------------------------------------------------------------------------------------------*/
/* GENERAL LAYOUT */
/*-------------------------------------------------------------------------------------------*/

//Add an HTML5 Shim
add_action( 'wp_head', 'html5_shim');

if (!function_exists('html5_shim')) {
	function html5_shim() {
		?>
		<!--[if lt IE 9]>
			<script src="https://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php
	}
}

// Adjust markup on all woocommerce pages
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
add_action('woocommerce_before_main_content', 'woocommerce_sliding_before_content', 10);
add_action('woocommerce_after_main_content', 'woocommerce_sliding_after_content', 20);

if (!function_exists('woocommerce_sliding_before_content')) {
	function woocommerce_sliding_before_content() {
		?>
		<!-- #content Starts -->
		<?php woo_content_before(); ?>
	    <div id="content" class="col-full">
			
	        <!-- #main Starts -->
	        <?php woo_main_before(); ?>
	        <div id="main" class="col-left">
	        
	    <?php
	}
}

if (!function_exists('woocommerce_sliding_after_content')) {
	function woocommerce_sliding_after_content() {
		?>
		
			</div><!-- /#main -->
	        <?php woo_main_after(); ?>
	    
	    </div><!-- /#content -->
		<?php woo_content_after(); ?>
	    <?php
	}
}

// Add image wrap
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_product_thumbnail_wrap_open', 5, 2);
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_product_thumbnail_wrap_open', 5, 2);

if (!function_exists('woocommerce_product_thumbnail_wrap_open')) {
	function woocommerce_product_thumbnail_wrap_open() {
		echo '<div class="img-wrap">';
	}
}

// Close image wrap
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_product_thumbnail_wrap_close', 15, 2);
add_action( 'woocommerce_before_subcategory_title', 'woocommerce_product_thumbnail_wrap_close', 15, 2);
if (!function_exists('woocommerce_product_thumbnail_wrap_close')) {
	function woocommerce_product_thumbnail_wrap_close() {
		echo '</div> <!--/.wrap-->';
	}
}

// Move sale flash in product loop
remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_sale_flash', 10, 2);
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_show_product_sale_flash', 10, 2);

// Remove add to cart in the loop
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 2);

// Change columns in product loop to 4
add_filter('loop_shop_columns', 'loop_columns');

if (!function_exists('loop_columns')) {
	function loop_columns() {
		return 4;
	}
}

// Display 16 products per page
add_filter('loop_shop_per_page', create_function('$cols', 'return 16;'));

// Change thumbs on the single page to 4 per column
add_filter( 'woocommerce_product_thumbnails_columns', 'woocommerce_custom_product_thumbnails_columns' );

if (!function_exists('woocommerce_custom_product_thumbnails_columns')) {
	function woocommerce_custom_product_thumbnails_columns() {
		return 4;
	}
}

// Remove WC sidebar
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

// Add the WC sidebar in the right place
add_action( 'woo_main_after', 'woocommerce_get_sidebar', 10);

// Remove pagination (we're using the WooFramework default pagination)
remove_action( 'woocommerce_pagination', 'woocommerce_pagination', 10 );
add_action( 'woocommerce_pagination', 'woocommerceframework_pagination', 10 );

if (!function_exists('woocommerceframework_pagination')) {
	function woocommerceframework_pagination() {
		if ( is_search() && is_post_type_archive() ) {
			add_filter( 'woo_pagination_args', 'woocommerceframework_add_search_fragment', 10 );
		}
		woo_pagenav();
	}
}

if (!function_exists('woocommerceframework_add_search_fragment')) {
	function woocommerceframework_add_search_fragment ( $settings ) {
		$settings['add_fragment'] = '&post_type=product';
		return $settings;
	} // End woocommerceframework_add_search_fragment()
}

/*-------------------------------------------------------------------------------------------*/
/* BREADCRUMB */
/*-------------------------------------------------------------------------------------------*/

// Remove WC breadcrumb (we're using the WooFramework breadcrumb)
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);
add_action('wp', 'show_woocommerce_breadcrumb' );

if (!function_exists('show_woocommerce_breadcrumb')) {
	function show_woocommerce_breadcrumb() {
		global $woo_options;
		
		if ( $woo_options[ 'woo_breadcrumbs_show' ] == 'true' ) :
			if (is_singular(array('product'))) :
				add_action( 'woocommerce_before_single_product_summary', 'woo_breadcrumbs', 10);
			else :
				add_action( 'woocommerce_before_main_content', 'woo_breadcrumbs', 20);
			endif;
		endif;
	}
}

// Customise the breadcrumb
add_filter( 'woo_breadcrumbs_args', 'woo_custom_breadcrumbs_args', 10 );

if (!function_exists('woo_custom_breadcrumbs_args')) {
	function woo_custom_breadcrumbs_args ( $args ) {
		$textdomain = 'woothemes';
		$title = get_bloginfo( 'name' );
		$args = array('separator' => '/', 'before' => '', 'show_home' => __( $title, $textdomain ),);
		return $args;	
	} // End woo_custom_breadcrumbs_args()
}

// Adjust the star rating in the sidebar
add_filter('woocommerce_star_rating_size_sidebar', 'woostore_star_sidebar');

if (!function_exists('woostore_star_sidebar')) {
	function woostore_star_sidebar() {
		return 12;
	}
}

/*-------------------------------------------------------------------------------------------*/
/* SINGLE PRODUCT */
/*-------------------------------------------------------------------------------------------*/

// Move the product data tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
add_action( 'woocommerce_after_single_product', 'woocommerce_output_product_data_tabs', 10);

// Add description h2 to description
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_heading', 11, 2);

function woocommerce_template_single_heading() {
	echo '<h2>';
	_e('Description','woothemes');
	echo '</h2>';
}

// Add the main description after the excerpt
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_content', 25, 2);

function woocommerce_template_single_content() {
	the_content();
}

// Remove main description tab
remove_action( 'woocommerce_product_tabs', 'woocommerce_product_description_tab', 10 );
remove_action( 'woocommerce_product_tab_panels', 'woocommerce_product_description_panel', 10 );

// Change columns in related products output to 4 and move below the product summary 
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action( 'woocommerce_after_single_product', 'woocommerce_output_related_products', 20);

if (!function_exists('woocommerce_output_related_products')) {
	function woocommerce_output_related_products() {
	    woocommerce_related_products(4,4); 
	}
}

// Change columns in upsells output to 3 and move below the product summary
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
add_action( 'woocommerce_after_single_product', 'woocommerceframework_upsell_display', 20);

if (!function_exists('woocommerceframework_upsell_display')) {
	function woocommerceframework_upsell_display() {
	    woocommerce_upsell_display(4,4);
	}
}

// If theme lightbox is enabled, disable the WooCommerce lightbox and make product images prettyPhoto galleries
add_action( 'wp_footer', 'woocommerce_prettyphoto' );
function woocommerce_prettyphoto() {
	global $woo_options;
	if ( $woo_options[ 'woo_enable_lightbox' ] == "true" ) {
		update_option( 'woocommerce_enable_lightbox', false );
		?>
			<script>
				jQuery(document).ready(function(){
					jQuery('.images a').attr('rel', 'prettyPhoto[product-gallery]');
				});
			</script>
		<?php
	}
}

/*-------------------------------------------------------------------------------------------*/
/* SHORTCODES */
/*-------------------------------------------------------------------------------------------*/

// Sticky shortcode
function woo_shortcode_sticky( $atts, $content = null ) {
   extract( shortcode_atts( array(
      'class' => '',
      ), $atts ) );
 
   return '<div class="shortcode-sticky ' . esc_attr($class) . '">' . $content . '</div><!--/shortcode-sticky-->';
}

add_shortcode( 'sticky', 'woo_shortcode_sticky' );

// Sale shortcode
function woo_shortcode_sale ( $atts, $content = null ) {
	$defaults = array();
	extract( shortcode_atts( $defaults, $atts ) );
	return '<div class="shortcode-sale"><span>' . $content . '</span></div><!--/.shortcode-sale-->';
}

add_shortcode( 'sale', 'woo_shortcode_sale' );

/*-------------------------------------------------------------------------------------------*/
/* WIDGETS */
/*-------------------------------------------------------------------------------------------*/

// Adjust the star rating in the recent reviews widget
add_filter('woocommerce_star_rating_size_recent_reviews', 'woostore_star_reviews');

if (!function_exists('woostore_star_reviews')) {
	function woostore_star_reviews() {
		return 12;
	}
}

/*-------------------------------------------------------------------------------------------*/
/* AJAX FRAGMENTS */
/*-------------------------------------------------------------------------------------------*/

// Handle cart in header fragment for ajax add to cart
/*add_filter('add_to_cart_fragments', 'woocommerceframework_header_add_to_cart_fragment');

function woocommerceframework_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;
	
	ob_start();
	
	?>
	<ul class="mini-cart">
		<li>
			<a href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>" class="cart-parent">
				<span> 
			<?php 
			echo $woocommerce->cart->get_cart_total();;
			echo sprintf(_n('<mark>%d item</mark>', '<mark>%d items</mark>', $woocommerce->cart->get_cart_contents_count(), 'woothemes'), $woocommerce->cart->get_cart_contents_count());
			?>
			</span>
			</a>
			<?php
	
	        echo '<ul class="cart_list">';
	        echo '<li class="cart-title"><h3>'.__('Your Cart Contents', 'woothemes').'</h3></li>';
	           if (sizeof($woocommerce->cart->cart_contents)>0) : foreach ($woocommerce->cart->cart_contents as $cart_item_key => $cart_item) :
		           $_product = $cart_item['data'];
		           if ($_product->exists() && $cart_item['quantity']>0) :
		               echo '<li class="cart_list_product"><a href="'.get_permalink($cart_item['product_id']).'">';
		               
		               if (has_post_thumbnail($cart_item['product_id'])) echo get_the_post_thumbnail($cart_item['product_id'], 'shop_thumbnail'); 
		               else echo '<img src="'.$woocommerce->plugin_url(). '/assets/images/placeholder.png" alt="Placeholder" width="'.$woocommerce->get_image_size('shop_thumbnail_image_width').'" height="'.$woocommerce->get_image_size('shop_thumbnail_image_height').'" />'; 
		               
		               echo apply_filters('woocommerce_cart_widget_product_title', $_product->get_title(), $_product).'</a>';
		               
		               if($_product instanceof woocommerce_product_variation && is_array($cart_item['variation'])) :
		                   echo woocommerce_get_formatted_variation( $cart_item['variation'] );
		                 endif;
		               
		               echo '<span class="quantity">' .$cart_item['quantity'].' &times; '.woocommerce_price($_product->get_price()).'</span></li>';
		           endif;
		       endforeach;
	
	        	else: echo '<li class="empty">'.__('No products in the cart.','woothemes').'</li>'; endif;
	        	if (sizeof($woocommerce->cart->cart_contents)>0) :
	            echo '<li class="total"><strong>';
	
	            if (get_option('js_prices_include_tax')=='yes') :
	                _e('Total', 'woothemes');
	            else :
	                _e('Subtotal', 'woothemes');
	            endif;
						
					
						
	            echo ':</strong>'.$woocommerce->cart->get_cart_total();'</li>';
	
	            echo '<li class="buttons"><a href="'.$woocommerce->cart->get_cart_url().'" class="button">'.__('View Cart &rarr;','woothemes').'</a> <a href="'.$woocommerce->cart->get_checkout_url().'" class="button checkout">'.__('Checkout &rarr;','woothemes').'</a></li>';
	        endif;
	        
	        echo '</ul>';
	
	    ?>
		</li>
	</ul>
	<?php
	
	$fragments['ul.mini-cart'] = ob_get_clean();
	
	return $fragments;
	
}*/

?>