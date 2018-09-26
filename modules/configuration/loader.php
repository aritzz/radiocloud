<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	CONFIGURATION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	11-10-2016
 */
 
 
 // Get my info
 $MODPATH = $M->get_module_info("configuration")->path;
 
 // Shared functions
//require_once($MODPATH."functions.php");

// Level ADMIN needed to access here
if ($current_user->login_level < ADMIN_LEVEL) 
	die($HTMLOutput->GetFileContent('404.tpl', array()));

function load_config_menu($id, $content) {
	global $HTMLOutput;

	$status = array();
	for ($i=0;$i<8;$i++)
		$status[$i] = "";

	$status[$id] = "active";

	return $HTMLOutput->GetFileContent('configtabs.tpl', array("0"=> $status[0], "1"=> $status[1], "2"=> $status[2], "3"=> $status[3], "4"=> $status[4], "5"=> $status[5], "6"=> $status[6], "RIGHT_MENU" => $content));
}	


	$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Konfigurazio orokorra", "ICON" => "child", "MODULE" => "RadioCloud"));
	
	$modulecount = $db->get_var("SELECT COUNT(*) FROM modules");
$usercount = $db->get_var("SELECT COUNT(*) FROM users");
$podcastcount = $db->get_var("SELECT COUNT(*) FROM podcast_download");



	switch ($_GET['c']) {
	default:
	    $c = $HTMLOutput->GetFileContent('config_default.tpl', array("VERSION" => RADIOCLOUD_VERSION, "USERS" => $usercount, "MODULES" => $modulecount, "PODCASTS" => $podcastcount));
		$tpl_content = load_config_menu(0, $c);
	    break;
	case "users":
		require_once($MODPATH."erabiltzaileak.php");
		break;
	case "mode":
		require_once($MODPATH."access.php");
		break;
	case "ident":
		require_once($MODPATH."global.php");
		break;
	case "uploads":
		require_once($MODPATH."uploads.php");
		break;
	case "dirs":
		require_once($MODPATH."dirs.php");
		break;
	case "logs":
		require_once($MODPATH."logs.php");
		break;
	case "tokens":
		require_once($MODPATH."tokens.php");
		break;
    case "notes":
        require_once($MODPATH."notes.php");
        break;
}

 