<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) exit;
?><?php
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
	global $woo_options;

	$settings = array(
				'homepage_enable_features' => 'true', 
				'homepage_enable_content' => 'true',
				'homepage_content_type' => 'posts',
				'homepage_enable_testimonials' => 'true', 
				'homepage_enable_intro_message' => 'true',
				'homepage_number_of_features' => 3,
				'homepage_number_of_testimonials' => 3, 
				'homepage_features_area_title' => '',
				'homepage_testimonials_area_title' => sprintf( __( 'What people think of %s', 'woothemes' ), get_bloginfo( 'name' ) )
				);
					
	$settings = woo_get_dynamic_values( $settings );
?>

    <div id="content" class="col-full">

        <div id="product-recommend">
            <div class="product-slider">
                <?php
                $args = array('post_type' => 'product', 'posts_per_page' => 12);
                $loop = new WP_Query( $args );
                if ( $loop->have_posts() ) {
                    while ( $loop->have_posts() ) : $loop->the_post(); ?>
                        <div class="slide">
                            <div class="product-photo"><a href="<?php echo $loop->post->guid ?>"><?php echo $product->get_image() ?></a></div>
                            <div class="product-name"><a href="<?php echo $loop->post->guid ?>"><?php echo $product->get_title() ?></a></div>
                        </div>
                    <?php endwhile;
                } else {
                    echo __( 'No products found' );
                }
                ?>
            </div>
        </div>

        <div id="agent-recommend">
            <div class="agent-slider">
                <?php
                $args = array('role' => 'agent'); // TODO : add this args to get_users() for filtering only agent users.
                $agents = get_users();
                foreach ($agents as $agent): ?>
                    <div class="slide">
                        <div class="agent-photo"><?php echo get_wp_user_avatar($agent->ID, 100, 'center'); ?></div>
                        <div class="agent-name"><?php echo $agent->display_name ?><br><?php echo $agent->user_email ?></div>
                    </div>
                <?php endforeach ?>

            </div>
        </div>

        <div id="banner-footer">
            <div id="banner-read-btn">
                <img src="<?php echo esc_url( get_template_directory_uri() . '/images/buttons/readeDetailButton.png' ); ?>" alt=""/>
            </div>
        </div>

<!--    	--><?php //woo_main_before(); ?>
<!--		-->
<!--		<section id="main" class="col-full fullwidth">-->
<!--			--><?php
//				if ( is_home() && ! dynamic_sidebar( 'homepage' ) ) {
//					if ( 'true' == $settings['homepage_enable_features'] ) {
//						do_action( 'woothemes_features', array( 'size' => 60, 'per_row' => 3, 'limit' => $settings['homepage_number_of_features'] ) );
//					}
//
//					if ( 'true' == $settings['homepage_enable_content'] ) {
//						switch ( $settings['homepage_content_type'] ) {
//							case 'page':
//							get_template_part( 'includes/specific-page-content' );
//							break;
//
//							case 'posts':
//							default:
//							get_template_part( 'includes/blog-posts' );
//							break;
//						}
//					}
//
//					if ( 'true' == $settings['homepage_enable_testimonials'] ) {
//						do_action( 'woothemes_testimonials', array( 'title' => $settings['homepage_testimonials_area_title'], 'per_row' => 3, 'limit' => $settings['homepage_number_of_testimonials'] ) );
//					}
//
//					if ( 'true' == $settings['homepage_enable_intro_message'] ) {
//						get_template_part( 'includes/intro-message' );
//					}
//				}
//			?>
<!---->
<!--		</section><!-- /#main -->
<!---->
<!--		--><?php //woo_main_after(); ?>
    </div><!-- /#content -->
		
<?php get_footer(); ?>