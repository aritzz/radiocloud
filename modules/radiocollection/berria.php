<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCOLLECTION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	17-09-2017
 */



// Process all ajax requests
if ($_GET['AJAX_REQUEST'] == "1")
	require_once($MODPATH."ajax_berria.php");




$tpl_content = $HTMLOutput->GetFileContent('new_disc.tpl', array("TOKEN" => get_config('discogs_token')));

$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Disko berria", "ICON" => "slack", "MODULE" => "RadioCollection"));
