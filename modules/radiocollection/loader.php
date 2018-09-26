<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCOLLECTION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	17-09-2017
 */
 
 
 // Get my info
 $MODPATH = $M->get_module_info("radiocollection")->path;
 
 // Load module complements
// require_once($MODPATH."components.php");

// Shared functions
//require_once($MODPATH."functions.php");


switch ($_GET['c']) {
	default:
	    die($HTMLOutput->GetFileContent('404.tpl', array()));
	    break;
	case "berria":
		require_once($MODPATH."berria.php");
		break;
	case "bilduma":
		require_once($MODPATH."bilduma.php");
		break;

}

 
