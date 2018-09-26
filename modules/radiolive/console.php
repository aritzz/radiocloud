<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOLIVE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	16-11-2017
 */


// NO CACHE IN THIS PAGE
header_no_cache();

if ($_GET['AJAX_REQUEST'] == "1")
	require_once($MODPATH."ajax_console.php");


$url = RC_Block::get_var(1);	

$tpl_content = $HTMLOutput->GetFileContent('console.tpl', array());

$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Emisio-konsola", "ICON" => "terminal", "MODULE" => "RadioLive"));