<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Create Website - Home
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
            
            <div id="create-web-home">
                <h3>เว็บไซต์ส่วนตัว โอกาสเพิ่มยอดขายให้กับตัวคุณเอง ง่าย ๆ เพียงปลายนิ้ว</h3>
                <p>8 ใน 10 ของคนไทยคนหาสินค้าและบริการออนไลน์ แต่มีเพียง 1 ใน 10 ของตัวแทนประกันภัยเท่านั้นที่มีเว็บไซต์ส่วนตัว โอกาสของตัวแทนทั้งหลายใน
                    การสร้างเว็บไซต์ส่วนตัวเพื่อเพิ่มช่องทางการขาย และเสริมความแข็งแกร่งของธุรกิจคุณด้วยเว็บไซต์ส่วนตัวมาถึงแล้ว!
                </p>
                <p>ระบบฟรีเว็บไซต์ที่เราให้บริการนี้ เป็นระบบที่ผู้ใช้สามารถเพิ่ม ลบ แก้ไข ข้อมูล, รูปภาพภายในเว็บไซต์ได้เอง โดยไม่ต้องเขียนรหัสแม้สักบรรทัดเดียว
                    ง่ายเหมือนเขียนเอกสารและนี่เป็นบริการที่ Srikrung.com ตั้งใจพัฒนาขึ้นมาเพื่อให้ตัวแทน <strong>“ศรีกรุงโบรกเกอร์”</strong> ได้มีโอกาส <strong>สร้างหรือขยาย ธุรกิจของท่าน</strong>
                    ผ่านระบบอินเตอร์เน็ต ซึ่ง Srikrung.com หวังเป็นอย่างยิ่งว่า เราจะได้มีโอกาสได้เป็นจุดเริ่มต้นเล็กๆ บนความสำเร็จในธุรกิจของท่าน
                </p>

                <h3 class="text-orange">รายละเอียดความสามารถของระบบ ฟรีเว็บไซต์</h3>
                <div id="create-web-info-sum-wrapper">
                    <ul style="display: inline-block">
                        <li>จำกัดพื้นที่ 25 MB</li>
                        <li>มีรูปแบบ Template สำเร็จให้เลือก</li>
                        <li>เพิ่ม/ลบ/แก้ไขข้อมูลได้เอง ตลอดเวลา</li>
                        <li>เพิ่ม/ลบ/แก้ไขโลโก้เว็บไซต์ได้เอง</li>
                    </ul>
                    <ul style="display: inline-block">
                        <li>สร้างหน้าเว็บได้ไม่จำกัด</li>
                        <li>มีสถิติการเข้าชมเว็บไซต์</li>
                        <li>มีคู่มือการใช้งาน</li>
                    </ul>
                </div>
                <div id="create-web-button">
                    <a href="./สิทธิประโยชน์/" target="_blank"><img src="<?php echo get_template_directory_uri() ?>/images/create-web-button.png" alt="เริ่มต้นสร้างเว็บไซต์"/></a>
                </div>
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