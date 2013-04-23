<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: Member List
 *
 * The blog page template displays the "blog-style" template on a sub-page.
 *
 * @package WooFramework
 * @subpackage Template
 */

 global $woo_options;
 get_header();
?>

    <!-- #content Starts -->
    <div id="content" class="col-full">

        <?php woo_main_before(); ?>

        <section id="main" class="col-left">

            <div class="member-list">
                <ul>
                    <?php
                    $blogusers = get_users('blog_id=1&orderby=displayname&role=Agent');
                    foreach ($blogusers as $user) {
                        echo '<li>' . $user->user_email . '</li>';
                    }
                    ?>
                </ul>
            </div><!--end member_list class-->

            <?php woo_pagenav(); ?>
            <?php wp_reset_query(); ?>

        </section><!-- /#main -->

        <?php woo_main_after(); ?>

        <?php get_sidebar(); ?>

    </div><!-- /#content -->

<?php get_footer(); ?>