<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	CONFIGURATION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	11-10-2016
 */
 
 
 // Get my info
 $MODPATH = $M->get_module_info("radiopodcast")->path;
 
 // Shared functions
//require_once($MODPATH."functions.php");




	
switch ($_GET['c']) {
	default:
	    require_once($MODPATH."igotzeak.php");
		break;
	case "igotzeak":
		require_once($MODPATH."igotzeak.php");
		break;
	case "irratsaioak":
		require_once($MODPATH."irratsaioak.php");
		break;
	case "emisioa":
		require_once($MODPATH."emisioa.php");
		break;
}

 