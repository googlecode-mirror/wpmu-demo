<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Register Agent - Privilege
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
        <div style="display: block; overflow: hidden">
            <img src="<?php echo get_template_directory_uri() ?>/images/register-agent-privilege-banner.png" id="privilege-banner-left" alt="สิทธิประโยชน์ของตัวแทน"/>

            <div id="privilege-info-right">
                <h2 class="text-orange">รับสมัครตัวแทน รายได้ดี</h2>
                <p>ตัวแทนจะได้รับค่าคอมฯ ตามเกณฑ์มาตรฐานของบริษัท ซึ่งอยู่ในอัตราที่สูงเทียบเท่า หรือมากกว่ามาตรฐานทั่วไป อีกทั้งมีระบบผ่อนชำระสูงถึง 6 งวด โดยตัวแทนยังได้ค่าคอมฯ</p>
                <h3>สิ่งที่คุณจะได้รับจากบริษัท หากสมัครเป็นตัวแทนของ ศรีกรุงโบรคเกอร์</h3>
                <div id="privilege-info-sum-wrapper">
                    <ul id="privilege-info-sum">
                        <li>ประกันอุบัติเหตุ <span class="text-orange">50,000</span> บาท</li>
                        <li>รับส่วนลดเพิ่มสูงสุด <span class="text-orange">12 %</span> เบี้ยประกกันสำหรับสมาชิก</li>
                        <li>ผ่อนได้สูงสุด 6 งวด ดอกเบี้ย <span class="text-orange">0%</span></li>
                        <li>แจกคู่มือและ DVD ความรู้ประกันวินาศภัย</li>
                        <li>เข้าอบรมหลักสูตรต่างๆจากบริาัทประกันภัยชั้นนำ</li>
                        <li>มีเจ้าหน้าที่สินไหมให้คำปรึกษา</li>
                        <li>จัดส่งกรมธรรม์ถึงบ้าน <span class="text-orange">ฟรี!!!</span></li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="clear: both; margin-top: 20px; display: block">
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
        </div>

        </section><!-- /#main -->

        <?php woo_main_after(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>