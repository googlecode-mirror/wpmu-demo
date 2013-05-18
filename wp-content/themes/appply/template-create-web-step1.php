<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Create Website - Step 1
 *
 * @package WooFramework
 * @subpackage Template
 */

session_start();
unset($_SESSION['agent_no']);

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if(isset($_POST['agent_no']) && check_agent_no($_POST['agent_no'])) {
        $_SESSION["agent_no"] = $_POST["agent_no"];
        wp_redirect("step2");
        exit;
    } else {
        $error_message = "รหัสตัวแทนของคุณไม่ถูกต้อง";
    }
}

function check_agent_no($agent_no) {
    $agent_query = new WP_User_Query(array("meta_key" => 'agent_no', 'meta_value' => $agent_no));
    if(empty($agent_query->results))
        return false;
    return true;
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
                    <div class="bar"></div>
                    <div class="step">
                        <span>2</span>
                        <div class="step-text">กรอกข้อมูลติดต่อ</div>
                    </div>

                </div>
                <div class="inline">
                    <div class="bar"></div>
                    <div class="step">
                        <span>3</span>
                        <div class="step-text">เลือกชื่อเว็บไซต์</div>
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
                <?php if(isset($error_message)): ?>
                <div class="error"><?php echo $error_message ?></div>
                <?php endif ?>
                <form action="." method="post" class="bg-gray" style="text-align: center">
                    <h3>ตรวจสอบรหัสตัวแทน ศรีกรุงโบรคเกอร์</h3>
                    <input type="text" name="agent_no" value="" placeholder="กรอกรหัสตัวแทนศรีกรุงของคุณ" style="width: 30%" />
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