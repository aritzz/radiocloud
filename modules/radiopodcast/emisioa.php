<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOPODCAST
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	26-10-2016
 */

if ($_GET['update_live_status'] == 1) // start
	$db->query("UPDATE signals SET status=1 WHERE id=1");

if ($_GET['update_live_status'] == 2) // stop 
	$db->query("UPDATE signals SET status=0 WHERE id=1");

if ($_GET['get_live_status'] == 1) // stop 
{
	echo $db->get_var("SELECT status FROM signals WHERE id=1");
	die();
}


function number_to_day($jasotakoa)
{
	$r = "Ez dago";
	switch ($jasotakoa)
	{
		case '0': 
		$r = "Astelehena"; 
		break;		
		case '1': 
		$r =  "Asteartea"; 
		break;	
		case '2': 
		$r =  "Asteazkena"; 
		break;	
		case '3': 
		$r =  "Osteguna"; 
		break;	
		case '4': 
		$r =  "Ostirala"; 
		break;	
		case '5': 
		$r =  "Larunbata"; 
		break;	
		case '6': 
		$r =  "Igandea"; 
		break;	
	}

	return $r;
}


// Noiz du baimena emisioa egiteko?
$einfo = $db->get_row("SELECT start_time, start_day, live_allowed FROM programs WHERE id = '".$current_user->login_programid."'");

if (($einfo->start_day == (date("N")-1)) && (strtotime($einfo->start_time. ' - 10 minute') < time()))
{
 	$tpl_content = $HTMLOutput->GetFileContent('live2.tpl', array());
} else if ($einfo->live_allowed == 0)
 $tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Ez duzu sarbiderik", "INFO" => "Ezin duzu zuzeneko emisiorik egin. Jar zaitez kudeatzailearekin kontaktuan baimena emateko."));
else $tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Ez duzu sarbiderik", "INFO" => "Zuzeneko emisioa egiteko ondorengo ordu eta datak dituzu baimenduta. Hortik kanpo, ezingo duzu emisiorik egin. <br/><br/><strong>".number_to_day($einfo->start_day)." ".$einfo->start_time."</strong>"));



$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Zuzeneko emisioa", "ICON" => "signal", "MODULE" => "RadioPodcast"));