<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	CONFIGURATION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	11-10-2016
 */

$c = $HTMLOutput->GetFileContent('globalconfig.tpl', array());


$tpl_content = load_config_menu(3, $c);
