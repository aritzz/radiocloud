<?php
/*
 * RadioCloud - Cloud Radio Automation System
 *
 * 2016 Radixu Irratia - www.radixu.info
 * 		Aritz Olea <aritzolea@gmail.com>
 */

 if (file_exists("install.php"))
     header("Location: install.php");

 // Fitxategiak jaso
 require_once("include/default.inc.php");

 $current_user = new User_Login();
 


 // Hasieraketak
 $extrajs = "";

 if ($current_user->loginStatus() == FALSE) // load user info from cookies
 	{
	 	if ($_POST) // POST INFO
	 	{
		 	// Check user in db and log in
		 	$form_user = $db->escape($_POST['user']);
		 	$form_pass = $db->escape($_POST['password']);
			if ($current_user->doLogin($form_user, $form_pass))
				header("Location: index.php");
		 	
	 	} 
	 	// Show login window
	 	echo $HTMLOutput->GetFileContent('login.tpl', array("RC_VERSION" => RADIOCLOUD_VERSION));

 	}
 else if (isset($_GET['logout']))
 {
 	$current_user->doLogout();
 	header("Location: index.php");
 }
 else {
	 	require_once("include/logged_loader.inc.php");
	    //$HTMLchat = $HTMLOutput->GetFileContent('chat.tpl', array()); laster
       // $HTMLaside = $HTMLOutput->GetFileContent('aside.tpl', array());
        
     
	    // Load main template and more
 		echo $HTMLOutput->GetFileContent('base.tpl', array("MAIN_MENU" => $tpl_menu, "USER_PROFILE" => $tpl_userbar, "FOOTER" => $tpl_footer,  "NOTIFICATIONS" => $tpl_notifications, "PLAYING" => $tpl_playing, "CONFIG_WHEEL" => $tpl_config, "MESSAGES" => "", "CURRENT_LOCATION" => $tpl_location, "ASIDE" => "", "CHAT" => "", "CONTENT" => $tpl_content, "RADIONAME" => get_config('radioname'), "RADIODESCRIPTION" => get_config('radiodescription')));
 }
?>
