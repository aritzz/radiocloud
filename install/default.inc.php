<?php


 // Debug mode
 ini_set('display_errors','Off'); 
 
 // Global defines
 define("RADIOCLOUD_VERSION", "1.2 *BETA*");
 define("RADIOCLOUD_BY", "2016-2018 Radixu Irratia");


 // include config file
 require_once("include/config.inc.php");
 
 // templates
 require_once("include/class/templates.class.php");
 
 // shared functions
 require_once("include/shared.inc.php");
 
 
 $HTMLOutput = new Template('installer', 'templates');
 if ($HTMLOutput->error) die("Unknown error, please contact your administrator: ".$HTMLOutput->error);



?>
