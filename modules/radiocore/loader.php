<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	04-10-2016
 */
 
 
 // Get my info
 $MODPATH = $M->get_module_info("radiocore")->path;
 
// Load module components
// require_once($MODPATH."components.php");

// Shared functions
require_once($MODPATH."functions.php");
require_once($M->get_class_path()."blocks.class.php");
require_once($M->get_class_path()."podcasts.class.php");
require_once($M->get_class_path()."calendar.class.php");
require_once($M->get_class_path()."instances.class.php");
require_once($M->get_class_path()."jingles.class.php");


// Module switch
switch ($_GET['c']) {
	default:
	    die($HTMLOutput->GetFileContent('404.tpl', array()));
	    break;
	case "egutegia":
		require_once($MODPATH."calendar.php");
		break;
	case "blokeak":
		require_once($MODPATH."blocks.php");
		break;
    case "matrix":
        require_once($MODPATH."matrix.php");
        break;
	case "podcast":
		require_once($MODPATH."podcast.php");
		break;
    case "jingles":
        require_once($MODPATH."jingles.php");
        break;
}

 
