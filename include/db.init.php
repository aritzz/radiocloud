<?php
/*
 * RadioCloud - Cloud Radio Automation System∫
 * DB initialize
 */
 

	
// Include ezSQL core
include_once "sql/shared/ez_sql_core.php";

// Include ezSQL database specific component
include_once "sql/mysqli/ez_sql_mysqli.php";

// Initialise database object and establish a connection
// at the same time - db_user / db_password / db_name / db_host
$db = new ezSQL_mysqli();
if ($db->quick_connect($glob['db']['user'],$glob['db']['pass'],$glob['db']['izena'],$glob['db']['host']) != true) 
    die($HTMLOutput->GetFileContent('500.tpl', array()));



?>