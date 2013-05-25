<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Create Website - Step Finish
 *
 * @package WooFramework
 * @subpackage Template
 */

session_start();

if( isset($_SESSION["agent_no"]) && ($_SESSION['create-web-finish'] == true) ) {
    $agent_no = $_SESSION["agent_no"];
} else {
    wp_redirect("step1");
    exit;
}


global $woo_options;
get_header();
?>

    <div id="content" class="page col-full">

        <?php woo_main_before(); ?>

        <section id="main" class="fullwidth">

            <div id="create-web-content">
                <div class="success">ระบบได้สร้างเว็บไซต์ของคุณ และส่งอีเมล์ข้อมูลเว็บไซต์ให้คุณแล้ว ;)</div>
            </div>


            <?php
            if ( have_posts() ) { $count = 0;
                while ( have_posts() ) { the_post(); $count++;
                    ?>
                    <article <?php post_class(); ?>>

                        <section class="entry">
                            <?php the_content(); ?>
                        </section><!-- /.entry -->

                        <?php edit_post_link( __( '{ Edit }', 'woothemes' ), '<span class="small">', '</span>' ); ?>

                    </article><!-- /.post -->

                <?php
                } // End WHILE Loop
            }
            else {
                ?>
                <article <?php post_class(); ?>>
                    <p><?php _e( 'Sorry, no posts matched your criteria.', 'woothemes' ); ?></p>
                </article><!-- /.post -->
            <?php }
            ?>

        </section><!-- /#main -->

        <?php woo_main_after(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>