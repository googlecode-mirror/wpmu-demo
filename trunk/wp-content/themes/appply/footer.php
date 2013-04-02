<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Footer Template
 *
 * Here we setup all logic and XHTML that is required for the footer section of all screens.
 *
 * @package WooFramework
 * @subpackage Template
 */
	global $woo_options;
?>

<div id="footer-wrapper">

<?php

	$total = 4;
	if ( isset( $woo_options['woo_footer_sidebars'] ) && ( $woo_options['woo_footer_sidebars'] != '' ) ) {
		$total = $woo_options['woo_footer_sidebars'];
	}

	if ( ( woo_active_sidebar( 'footer-1' ) ||
		   woo_active_sidebar( 'footer-2' ) ||
		   woo_active_sidebar( 'footer-3' ) ||
		   woo_active_sidebar( 'footer-4' ) ) && $total > 0 ) {

?>
		<?php woo_footer_before(); ?>

		<section id="footer-widgets" class="col-full col-<?php echo $total; ?> fix">

			<?php $i = 0; while ( $i < $total ) { $i++; ?>
				<?php if ( woo_active_sidebar( 'footer-' . $i ) ) { ?>

			<div class="block footer-widget-<?php echo $i; ?>">
	        	<?php woo_sidebar( 'footer-' . $i ); ?>
			</div>

		        <?php } ?>
			<?php } // End WHILE Loop ?>

		</section><!-- /#footer-widgets  -->
<?php } // End IF Statement ?>
		<footer id="footer" class="col-full" style="background: #eaeaea;>

<!--            default theme-->
<!--			    <div id="footer-left" class="col-left">
<!---->
<!--				--><?php //if( isset( $woo_options['woo_footer_left'] ) && $woo_options['woo_footer_left'] == 'true' ) {
//						echo stripslashes( $woo_options['woo_footer_left_text'] );
//				} else { ?>
<!--					<p class="copyright">--><?php //bloginfo(); ?><!-- &copy; --><?php //echo date( 'Y' ); ?><!--. --><?php //_e( 'All Rights Reserved.', 'woothemes' ); ?><!--</p>-->
<!--				--><?php //} ?>
<!---->
<!--				--><?php //if ( function_exists( 'has_nav_menu' ) && has_nav_menu( 'footer-menu' ) ) {
//					wp_nav_menu( array( 'depth' => 1, 'sort_column' => 'menu_order', 'container' => 'ul', 'menu_id' => 'footer-nav', 'menu_class' => 'nav', 'theme_location' => 'footer-menu' ) );
//				} ?>
<!---->
<!--		        --><?php //if( isset( $woo_options['woo_footer_right'] ) && $woo_options['woo_footer_right'] == 'true' ) {
//		        	echo stripslashes( $woo_options['woo_footer_right_text'] );
//				} else { ?>
<!--					<p class="credit">--><?php //_e( 'Powered by', 'woothemes' ); ?><!-- <a href="--><?php //echo esc_url( 'http://www.mafiashare.net' ); ?><!--">WordPress</a>. --><?php //_e( 'Designed by', 'woothemes' ); ?><!-- <a href="http://mobtel.ro"><img src="--><?php //echo esc_url( get_template_directory_uri() . '/images/woothemes.png' ); ?><!--" width="74" height="19" alt="telefoane mobile" /></a></p>-->
<!--				--><?php //} ?><!-- -->
<!---->
<!--				</div>-->

<!--            New custom-->
            <div id="footer-left" class="col-left" style="width: 65%">
                <div id="contact-address" style="display: block; float: left; width: 306px; margin: 30px 0 30px 60px">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/images/logo_gray_03.png' ); ?>" />
                    <div style="margin-top: 20px;">
<!--                        <p class="copyright ">ซอยเอกชัย 83/1 แขวงบางบอน</p>-->
<!--                        <p class="copyright ">เขตบางบอน กทม 10150</p>-->
<!--                        <p class="copyright ">Tel: 02-867-3888ม 02-867-380-04</p>-->
<!--                        <p class="copyright ">Fax: 02-899-4994</p>-->
<!--                        <p class="copyright ">Email : sale_group@srikrungbroker.co.th</p>-->

                        <ul>
                            <?php if (isset($woo_options['woo_contact_title']) && $woo_options['woo_contact_title'] != '' ) { ?><li><?php echo nl2br( esc_html( $woo_options['woo_contact_address'] ) ); ?></li><?php } ?>
                            <?php if (isset($woo_options['woo_contact_number']) && $woo_options['woo_contact_number'] != '' ) { ?><li><?php _e('Tel:','woothemes'); ?> <?php echo esc_html( $woo_options['woo_contact_number'] ); ?></li><?php } ?>
                            <?php if (isset($woo_options['woo_contact_fax']) && $woo_options['woo_contact_fax'] != '' ) { ?><li><?php _e('Fax:','woothemes'); ?> <?php echo esc_html( $woo_options['woo_contact_fax'] ); ?></li><?php } ?>
                            <?php if (isset($woo_options['woo_contactform_email']) && $woo_options['woo_contactform_email'] != '' ) { ?><li><?php _e('Email:','woothemes'); ?> <a href="mailto:<?php echo esc_attr( $woo_options['woo_contactform_email'] ); ?>"><?php echo esc_html( $woo_options['woo_contactform_email'] ); ?></a></li><?php } ?>
                        </ul>
                    </div>
                </div>
                <div id="sitemap-main" style="display: block; float: left; width: 180px; margin: 30px">
                    <h4>Sitemap</h4>
                    <ul>
                        <?php wp_list_pages( 'sort_column=menu_order&depth=6&title_li=&exclude=' ); ?>
                    </ul>
                </div>
            </div>

			<div id="footer-right" class="col-right">
				<div class="block" style="margin: 30px 30px 20px 0;">
                    <h4>Like us on Facebook</h4>
			        <?php woo_sidebar( 'footer-right' ); ?>
                       <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fplatform&amp;width=292&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true&amp;appId=193435037371900" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:290px; background-color: #ffffff" allowTransparency="false"></iframe>
				</div>
			</div>

		</footer><!-- /#footer  -->

        <!-- footer -->
        <div id="footer-copy" >
            <p>Copyright 2013 - Srikrung Co., Ltd. - All Rights Reserved.</p>
        </div>

	</div><!-- /#footer-wrapper -->

</div><!-- /#wrapper -->

<?php wp_footer(); ?>
<?php woo_foot(); ?>
</body>
</html>