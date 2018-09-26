<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	09-10-2016
 */



// Process all ajax requests
if ($_GET['AJAX_REQUEST'] == "1")
	require_once($MODPATH."ajax_podcast.php");

if ($_GET['t'] == "gehitu" && !$_POST)
{
    
	$blocks = RC_Block::get_groups();
	$tpl_options = "";
	foreach ($blocks as $block) {
		$tpl_options .=  $HTMLOutput->GetFileContent('options.tpl', array("NAME" => $block->groupname, "ID" => $block->id));
	}
	$tpl_content = $HTMLOutput->GetFileContent('addpodcast.tpl', array("BLOCK_GROUPS" => $tpl_options));

}
else {

if ($_GET['t'] == "gehitu" && $_POST) {
	// zerrikeria
	$izena = $db->escape($_POST['izena']);
	$url = $db->escape($_POST['url']);
	$taldea = $db->escape($_POST['taldea']);
	$eguna = $db->escape($_POST['desk_eguna']);
	$ordua = $db->escape($_POST['ordua']);
	$iraupena = $db->escape($_POST['iraupena']);
	$mota = $db->escape($_POST['eguna']);

	$fitxategia = strtolower(str_replace(" ", "", $izena).".mp3");

	$iraupena = is_numeric($iraupena) ? $iraupena." minutes" : "";

	if (!empty($izena) && !empty($taldea) && !empty($url) && !empty($fitxategia))
	{
                $fitxategia = ($mota == 1) ? strtolower(str_replace(" ", "", $izena)) : $fitxategia;
                $motak = ($mota == 0) ? "File" : "RandomFile";
                $blockid = RC_Block::add_block($izena, $taldea, $motak, $fitxategia, $iraupena);
                if ($blockid != 0)
                    RC_Podcast::add_podcast($url, $eguna, $ordua, $blockid, $mota);

	}
}


$info_blocks = "<strong>Garrantzitsua</strong>: Sekzio hau <strong>bakar-bakarrik</strong> kanpoko podcastak gehitzeko eta kudeakeatzeko erabiltzen da. Podcast lokalak (irratikoak) automatikoki gehitzen dira blokeetara.<br/><br/>Kanpoko podcast bat gehitzean URL helbidea eta jarri nahi diozun izena espezifika itzazu. Beste guztia, utzi automatizazioaren esku.";
		$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Podcastei buruz", "INFO" => $info_blocks));

// Load block name info
		$blocks = RC_Podcast::get_podcasts();
		$tpl_tableinfo = "";
		foreach ($blocks as $block) {
			$tpl_tableinfo .=  $HTMLOutput->GetFileContent('table_element3.tpl', array("UPDATE_TIME"=>$block->update_time,"ID2" => $block->blockid, "ID" => $block->id, "NAME" => $block->desk, "DAY" => number_to_day($block->dday), "TIME" => $block->dhour, "URL" => $block->url, "FILE" =>$block->filename, "BLOCK" => $block->groupname));
		}


		$tpl_content .= $HTMLOutput->GetFileContent('table3.tpl', array("TABLE_ELEMENTS" => $tpl_tableinfo));
}
		$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Kanpoko podcasten kudeaketa", "ICON" => "road", "MODULE" => "RadioCore"));
