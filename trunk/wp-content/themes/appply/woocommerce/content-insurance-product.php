<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly
?>

<div itemscope itemtype="http://schema.org/Product" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>

    <div class="insurance-header" style="overflow: auto">
        <?php woocommerce_get_template("insurance-product/product-image.php"); ?>
        <div class="summary entry-summary" style="float: left; width: 85%;">
            <?php woocommerce_get_template( 'single-product/title.php' ); ?>
        </div><!-- .summary -->
    </div>

    <div class="insurance-detail" style="clear: both; margin-top: 30px;">
        <?php woocommerce_get_template("single-product/short-description.php"); ?>
        <?php // echo the_content(); ?>
    </div>

    <?php woocommerce_get_template("single-product/meta.php"); ?>

</div><!-- #product-<?php the_ID(); ?> -->
