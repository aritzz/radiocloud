<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOLIVE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	10-10-2016
 */

$blockc = new RC_Block();
$id_live = 1;

if ($_POST) // start
{
	$helbidea = $db->escape($_POST['helbidea']);
    $blockc->set_var($id_live, $helbidea);
}


$url = $blockc->get_var($id_live);
	

$tpl_content = $HTMLOutput->GetFileContent('liveconfig.tpl', array("VALUE" => $url));

$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Zuzeneko konfigurazioa", "ICON" => "gear", "MODULE" => "RadioLive"));