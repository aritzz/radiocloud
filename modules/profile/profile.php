<?php

$uploaded_podcasts = $db->get_var("SELECT COUNT(*) FROM podcast_upload WHERE uploaded=1");
$active_shows = $db->get_var("SELECT COUNT(*) FROM programs WHERE enabled=1");
$live_streams = $db->get_var("SELECT COUNT(*) FROM programs WHERE live_allowed=1");
$external_podcasts = $db->get_var("SELECT COUNT(*) FROM podcast_download");


$emak = $db->get_results("SELECT podcast_upload.*, users.name as irratsaioa FROM podcast_upload INNER JOIN users ON users.id=podcast_upload.userid WHERE is_trash='0' ORDER BY uploaded, date DESC");

$taula = "";
foreach ($emak as $elem)
{
	$status_color = ($elem->uploaded) ? "success" : "warning";
	$status_text = ($elem->uploaded) ? "Igota" : "Ilaran";

	$date_upload = ($elem->uploaded) ? $elem->uploaded_date : "";

	$taula .= $HTMLOutput->GetFileContent('mainpage_table_elements.tpl', array("NAME" => $elem->irratsaioa, "DATE" => $elem->date, "TITLE" => $elem->title, "STATUS" => $status_color, "STATUS_TEXT" => $status_text, "DATEUP" => $date_upload));
}

$emak = $db->get_results("SELECT * FROM podcast_upload WHERE userid='".$current_user->login_realid."' AND is_trash='0' ORDER BY date DESC");

$taula2 = "";
foreach ($emak as $elem)
{
	$status_color = ($elem->uploaded) ? "success" : "warning";
	$status_text = ($elem->uploaded) ? "Igota" : "Ilaran";
	$nora = "";
	$nora .= ($elem->add_repeat) ? "Errepikapenak" : "";
	$nora .= ($elem->add_podcast) ? ", Podcastak" : "";
	$nora .= ($elem->add_arrosa) ? ", Arrosa" : "";
	$nora .= ($elem->add_copy) ? ", Karpeta" : "";
	$date_upload = ($elem->uploaded) ? $elem->uploaded_date : "";

	$taula2 .= $HTMLOutput->GetFileContent('mainpage_table_elements.tpl', array("NAME" => $nora, "DATE" => $elem->date, "TITLE" => $elem->title, "STATUS" => $status_color, "STATUS_TEXT" => $status_text, "DATEUP" => $date_upload));
}
