<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOLIVE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	10-10-2016
 */

$livec = new RC_Signals();
$id_live_signal = 1;

if ($_GET['update_live_status'] == 1) // start
    $livec->set_status($id_live_signal, 1);

if ($_GET['update_live_status'] == 2) // stop 
    $livec->set_status($id_live_signal, 0);

if ($_GET['get_live_status'] == 1) // show 
{
    echo $livec->get_status($id_live_signal);
	die();
}

	

$tpl_content = $HTMLOutput->GetFileContent('live.tpl', array());

$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Zuzeneko emisioa", "ICON" => "signal", "MODULE" => "RadioLive"));