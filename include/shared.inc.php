<?php
	
/*
 * RadioCloud - Cloud Radio Automation System
 * Shared functions
 */
 
 function log_db($type, $errormsg) {
	 global $db;
	 
	 $type = $db->escape($type);
	 $errormsg = "[RadioCloud] ".$db->escape($errormsg);
	 $db->query("INSERT INTO log VALUES(NULL, NOW(), '$type', '$errormsg')");
 }

 function get_config($type) {
    global $db;
    return $db->get_var("SELECT value FROM config WHERE var='$type' LIMIT 1");
    
   
}

function get_dir($type) {
    global $db;
    return $db->get_var("SELECT dirpath FROM dirs WHERE dirname='$type' LIMIT 1");
    
   
}

function header_no_cache() {
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate"); // HTTP/1.1
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache"); // HTTP/1.0
    header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); // Date in the past
}

function get_current_radio_status() {
    global $db, $HTMLOutput;
    $players = $db->get_results("SELECT * FROM instances ORDER BY id");

    foreach ($players as $player)
    {

        $day = date('l', strtotime("now"));
        $hour = date('H:i:s', strtotime("now"));
        $last_block = $db->get_results("SELECT schedule.day as day, schedule.hour as hour, blocks.duration as duration, blocks.desc as program, block_groups.color as color FROM (schedule INNER JOIN blocks ON blocks.name=schedule.type) INNER JOIN block_groups ON block_groups.id = blocks.groupid WHERE schedule.calendar_id='".$player->calendar_id."' AND schedule.day = '$day' AND STR_TO_DATE(schedule.hour, '%H:%i:%s') < STR_TO_DATE('$hour', '%H:%i:%s') ORDER BY schedule.hour DESC LIMIT 1");

        $duration = strtotime("+".$last_block[0]->duration);
        $lotime = date("H:i:s d-m-Y", strtotime("+".$last_block[0]->duration));
        $endtime = date('H:i:s d-m-Y', strtotime($last_block[0]->hour . "+ ".$last_block[0]->duration));
        $totaltime = $duration-time();


        if (strtotime($endtime) > time()) // Programa bukatzeko
        {
            $timetoend = strtotime($endtime)-time();
            $porc = 100-((100*$timetoend)/$totaltime);
            $porc = round($porc, 0);
            $program = $last_block[0]->program;
        }
        else {
            $porc = 100;
            $program = "Musika";
        }


        $tpl_instances_play .= $HTMLOutput->GetFileContent('playing_instance.tpl', array("NAME" => $player->name, "PROGRESS" => $porc, "PROGRAM" => $program, "COLOR" => $last_block[0]->color));
    }

    return $tpl_instances_play;
}