<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * Modules global class
 */
 
 
class Modules {
	
	var $module_list = array();	
	var $module_menu = array();
		
		
	function __construct() {
		global $db;
		if ($this->get_all_modules() == false) 
			die("Error loading modules");
			
	}
		
	function get_all_modules() {
		global $db, $current_user;
		if ($modlist = $db->get_results("SELECT * FROM modules INNER JOIN access ON modules.id=access_module WHERE access_user=".$current_user->login_realid))
			$this->module_list = $modlist;
		else 
			return false;
			
		return true;
		
	}
	
	function get_menu() {
		global $db, $current_user;
		
		foreach ($this->module_list as $cmod)
			{
				if ($cmod->show) {
						$modmenu = $db->get_results("SELECT * FROM menu WHERE module = '".$cmod->id."'");
						$thismodmenu = array($cmod->name => $modmenu);
						$this->module_menu = array_merge($this->module_menu, $thismodmenu);
				}
			}
		
		return $this->module_menu;
	}
	
	function get_module($mod) {
		
		foreach ($this->module_list as $cmod)
			if (strtolower($mod) == strtolower($cmod->name))
				return $cmod;
				
				
		return false;
		
	}
	
	function get_module_info($mod)
	{
		foreach ($this->module_list as $cmod)
			if (strtolower($mod) == strtolower($cmod->name))
				{
					//$modinfo = array();
					$modinfo->name = $cmod->name;
					$modinfo->path = MODULE_PATH."/".strtolower($cmod->name)."/";
					return $modinfo;
				}
		return false;
	}
    
    function get_class_path() {
        return MODULE_PATH."/class/";
    }
}