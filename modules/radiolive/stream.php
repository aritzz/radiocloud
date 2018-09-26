<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	30-10-2018
 */


// Process all ajax requests
//if ($_GET['AJAX_REQUEST'] == "1")
//	require_once($MODPATH."ajax_podcast.php");

// GUZTI HAU AJAX-ERA MIGRATZEKO DAGO

if ($_POST)
{
    if (filter_var($_POST['ip'], FILTER_VALIDATE_IP)) 
        if (filter_var($_POST['port'], FILTER_VALIDATE_INT)) 
        {

            $name = filter_var($_POST['izena'], FILTER_SANITIZE_STRING);
            $mount = filter_var($_POST['mount'], FILTER_SANITIZE_STRING);
            $type = ($_POST['type'] == "shoutcast") ? "shoutcast":"icecast";
            RC_Streams::add_stream($name, $_POST['ip'], $_POST['port'], $type, $mount);
          //  var_dump($_POST);
            header("Location: index.php?m=radiolive&c=stream");

        }
}



// Delete instance and redirect
if ($_GET['delInstance'])
    if (is_numeric($_GET['delInstance']))
    {
        RC_Streams::del_stream($_GET['delInstance']);
        header("Location: index.php?m=radiolive&c=stream");
    }



$info_blocks = "Atal honetan emisio-konsolan agertuko diren stream zerbitzariak kudeatu daitezke. Stream zerbitzari hauetara zuzenean konektatuko da eta horrei buruzko informazio eguneratua emango da konsola erabiltzen ari denean.";
		$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Stream zerrenda", "INFO" => $info_blocks));
$streams = RC_Streams::get_streams();
$cont = "";

foreach ($streams as $stream)
{
    $url = $stream->ip.":".$stream->port;
    $cont .= $HTMLOutput->GetFileContent('stream_content.tpl', array("ID" => $stream->id, "NAME" => $stream->name, "URL" => $url, "MOUNT" => $stream->vars, "TYPE" => $stream->type));
}

$tpl_content .= $HTMLOutput->GetFileContent('stream_container.tpl', array("STREAM_CONTENT" => $cont));

		$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Stream konfigurazioa", "ICON" => "play-circle", "MODULE" => "RadioLive"));



