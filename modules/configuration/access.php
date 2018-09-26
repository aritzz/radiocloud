<?php


if ($_GET['AJAX_REQUEST'] == 1)
{
	//var_dump($_POST);

	if ($_POST['modmod'] == "yes")
	{

		if ($db->get_results("SELECT * FROM access WHERE access_user='".$db->escape($_POST['userid'])."' AND access_module='".$db->escape($_POST['moduleid'])."'")){
				$db->query("DELETE FROM access WHERE access_user='".$db->escape($_POST['userid'])."' AND access_module='".$db->escape($_POST['moduleid'])."'");
				echo "module Removed";
			}
		else{
				$db->query("INSERT INTO access VALUES('".$db->escape($_POST['userid'])."', '".$db->escape($_POST['moduleid'])."')");
				echo "module Added";
		}		

	}
    else

	if ($db->get_results("SELECT * FROM access_menu WHERE userid='".$db->escape($_POST['userid'])."' AND menuid='".$db->escape($_POST['menuid'])."'")){
			$db->query("DELETE FROM access_menu WHERE userid='".$db->escape($_POST['userid'])."' AND menuid='".$db->escape($_POST['menuid'])."'");
			echo "menuitem Removed";
		}
	else{
			$db->query("INSERT INTO access_menu VALUES('".$db->escape($_POST['userid'])."', '".$db->escape($_POST['menuid'])."')");
			echo "menuitem Added";
	}
	die();
}






$users_ac = $db->get_results("SELECT * FROM users WHERE (id > 1) or (id < 0)");

$all_modules = $db->get_results("SELECT * FROM modules");
$all_menu = $db->get_results("SELECT * FROM menu");


$acces_elems = "";
foreach ($users_ac as $uac)
{
	/**** LOAD MODULES PER USER ****/
	$tpl_module = "";
	$tpl_module_all = "";
	foreach ($all_modules as $module) { 
		
		/*** MODULE CHECK ***/
		$user_modules = $db->get_results("SELECT * FROM access WHERE access_user='".$uac->id."' AND access_module='".$module->id."'");

		$status = ($user_modules) ? "checked" :"";
		$statusB = ($user_modules) ? "active" :"";

		$tpl_module .= $HTMLOutput->GetFileContent('access_element_mod_menu.tpl', array("MENUITEM" => $module->name, "STATUS" => $status,"STATUSB" => $statusB, "MENUITEM_ID" => "", "USER_ID" => $uac->id,"MODULE_ID" => $module->id, "MODMOD" => "yes", "COLOR" => "warning"));

		/*** MENUITEM CHECK ***/
		$all_menu_mod = $db->get_results("SELECT * FROM menu WHERE module='".$module->id."'");

		$tpl_menu_all = "";
		foreach ($all_menu_mod as $menui)
		{
			$user_menuitems = $db->get_results("SELECT * FROM access_menu WHERE userid='".$uac->id."' AND menuid='".$menui->id."'");

			$status = ($user_menuitems) ? "checked" :"";
			$statusB = ($user_menuitems) ? "active" :"";

			$tpl_menu_all .= $HTMLOutput->GetFileContent('access_element_mod_menu.tpl', array("MENUITEM" => $menui->name, "STATUS" => $status,"STATUSB" => $statusB, "MENUITEM_ID" => $menui->id, "USER_ID" => $uac->id,"MODULE_ID" => $module->id, "MODMOD" => "no", "COLOR" => "danger"));
		}

		if (!empty($tpl_menu_all))
		$tpl_module_all .= $HTMLOutput->GetFileContent('access_element_mod.tpl', array("MODNAME" => $module->name, "ACCESS_ELEMENT_MOD_MENU" => $tpl_menu_all));
	}


	$tpl_modules = $HTMLOutput->GetFileContent('access_element_mod.tpl', array("MODNAME" => "MODULUAK", "ACCESS_ELEMENT_MOD_MENU" => $tpl_module));
	$tpl_modules .= $tpl_module_all;

    /**** LOAD MENU ITEMS PER USER *****/

    if ($uac->id == -1)
        $acces_elems .= $HTMLOutput->GetFileContent('access_element.tpl', array("USERNAME" => "<b>Defektuzko baimenak irratsaio berrientzat</b>", "ID" => $uac->id, "ACCESS_ELEMENT_MOD" => $tpl_modules));
    else
        $acces_elems .= $HTMLOutput->GetFileContent('access_element.tpl', array("USERNAME" => $uac->name." (".$uac->username.")", "ID" => $uac->id, "ACCESS_ELEMENT_MOD" => $tpl_modules));
}




	$c = $HTMLOutput->GetFileContent('access.tpl', array("ACCESS_ELEMENTS" => $acces_elems));

$tpl_content = load_config_menu(2, $c);
