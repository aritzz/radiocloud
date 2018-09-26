<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	UPLOAD LIST
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	25-10-2016
 */


// Ezabatu beharra
if (is_numeric($_GET['ezabatu']))
{
   $ezabatuid = $_GET['ezabatu'];
   $db->query("DELETE FROM podcast_upload WHERE id='".$ezabatuid."' AND userid='".$current_user->login_realid."'");
}

$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Podcastei buruz", "INFO" => "Ondorengo zerrendan igotako podcast guztiak agertzen dira, eta baita igotzeko ilaran daudenak ere."));

$emak = $db->get_results("SELECT * FROM podcast_upload WHERE userid='".$current_user->login_realid."' AND is_trash='0' ORDER BY date DESC");
$taula = "";
foreach ($emak as $elem)
{
	$status_color = ($elem->uploaded) ? "success" : "warning";
	$status_text = ($elem->uploaded) ? "Igota" : "Ilaran";
	$elem->add_repeat = ($elem->add_repeat) ? "Bai" : "Ez";
	$elem->add_podcast = ($elem->add_podcast) ? "Bai" : "Ez";
	$elem->add_arrosa = ($elem->add_arrosa) ? "Bai" : "Ez";
        $ezabatu = ($elem->uploaded) ? "Igota" : "<a href=\"index.php?m=radiopodcast&c=irratsaioak&ezabatu=".$elem->id."\">Ezabatu</a>";
//	$ezabatu = "<a href=\"index.php?m=radiopodcast&c=irratsaioak&ezabatu=".$elem->id."\">Ezabatu</a>";
	$elem->add_copy = ($elem->add_copy) ? "Bai" : "Ez";
	$date_upload = ($elem->uploaded) ? $elem->uploaded_date : "";

//	$taula .= $HTMLOutput->GetFileContent('upload_table_elements.tpl', array("DATE" => $elem->date, "TITLE" => $elem->title, "REPEAT" => $elem->add_repeat, "WEB" => $elem->add_podcast, "ARROSA" => $elem->add_arrosa, "KOPIA" => $elem->add_copy, "STATUS" => $status_color, "STATUS_TEXT" => $status_text, "DATEUP" => $date_upload));
	$taula .= $HTMLOutput->GetFileContent('upload_table_elements.tpl', array("DATE" => $elem->date, "TITLE" => $elem->title, "REPEAT" => $elem->add_repeat, "WEB" => $elem->add_podcast, "ARROSA" => $elem->add_arrosa, "KOPIA" => $ezabatu, "STATUS" => $status_color, "STATUS_TEXT" => $status_text, "DATEUP" => $date_upload));
}

$tpl_content .= $HTMLOutput->GetFileContent('upload_table.tpl', array("ELEMENTS" => $taula));


$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "RadioPodcast", "ICON" => "cloud-upload", "MODULE" => "Igotzeak"));
