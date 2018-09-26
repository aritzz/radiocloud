<?php
/*
 * RadioCloud - Cloud Radio Automation System∫
 * Template init
 */

 
// include('../class/templates.class.php');
 
 $HTMLOutput = new Template('rc1', 'templates');

 if ($HTMLOutput->error) die("Unknown error, please contact your administrator: ".$HTMLOutput->error);
 
 function HTMLWrite() {
 	echo $HTMLOutput;
 }
 
 ?>