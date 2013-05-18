<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Create Website - Step 4
 *
 * @package WooFramework
 * @subpackage Template
 */

session_start();

if(isset($_SESSION["agent_no"])) {
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
                    <div class="bar active"></div>
                    <div class="step active">
                        <span>4</span>
                        <div class="step-text active">ยืนยันข้อมูล</div>
                    </div>
                </div>
            </div>

            <div id="create-web-content">
                <form action="#" class="bg-gray" id="create-web-agent-info">
                    <h3>ยืนยันข้อมูลของผู้สมัคร</h3>
                    <fieldset>
                        <legend>ข้อมูลการติดต่อ</legend>
                        <div class="field">
                            <label for="agent-first">ชื่อ</label>
                            <span>ทดสอบ</span>
                        </div>
                        <div class="field">
                            <label for="agent-last">นามสกุล</label>
                            <span>สร้างเว็บไซต์</span>
                        </div>
                        <div class="field">
                            <label for="agent-mobile">เบอร์โทรศัพท์มือถือ</label>
                            <span>082-7873533</span>
                        </div>
                        <div class="field">
                            <label for="agent-email">อีเมล์</label>
                            <span>thethak@gmail.com</span>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>ข้อมูลธุรกิจ</legend>
                        <div class="field">
                            <label for="agent-biz-name">ชื่อหน่วยธุรกิจ</label>
                            <span>หน่วยธุรกิจตัวอย่าง</span>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>ที่อยู่ธุรกิจ</legend>
                        <div class="field">
                            <label for="agent-biz-address">ที่อยู่</label>
                            <span>17/4 ซอยหกเขย ถนนตาคลีพัฒนา</span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-tumbol">ตำบล/แขวง</label>
                            <span>ตาคลี</span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-amphore">อำเภอ/เขต</label>
                            <span>ตาคลี</span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-province">จังหวัด</label>
                            <span>นครสวรรค์</span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-zipcode">รหัสไปรษณีย์</label>
                            <span>60140</span>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>ข้อมูลเว็บไซต์ธุรกิจ</legend>
                        <div class="field">
                            <label for="agent-biz-name">ชื่อเว็บไซต์</label>
                            <span>http://www.srikrung.com/</span><span style="color: #73b106">pithak</span>
                        </div>
                    </fieldset>
                    <input type="checkbox" value="1" id="create-web-comfirm" />
                    <label for="create-web-comfirm"> อนุญาตให้ Srikrung.com ส่งอีเมลที่มีเนื้อหาหรือคำแนะนำเกี่ยวกับประกันภัย  สินค้าต่างในเว็บไซต์ รวมถึงข้อเสนอพิเศษต่างๆ ที่เกี่ยวกับการพัฒนาเว็บไซต์และการทำธุรกิจออนไลน์ได้</label>
                    <div style="text-align: center"><input type="submit" value="บันทึกข้อมูล"/></div>
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