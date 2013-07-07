<?php
if ( ! defined( 'ABSPATH' ) ) exit;
/**
 * Template Name: User SrikrungShop Login
 *
 * @package WooFramework
 * @subpackage Template
 */
?>

<!DOCTYPE html>
	<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php bloginfo('name'); ?> &rsaquo; <?php echo $title; ?></title>
    <style type="text/css">
    * {
        font-family: Arial;
    }
    body {
        /*background-image: url('/srikrung/wp-content/themes/appply/images/bg-user-login.jpg');*/
    }
    #form-user-login-wrapper {
        width: 340px;
        margin: 50px auto;
        border: 1px solid #f5f5f5;
        box-shadow: gray 0px 0px 8px
    }
    #form-user-login {
        padding: 20px;
    }
    #form-user-login label {
        display: block;
    }
    #form-user-login input[type=text], #form-user-login input[type=password] {
        width: 295px;
        font-size: 15px;
        font-weight: bold;
    }
    #form-title {
        background-color: #73b106;
        color: white;
        font-weight: bold;
        padding: 5px;
        text-align: center
    }
    </style>
</head>
<body>
<div id="form-user-login-wrapper">
    <div id="form-title">SrikrungShop Login</div>
    <div id="form-user-login">
        <?php echo wp_login_form(array("redirect" => get_home_url())) ?>
        <a href="<?php echo get_home_url() ?>/my-account/lost-password/">ลืมรหัสผ่าน</a>
    </div>
</div>
</body>
