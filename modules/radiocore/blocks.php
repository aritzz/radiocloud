<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	04-10-2016
 */

global $db;


// Process all ajax requests
if ($_GET['AJAX_REQUEST'] == "1")
	require_once($MODPATH."ajax_blocks.php");


if (($_GET['t'] == "gehitu_mota") && !$_POST)
{
	$tpl_content = $HTMLOutput->GetFileContent('addblock.tpl', array());

} else if (($_GET['t'] == "gehitu_blokea") && !$_POST)
{
    
	$blocks = RC_Block::get_groups();
	$tpl_options = "";
	foreach ($blocks as $block) {
		$tpl_options .=  $HTMLOutput->GetFileContent('options.tpl', array("NAME" => $block->groupname, "ID" => $block->id));
	}

	$tpl_content = $HTMLOutput->GetFileContent('addblock2.tpl', array("BLOCK_GROUPS" => $tpl_options));
} 


else {

		if ($_POST && ($_GET['t'] == "gehitu_mota"))
		{
			$mota_izena = $db->escape($_POST['izena']);
			$color_array = array("primary", "mint", "pink", "info", "warning", "purple", "success", "danger", "dark");
			$last_color = RC_Block::get_last_color(); 
			$color_array = array_diff($color_array, array($last_color));
			$index_color_array = array_rand($color_array);
			$our_color = $color_array[$index_color_array];
            
            $BLOCK->add_group($mota_izena, $our_color);
            
		}
		else if ($_POST && ($_GET['t'] == "gehitu_blokea"))
            if (RC_Block::add_block($_POST['izena'], $_POST['taldea'], $_POST['mota'], $_POST['helbidea'], $_POST['iraupena']) == 0) echo "Blokea gehitzean errorea";



		// Load blocks table info
		$blocks = RC_Block::get_blocks();
		$tpl_tableinfo = "";
		foreach ($blocks as $block) {
			$label = $block->enabled ? "success" : "dark";
			$status = $block->enabled ? "Aktibo" : "Inaktibo";
			$tpl_tableinfo .=  $HTMLOutput->GetFileContent('table_element.tpl', array("NAME" => $block->desc, "TYPE" => $block->groupname, "URL" => $block->vars, "ID" => $block->ident, "LABEL" => $label, "STATUS" => $status));
		}

		// Load block name info
        $blocks = RC_Block::get_groups();
		$tpl_table2info = "";
		foreach ($blocks as $block) {
			$tpl_table2info .=  $HTMLOutput->GetFileContent('table_element2.tpl', array("ID" => $block->id, "NAME" => $block->groupname));
		}

		$info_blocks = "<strong>Irratsaio-bloke</strong> bat egutegian sartzeko erabiliko duzun musika edo fitxategi sekzio bat da. Sekzio hauek taldekatzeko aukera daukazu, horrela, bloke motak sortuz.<br/><br/><strong>Defektuzko</strong> blokean, erreproduzitzeko ezer ez dagoenean exekutatuko den sententzia aukera dezakezu.<br/><strong>Zuzeneko</strong> blokea zuzenean emisioak egiteko erabiltzen den URLa da.<br/><br/>Bi bloke hauek ezin dira ezabatu, ezta defektuzko bloke-mota ere.";
		$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Blokeei buruz", "INFO" => $info_blocks));
		$tpl_content .= $HTMLOutput->GetFileContent('table.tpl', array("TABLE_ELEMENTS" => $tpl_tableinfo));
		$tpl_content .= $HTMLOutput->GetFileContent('table2.tpl', array("TABLE_ELEMENTS" => $tpl_table2info));
		$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Blokeen kudeaketa", "ICON" => "beer", "MODULE" => "RadioCore"));

}