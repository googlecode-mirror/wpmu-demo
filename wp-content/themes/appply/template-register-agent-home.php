<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Register Agent - Home
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;
 get_header();
?>

    <div id="content" class="page col-full">

        <?php woo_main_before(); ?>

        <section id="main" class="fullwidth">
            
            <div id="register-aget-menu">
                <a href="./สิทธิประโยชน์/" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/register-agent-menu-01.png" alt="สิทธิประโยชน์ของตัวแทน"/></a>
                <a href="./ขั้นตอนการสมัครตัวแทน/" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/register-agent-menu-02.png" alt="ขั้นตอนการสมัครตัวแทน"/></a>
                <a href="./ดาวน์โหลดใบสมัคร" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/register-agent-menu-03.png" alt="ดาวน์โหลดใบสมัครตัวแทน"/></a>
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