<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Create Website - Step 3
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

$agent = get_user_from_agent_no($_SESSION["agent_no"]);

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {

    // make sure the domain isn't a reserved word, when subdomain in not install.
    $subdirectory_reserved_names = apply_filters( 'subdirectory_reserved_names', array( 'page', 'comments', 'blog', 'files', 'feed' ) );
    if ( in_array( $_POST['site-url'], $subdirectory_reserved_names ) ) {
        $error_message .= '<li>' . sprintf( __('คุณไม่สามารถตั้งชื่อเว็บไซต์ด้วยคำสงวนเหล่านี้ได้ : <code>%s</code>' ), implode( '</code>, <code>', $subdirectory_reserved_names ) ) . '</li>';
    } // check url format and empty.
    elseif ( ! preg_match( '|^([a-zA-Z0-9-])+$|', $_POST['site-url'] ) ) {
        $error_message .= '<li>URL ของคุณไม่ถูกต้อง</li>';
    }
    else {
        $_SESSION['site-url'] = strtolower( $_POST['site-url'] );
        wp_redirect("step4");
        exit;
    }
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
                <form action="" method="post" class="bg-gray" style="text-align: center">
                    <h3>เลือกชื่อเว็บไซต์</h3>
                    <span style="font-size: 18px;">http://www.srikrung.com/</span>
                    <input type="text" name="site-url" value="<?php echo $_POST['site-url'] ?>" placeholder="กรอกชื่อเว็บไซต์ที่ต้องการ (ภาษาอังกฤษ)" style="width: 30%" />
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