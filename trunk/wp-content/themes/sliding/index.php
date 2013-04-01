<?php
/**
 * Index Template
 *
 * Here we setup all logic and XHTML that is required for the index template, used as both the homepage
 * and as a fallback template, if a more appropriate template file doesn't exist for a specific context.
 *
 * @package WooFramework
 * @subpackage Template
 */
	get_header();
	global $woo_options, $woocommerce;
	
/**
 * The Variables
 *
 * Setup default variables, overriding them if the "Theme Options" have been saved.
 */
	
	$settings = array(
	'thumb_w' => 100, 
	'thumb_h' => 100, 
	'thumb_align' => 'alignleft'
	);
					
	$settings = woo_get_dynamic_values( $settings );

/**
 * Meta query
 *
 * Prepare meta query for hiding invisible products
 */
if ( is_woocommerce_activated() ) {
	$meta_query = array();
	$meta_query[] = $woocommerce->query->visibility_meta_query();
    $meta_query[] = $woocommerce->query->stock_status_meta_query();
}
?>

<div id="homepage">
	
	<?php if ( $woo_options[ 'woo_homepage_featured_products' ] == "true" && is_woocommerce_activated() ) { 
	
	$width = (isset($woo_options['woo_featured_image_width']) && $woo_options['woo_featured_image_width']) ? $woo_options['woo_featured_image_width'].'px' : '192px';
	$height = (isset($woo_options['woo_featured_image_height']) && $woo_options['woo_featured_image_height']) ? $woo_options['woo_featured_image_height'].'px' : '375px';
	?>
	
	<div class="slider-wrap">
	
		<div id="slider" class="col-full">
			<a class="buttons prev jcarousel-prev" href="#">left</a>
			<div class="viewport">
				<ul class="overview">
				<?php
				$featured_products_per_page = get_option('woo_homepage_featured_products_number');
				$args = array( 'post_type' => 'product', 'posts_per_page' => $featured_products_per_page, 'meta_key' => '_featured', 'meta_value' => 'yes', 'meta_query' => $meta_query );
				$loop = new WP_Query( $args );
				while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
						
						<li>
							<?php // woocommerce_show_product_sale_flash( $post, $product ); ?>
							<a href="<?php echo get_permalink( $loop->post->ID ) ?>" style="width: <?php echo $width; ?>; height: <?php echo $height; ?>;">
								<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'woo_sliding_slider'); ?>
								
								<div class="meta">
									<h3><?php the_title(); ?></h3>
									<span class="slider-price"><?php echo $product->get_price_html(); ?></span>
								</div>
								
							</a>
							
						</li>
					
				<?php endwhile; ?>
				
				</ul>
			</div>
			<a class="buttons next jcarousel-next" href="#">right</a>
		</div>
	
	</div>
	
	<?php } ?>

	<div class="feature-wrap">
	
	    <div class="col-full">
			
			<!-- The recent products -->
			<?php if ( $woo_options[ 'woo_homepage_recent_products' ] == "true" && is_woocommerce_activated() ) { ?>
			<h2><span><?php _e('New Products', 'woothemes'); ?></span></h2>
			<div id="recent-products" class="carousel">
			<ul class="recent-products carousel-products">
					
			<?php
			$recent_products_per_page = get_option('woo_homepage_recent_products_number');
			$args = array( 'post_type' => 'product', 'posts_per_page' => $recent_products_per_page, 'meta_key' => '_featured', 'meta_value' => 'no', 'meta_query' => $meta_query );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					
					<li>
						
						<?php // woocommerce_show_product_sale_flash( $post, $product ); ?>
						<div class="img-wrap">
						<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
						</a>
						</div>
						
						<h3><a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php // echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php the_title(); ?> </a></h3>
						<span class="carousel-price"><?php echo $product->get_price_html(); ?></span>
					
						<?php // woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
						
					</li>
				
			<?php endwhile; ?>
			
			</ul>
			</div><!--/.carousel-->
			<?php } else { ?>
			        	
			<?php } ?>
			
			<!-- The best selling products -->
			<?php if ( $woo_options[ 'woo_homepage_best_selling_products' ] == "true" && is_woocommerce_activated() ) { ?>
			<h2><span><?php _e('Best Sellers', 'woothemes'); ?></span></h2>
			<div id="bestselling-products" class="carousel">
			<ul class="bestselling-products carousel-products">
					
			<?php
			$best_selling_products_per_page = get_option('woo_homepage_best_selling_products_number');
			$args = array( 'post_type' => 'product', 'posts_per_page' => $best_selling_products_per_page, 'meta_key' => 'total_sales', 'orderby' => 'meta_value', 'meta_query' => $meta_query );
			$loop = new WP_Query( $args );
			while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
					
					<li>
						
						<?php // woocommerce_show_product_sale_flash( $post, $product ); ?>
						<div class="img-wrap">
						<a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>">
							<?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.woocommerce_placeholder_img_src().'" alt="Placeholder" />'; ?>
						</a>
						</div>
						
						<h3><a href="<?php echo get_permalink( $loop->post->ID ) ?>" title="<?php echo esc_attr($loop->post->post_title ? $loop->post->post_title : $loop->post->ID); ?>"><?php the_title(); ?> </a></h3>
						<span class="carousel-price"><?php echo $product->get_price_html(); ?></span>
					
						<?php // woocommerce_template_loop_add_to_cart( $loop->post, $product ); ?>
						
					</li>
				
			<?php endwhile; ?>
			
			</ul>
			</div><!--/.carousel-->
			<?php } else { ?>
			        	
			<?php } ?>
			
	    </div><!-- /#col-full -->
	    
	</div><!--/.feature-wrap-->

</div><!-- /#homepage -->
		
<?php get_footer(); ?>