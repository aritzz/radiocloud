<?php


 // Debug mode
 ini_set('display_errors','Off'); 
 
 // Global defines
 define("RADIOCLOUD_VERSION", "1.2 *BETA*");
 define("RADIOCLOUD_BY", "2016-2018 Radixu Irratia");
 define("ADMIN_LEVEL", "100");
 define("MANAGER_LEVEL", "50");
 define("USER_LEVEL", "20");

 // include config file
 require_once("config.inc.php");
 
 // templates
 require_once("include/class/templates.class.php");
 require_once("include/templates.init.php");
 
 // database
 require_once("include/db.init.php");

 // required classes
 require_once("include/class/login.class.php");
 require_once("include/class/modules.class.php");
 require_once("include/class/ldap.class.php");

 // shared functions
 require_once("include/shared.inc.php");
 
 // load menu template
 $menua = $HTMLOutput->GetFileContent('main_menu.tpl', array());

?>
