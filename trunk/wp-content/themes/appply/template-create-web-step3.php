<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Create Website - Step 3
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
            <div id="create-web-progress-bar">
                <div class="inline">
                    <div class="step active">
                        <span>1</span>
                        <div class="step-text active">ยืนยันตนเอง</div>
                    </div>

                </div>
                <div class="inline">
                    <div class="bar active"></div>
                    <div class="step active">
                        <span>2</span>
                        <div class="step-text active">กรอกข้อมูลติดต่อ</div>
                    </div>

                </div>
                <div class="inline">
                    <div class="bar active"></div>
                    <div class="step active">
                        <span>3</span>
                        <div class="step-text active">เลือกชื่อเว็บไซต์</div>
                    </div>

                </div>
                <div class="inline">
                    <div class="bar"></div>
                    <div class="step">
                        <span>4</span>
                        <div class="step-text">ยืนยันข้อมูล</div>
                    </div>
                </div>
            </div>

            <div id="create-web-content">
                <form action="step4" class="bg-gray" style="text-align: center">
                    <h3>เลือกชื่อเว็บไซต์</h3>
                    <span style="font-size: 18px;">http://www.srikrung.com/</span>
                    <input type="text" value="" placeholder="กรอกชื่อเว็บไซต์ที่ต้องการ (ภาษาอังกฤษ)" style="width: 30%" />
                    <input type="submit" value="ตรวจสอบ" />
                </form>
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