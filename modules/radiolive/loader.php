<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOLIVE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	10-10-2016
 */
 
 
 // Get my info
 $MODPATH = $M->get_module_info("radiolive")->path;
 
 // Shared functions in module
//require_once($MODPATH."functions.php");

 // Classes used by module
 require_once($M->get_class_path()."signals.class.php");
 require_once($M->get_class_path()."blocks.class.php");
 require_once($M->get_class_path()."console.class.php");
 require_once($M->get_class_path()."streams.class.php");


switch ($_GET['c']) {
	default:
	    die($HTMLOutput->GetFileContent('404.tpl', array()));
	    break;
	case "live":
		require_once($MODPATH."live.php");
		break;
	case "config":
		require_once($MODPATH."config.php");
		break;
    case "console":
        require_once($MODPATH."console.php");
		break;
    case "stream":
        require_once($MODPATH."stream.php");
        break;
}

 
