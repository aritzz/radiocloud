<?php
	$M = new Modules();
	$MENU = $M->get_menu();
 
 
	/* Main switch for modules */
	if (!empty($_GET['m'])) {
		$mod = $db->escape($_GET['m']);
		if ($mod = $M->get_module($mod))
		{
			$loader_file = MODULE_PATH."/".strtolower($mod->name)."/".$mod->loader;
			if (file_exists($loader_file))	
				require_once $loader_file;
			else 
				log_db("error", "Loader error in module ".$mod->name);
				
		} 
	} else {
		$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "Aginte-panela", "ICON" => "home", "MODULE" => "Sarrera"));
		require_once "include/main_page.php";

	}
	/* Create menu */
	$tpl_menublock = "";
	foreach ($MENU as $MENU_NAME => $MENU_MOD) {
		$tpl_links = "";
		foreach ($MENU_MOD as $element)
			if ($db->get_results("SELECT * FROM access_menu WHERE menuid='".$element->id."' and userid=".$current_user->login_realid)) 
			$tpl_links .= $HTMLOutput->GetFileContent('menu_element.tpl', array("LINK" => "?m=".strtolower($MENU_NAME)."&c=".$element->link, "ICON" => $element->icon, "NAME" => $element->name));
		
		$tpl_menublock .= $HTMLOutput->GetFileContent('menu_container.tpl', array("TITLE" => $MENU_NAME, "MENU_ELEMENTS" => $tpl_links));
	}

    /* Update chat */
 /*   if ($db->get_results("SELECT * FROM chat_online WHERE userid='".$current_user->login_realid."'"))
        $db->query("UPDATE chat_online SET last_update=NOW() WHERE userid='".$current_user->login_realid."'");
    else
        $db->query("INSERT INTO chat_online VALUES('".$current_user->login_realid."', NOW())");*/
	
	
	
	if ($current_user->is_admin()) // show error messages
		{
			$tpl_notif_elements .= "";
			
			$notif = $db->get_results("SELECT * FROM log WHERE type='error' ORDER BY date DESC LIMIT 5");
			foreach ($notif as $not) {
				$tpl_notif_elements .= $HTMLOutput->GetFileContent('notification_element.tpl', array("TEXT" => $not->data, "DATE" => $not->date));
			}
			
			$tpl_messages = $HTMLOutput->GetFileContent('messages.tpl', array());
			$tpl_config = $HTMLOutput->GetFileContent('config_wheel.tpl', array());

			$tpl_notifications = $HTMLOutput->GetFileContent('notifications.tpl', array("ELEMENTS" => $tpl_notif_elements));

		} else $tpl_notifications = "";
		
    $tpl_playing = $HTMLOutput->GetFileContent('playing.tpl', array("INSTANCES" => get_current_radio_status()));

	$tpl_aside = $HTMLOutput->GetFileContent('aside.tpl', array());

// Future is near
//	$tpl_chat = $HTMLOutput->GetFileContent('chat.tpl', array());
	
	



	$tpl_menu = $HTMLOutput->GetFileContent('main_menu.tpl', array("LIST_CONTAINER" => $tpl_menublock));
	
	$tpl_userbar = $HTMLOutput->GetFileContent('user_topbar.tpl', array("USERNAME" => $current_user->login_name, "USER_IMAGE" => $current_user->image));
	
	$tpl_footer = $HTMLOutput->GetFileContent('footer.tpl', array("VERSION" => RADIOCLOUD_VERSION, "BY" => RADIOCLOUD_BY));
	
	?>
