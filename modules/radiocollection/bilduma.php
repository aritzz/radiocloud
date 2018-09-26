<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCOLLECTION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	17-09-2017
 */



// Process all ajax requests
/*if ($_GET['AJAX_REQUEST'] == "1")
	require_once($MODPATH."ajax_bilduma.php");
*/



    $discs = $db->get_results("SELECT * FROM collection");

	$tpl_blocks = "";
	foreach ($discs as $disc) {
		$tpl_blocks .= $HTMLOutput->GetFileContent('collection_table_element.tpl', array("ARTIST" => $disc->artist, "TITLE" => $disc->title, "LABEL" => $disc->label, "YEAR" => $disc->year, "GENRE" => $disc->genre, "FORMAT" => $disc->type, "THUMB" => get_dir("collection_thumbs")."/".$disc->thumb, "ID" => $disc->id, "COUNT" => $disc->quantity, "WHERE" => $disc->whereis));
	}

$tpl_content = $HTMLOutput->GetFileContent('collection_table.tpl', array("DISCS" => $tpl_blocks));

$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Bilduma", "ICON" => "slack", "MODULE" => "RadioCollection"));