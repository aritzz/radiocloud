<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	CONFIGURATION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	11-10-2016
 */

if (isset($_GET['AJAX_REQUEST'])) {

	if ($_GET['EDIT'] == 1) // change dir
	{
		$db->query("UPDATE dirs SET dirpath='".$db->escape($_POST['value'])."' WHERE dirname='".$db->escape($_POST['name'])."'");
	}
	if ($_GET['EDIT'] == 2) // change dir
	{
		$db->query("UPDATE config SET value='".$db->escape($_POST['value'])."' WHERE var='".$db->escape($_POST['name'])."'");
	}

	die();
}


$configs = $db->get_results("SELECT * FROM config");

$config_add = array();
foreach ($configs as $config)
	$config_add[strtoupper($config->var)] = $config->value;

$dirs = $db->get_results("SELECT * FROM dirs");

$dir_add = array();
foreach ($dirs as $dir)
	$dir_add[strtoupper($dir->dirname)] = $dir->dirpath;



	    $c = $HTMLOutput->GetFileContent('globalconfig.tpl', array_merge($config_add, $dir_add));


$tpl_content = load_config_menu(3, $c);
