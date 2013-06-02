<?php

global $wpdb;

if($_POST)
{
$javascript_enabled = trim($_REQUEST['browser_check']);
$name = trim($_REQUEST['name1']);
$email = trim($_REQUEST['email']);
$website = trim($_REQUEST['website']);
$msg = trim($_REQUEST['msg']);

include_once('../../../wp-load.php'); 
//OptionTree Stuff
if ( function_exists( 'get_option_tree') ) {
	$theme_options = get_option('option_tree');
    /* General Settings
    ================================================== */
    $contact_form_email_address = get_option_tree('contact_form_email_address',$theme_options);
}

//mail settings
$to = $contact_form_email_address;
if (!isset($to) || ($to == '') ){
	$to = get_option('admin_email');
}
$subject = '[Contact Form] From '.$name;
$headers = 'MIME-Version: 1.0' . "\n" . 'Content-type: text/plain; charset=UTF-8'. "\n" . 'From: <' . $email . ">\n";
$message = "Dear Team!\n\nThe following person has contacted you:\n\nName: $name\nE-Mail: $email\nWebsite: $website\nMessage: $msg\n";


	if ( $name == "" )
	{
		$result = "Name field is required";
	}
	elseif (!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/", $email)) 
	{
		$result = "Enter a valid email address";
	}
	elseif ( strlen($msg) < 100 )
	{
		$result = "Write more than 100 characters";
	}
	else
	{	
		
        mail($to, $subject, $message, $headers);
		$result = "Your mail has been sent succesfully!";
		
	}
	
	if($javascript_enabled == "true") {
		echo $result;
		die();
	}

}
?>