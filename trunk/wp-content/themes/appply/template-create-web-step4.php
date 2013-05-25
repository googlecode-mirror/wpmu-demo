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

if(strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
    if( $_POST['create-web-confirm'] != 1)
        $error_message = "<li>กรุณาติ๊กเพื่อยืนยันในการสร้างเว็บไซต์ส่วนตัวของคุณ และกดบันทึกข้อมูล</li>";
    else {
        $_POST['blog'] = array(
            "email" => $_SESSION["agent-email"],
            "domain" => $_SESSION['site-url'],
            "title" => '' . $_SESSION['site-url'] . '- by Srikrung'
        );

        update_agent_info($_SESSION);
        create_microweb();

        $_SESSION['create-web-finish'] = true;
        wp_redirect("step-finish");
        exit;
    }
}

function update_agent_info($agent_data) {
    $agent = get_user_from_agent_no($agent_data["agent_no"]);
    $user_id = $agent->ID;
    if ( $user_id ) {
        $user_id = wp_update_user(
            array(
                "ID" => $user_id,
                "user_email" => $agent_data['agent-email'],
            )
        );
        // update agent user meta data.
        update_user_meta($user_id, "agent-first", $agent_data['agent-first']);
        update_user_meta($user_id, "agent-last", $agent_data['agent-last']);
        update_user_meta($user_id, "agent-mobile", $agent_data['agent-mobile']);
        update_user_meta($user_id, "agent-biz-address", $agent_data['agent-biz-address']);
        update_user_meta($user_id, "agent-biz-tumbol", $agent_data['agent-biz-tumbol']);
        update_user_meta($user_id, "agent-biz-amphore", $agent_data['agent-biz-amphore']);
        update_user_meta($user_id, "agent-biz-province", $agent_data['agent-biz-province']);
        update_user_meta($user_id, "agent-biz-zipcode", $agent_data['agent-biz-zipcode']);
    }
}

function create_microweb() {
    global $_POST, $current_site, $current_user;

    if ( ! is_array( $_POST['blog'] ) )
        wp_die( __( 'Can&#8217;t create an empty site.' ) );
    $blog = $_POST['blog'];

    $email = sanitize_email( $blog['email'] );
    $title = $blog['title'];
    $domain = $blog['domain'];

    if ( empty( $domain ) )
        print_r(__( 'Missing or invalid site address.' ));
    if ( empty( $email ) )
        print_r(__( 'Missing email address.' ));
    if ( !is_email( $email ) )
        print_r(__( 'Invalid email address.' ));

    if ( is_subdomain_install() ) {
        $newdomain = $domain . '.' . preg_replace( '|^www\.|', '', $current_site->domain );
        $path      = $current_site->path;
    } else {
        $newdomain = $current_site->domain;
        $path      = $current_site->path . $domain . '/';
    }

    $password = 'N/A';
    $user_id = email_exists($email);
    if ( $user_id ) {
        $password = wp_generate_password( 12, false );
        $user_id = wp_update_user(array("ID" => $user_id, "user_pass" => $password ));
        if ( false == $user_id )
            print_r(__( 'There was an error updating the user.' ));
         else
             wp_new_user_notification( $user_id, $password );
    }

    $id = wpmu_create_blog( $newdomain, $path, $title, $user_id , array( 'public' => 1 ), $current_site->id );

    if ( !is_wp_error( $id ) ) {
        if ( !is_super_admin( $user_id ) && !get_user_option( 'primary_blog', $user_id ) )
            update_user_option( $user_id, 'primary_blog', $id, true );
        $content_mail = sprintf( __( 'New site created by %1$s

Address: %2$s
Name: %3$s' ), $current_user->user_login , get_site_url( $id ), stripslashes( $title ) );

        wp_mail( get_site_option('admin_email'), sprintf( __( '[%s] New Site Created' ), $current_site->site_name ), $content_mail, 'From: "Site Admin" <' . get_site_option( 'admin_email' ) . '>' );
        wpmu_welcome_notification( $id, $user_id, $password, $title, array( 'public' => 1 ) );
        // wp_redirect( add_query_arg( array( 'update' => 'added', 'id' => $id ), 'site-new.php' ) );
        // exit;
    } else {
        wp_die( $id->get_error_message() );
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
                    <div class="bar active"></div>
                    <div class="step active">
                        <span>4</span>
                        <div class="step-text active">ยืนยันข้อมูล</div>
                    </div>
                </div>
            </div>

            <div id="create-web-content">
                <?php if(isset($error_message)): ?>
                    <div class="error"><?php echo $error_message ?></div>
                <?php endif ?>
                <form action="" method="post" class="bg-gray" id="create-web-agent-info">
                    <h3>ยืนยันข้อมูลของผู้สมัคร</h3>
                    <fieldset>
                        <legend>ข้อมูลการติดต่อ</legend>
                        <div class="field">
                            <label for="agent-first">ชื่อ</label>
                            <span><?php echo $_SESSION['agent-first'] ?></span>
                        </div>
                        <div class="field">
                            <label for="agent-last">นามสกุล</label>
                            <span><?php echo $_SESSION['agent-last'] ?></span>
                        </div>
                        <div class="field">
                            <label for="agent-mobile">เบอร์โทรศัพท์มือถือ</label>
                            <span><?php echo $_SESSION['agent-mobile'] ?></span>
                        </div>
                        <div class="field">
                            <label for="agent-email">อีเมล์</label>
                            <span><?php echo $_SESSION['agent-email'] ?></span>
                        </div>
                    </fieldset>
<!--                    <fieldset>-->
<!--                        <legend>ข้อมูลธุรกิจ</legend>-->
<!--                        <div class="field">-->
<!--                            <label for="agent-biz-name">ชื่อหน่วยธุรกิจ</label>-->
<!--                            <span>หน่วยธุรกิจตัวอย่าง</span>-->
<!--                        </div>-->
<!--                    </fieldset>-->
                    <fieldset>
                        <legend>ที่อยู่ธุรกิจ</legend>
                        <div class="field">
                            <label for="agent-biz-address">ที่อยู่</label>
                            <span><?php echo $_SESSION['agent-biz-address'] ?></span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-tumbol">ตำบล/แขวง</label>
                            <span><?php echo $_SESSION['agent-biz-tumbol'] ?></span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-amphore">อำเภอ/เขต</label>
                            <span><?php echo $_SESSION['agent-biz-amphore'] ?></span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-province">จังหวัด</label>
                            <span><?php echo $_SESSION['agent-biz-province'] ?></span>
                        </div>
                        <div class="field">
                            <label for="agent-biz-zipcode">รหัสไปรษณีย์</label>
                            <span><?php echo $_SESSION['agent-biz-zipcode'] ?></span>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend>ข้อมูลเว็บไซต์ธุรกิจ</legend>
                        <div class="field">
                            <label for="agent-biz-name">ชื่อเว็บไซต์</label>
                            <span>http://www.srikrung.com/</span><span style="color: #73b106"><?php echo $_SESSION['site-url'] ?></span>
                        </div>
                    </fieldset>
                    <input type="checkbox" name="create-web-confirm" value="1" id="create-web-comfirm" />
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