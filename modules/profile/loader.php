<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	PROFILE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	11-10-2016
 */
 

 function number_to_day($jasotakoa)
{
	$r = "Urtzirula";
	switch ($jasotakoa)
	{
		case '0': 
		$r = "Astelehena"; 
		break;		
		case '1': 
		$r =  "Asteartea"; 
		break;	
		case '2': 
		$r =  "Asteazkena"; 
		break;	
		case '3': 
		$r =  "Osteguna"; 
		break;	
		case '4': 
		$r =  "Ostirala"; 
		break;	
		case '5': 
		$r =  "Larunbata"; 
		break;	
		case '6': 
		$r =  "Igandea"; 
		break;	
	}

	return $r;
}

 
 // Get my info
 $MODPATH = $M->get_module_info("profile")->path;
 require_once($MODPATH."profile.php");

 if (isset($_GET['about']))
 {

 	$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Honi buruz", "ICON" => "info", "MODULE" => "RadioCloud"));
	
 	$tpl_content = $HTMLOutput->GetFileContent('about.tpl', array("VERSION" => RADIOCLOUD_VERSION, "LICENSE_KEY" => get_config('license_key'), "LICENSE_AUTH" => get_config('license_auth'), "LICENSE_MAIL" => get_config('license_mail')));

 } else {

 $irratsaioa = $db->get_row("SELECT * FROM programs WHERE id=".$current_user->login_programid);
 $tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Informazioa", "ICON" => "child", "MODULE" => "Perfila"));
	

 $element = $HTMLOutput->GetFileContent('profile_info_element.tpl', array("NAME" => "Irratsaioa", "COLOR" => "warning", "VALUE" => $current_user->login_name));

 $element .= $HTMLOutput->GetFileContent('profile_info_element.tpl', array("NAME" => "Ordutegia", "COLOR" => "info", "VALUE" => number_to_day($irratsaioa->start_day)." ".$irratsaioa->start_time));


 $element .= $HTMLOutput->GetFileContent('profile_info_element.tpl', array("NAME" => "Iraupena", "COLOR" => "info", "VALUE" => $irratsaioa->duration." min"));	

 if ($irratsaioa->live_allowed)
 	$element .= $HTMLOutput->GetFileContent('profile_info_element.tpl', array("NAME" => "Zuzenekoa", "COLOR" => "info", "VALUE" => "Gaituta"));	
else
	 $element .= $HTMLOutput->GetFileContent('profile_info_element.tpl', array("NAME" => "Zuzenekoa", "COLOR" => "danger", "VALUE" => "Baimenik ez"));	


 //$tpl_content =  $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Zure perfila", "INFO" => ""));

 $tpl_content = $HTMLOutput->GetFileContent('profile.tpl', array("PHOTO" => $current_user->image, "USERNAME" => $current_user->login_name, "DESC" => $current_user->login_desc, "PROFILE_INFO" => $element, "TABLE_ELEMENTS" => $taula, "TABLE_ELEMENTS2" => $taula2));

}
 
