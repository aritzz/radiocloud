<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	05-02-2018
 */


// Process all ajax requests
//if ($_GET['AJAX_REQUEST'] == "1")
//	require_once($MODPATH."ajax_podcast.php");

// **************** GUZTI HAU AJAX-ERA MIGRATZEKO DAGO

// Add instance and redirect
if ($_POST)
{
    if (filter_var($_POST['probability'], FILTER_VALIDATE_INT)) 
        {
            $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
            $file = filter_var($_POST['file'], FILTER_SANITIZE_STRING);
            $mode = ($_POST['mode'] == "RandomFile") ? "RandomFile":"File";
           // RC_Streams::add_stream($name, $_POST['ip'], $_POST['port'], $type, $mount);
            RC_Jingles::add_jingle($name, $_POST['type'], $mode, $file, $_POST['probability']);
            header("Location: index.php?m=radiocore&c=jingles");

        }
}


// Delete jingle and redirect
if ($_GET['delInstance'])
    if (is_numeric($_GET['delInstance']))
    {
        RC_Jingles::del_jingle($_GET['delInstance']);
        header("Location: index.php?m=radiocore&c=jingles");
    }

// Change jingle and redirect
if ($_GET['toggle'])
    if (is_numeric($_GET['toggle']))
    {
        RC_Jingles::toggle_status($_GET['toggle']);
        header("Location: index.php?m=radiocore&c=jingles");
    }



$info_blocks = "Irratiko iragarkiak sartzeko hiru aukera dituzu: <br/>- Orduaren soinuaren ostean (iragarkia irratsaioaren gainean entzungo da)<br/>- Programa bat bukatzeaz batera, beti<br/>- Programa bat bukatzean, ez beti (probabilitatearen arabera) ";
		$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Ku&ntilde;en funtzionamendua", "INFO" => $info_blocks));

		$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Ku&ntilde;en kudeaketa", "ICON" => "plug", "MODULE" => "RadioCore"));



    
// Load RADIOCORE jingles
$jingles = RC_Jingles::get_jingles();
$tpl_jinglelist = "";
foreach ($jingles as $jingle) {
    $tpl_jinglelist .= $HTMLOutput->GetFileContent('jingle_element.tpl', array("ID" => $jingle->id, "NAME" => $jingle->name, "TYPE" => RC_Jingles::jingletype_conv($jingle->type), "SOURCE" => $jingle->source, "PROBABILITY" => RC_Jingles::num_to_prob($jingle->probability), "ENABLED" => $jingle->enabled, "FILETYPE" => RC_Jingles::type_conv($jingle->filetype)));
}

$tpl_content .= $HTMLOutput->GetFileContent('jingle_content.tpl', array("JINGLES" => $tpl_jinglelist));

//$tpl_content .= $HTMLOutput->GetFileContent('matrix_container.tpl', array("TITLE" => "Matrizearen funtzionamendua", "INFO" => $info_blocks, "MATRIX_CONTENT" => $tpl_instances));