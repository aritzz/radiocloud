<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	09-10-2016
 */



// Process all ajax requests
if ($_GET['AJAX_REQUEST'] == "1")
	require_once($MODPATH."ajax_calendar.php");




/** Get all blocks **/

$groups = RC_Block::get_groups_ordered_by_id();
$tpl_groups = "";
foreach ($groups as $group) {
	$blocks = RC_Block::get_blocks_enabled_by_group($group->id);

	$tpl_blocks = "";
	foreach ($blocks as $block) {
		$duration = empty($block->duration) ? "" : 'data-duration="'.$block->duration.'"';
		$tpl_blocks .= $HTMLOutput->GetFileContent('calendar_group_element.tpl', array("COLOR" => $group->color, "DURATION" => $duration, "NAME" => $block->name, "BLOCKNAME" => $block->blockname, "ID" => $block->id));
	}

	if (empty($tpl_blocks))
		continue;

	$tpl_groups .= $HTMLOutput->GetFileContent('calendar_group.tpl', array("NAME" => $group->groupname, "EVENTS" => $tpl_blocks, "NAME_PERM" => str_replace(' ', '', $group->groupname)));


} // foreach end

$tpl_content = $HTMLOutput->GetFileContent('calendar.tpl', array("BLOCKS" => $tpl_groups));

$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Parrilaren kudeaketa", "ICON" => "cutlery", "MODULE" => "RadioCore"));
