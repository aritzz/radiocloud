<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	31-10-2017
 */


// Process all ajax requests
if ($_GET['AJAX_REQUEST'] == "1")
{
    if ($_GET["EDIT"] == 1)
    {
        $id = $db->escape($_POST['pk']);
        $val = $db->escape($_POST['value']);
        
        $db->query("UPDATE instances SET name='$val' WHERE id=$id");
    }
    die();
}
    
    //	require_once($MODPATH."ajax_podcast.php");

// GUZTI HAU AJAX-ERA MIGRATZEKO DAGO

// Add instance and redirect
if ($_GET['addInstance'] == 1)
{
    RC_Instance::add_instance();
    header("Location: index.php?m=radiocore&c=matrix");
}

// Delete instance and redirect
if ($_GET['delInstance'])
    if (is_numeric($_GET['delInstance']))
    {
        RC_Instance::del_instance($_GET['delInstance']);
        header("Location: index.php?m=radiocore&c=matrix");
    }

// Change instance and redirect
if ($_GET['editInstance'])
    if (is_numeric($_GET['editInstance']))
        if (is_numeric($_GET['newCalendar']))
        {
            RC_Instance::update_instance($_GET['newCalendar'], $_GET['editInstance']);
            header("Location: index.php?m=radiocore&c=matrix");
        }



$info_blocks = "Irratien emisio-sistema (RadioCore) eta egutegien arteko loturak egiteko ondorengo matrizea erabili behar duzu. Ezkerrean RadioCore instantziak dituzu identifikatzaile batez bereizita. Eskuinean ordea, egutegian prestatu dituzun parrilak.<br/>Elkarrekin lotu behar dituzu eta zure RadioCore softwareari instantziaren identifikadorea pasatu behar diozu konfigurazioan. ";
		$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Matrizearen funtzionamendua", "INFO" => $info_blocks));

		$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Matrizea: Instantzien eta egutegien lotura", "ICON" => "plug", "MODULE" => "RadioCore"));



    
// Load RADIOCORE instances

$instances = RC_Instance::get_instances();
$tpl_instances = "";
foreach ($instances as $instance) {
    
    // Load all calendars
    $calendars = RC_Calendar::get_all_calendars();
    $tpl_calendars = $HTMLOutput->GetFileContent('matrix_content_options.tpl', array("ID" => 0, "NAME" => "< Ezer ez >", "SELECTED" => ""));
    foreach ($calendars as $calendar) {
        $add_selected = ($calendar->id == $instance->calendar_id) ? "selected" : "";
        $tpl_calendars .= $HTMLOutput->GetFileContent('matrix_content_options.tpl', array("NAME" => $calendar->name, "ID" => $calendar->id, "SELECTED" => $add_selected));
    }
    
    $tpl_instances .= $HTMLOutput->GetFileContent('matrix_content.tpl', array("NAME" => $instance->name, "ID" => $instance->id, "CALENDARS" => $tpl_calendars));
}



$tpl_content .= $HTMLOutput->GetFileContent('matrix_container.tpl', array("TITLE" => "Matrizearen funtzionamendua", "INFO" => $info_blocks, "MATRIX_CONTENT" => $tpl_instances));