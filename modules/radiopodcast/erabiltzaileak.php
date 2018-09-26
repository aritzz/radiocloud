<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	CONFIGURATION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	11-10-2016
 */




$c = $HTMLOutput->GetFileContent('config_default.tpl', array());


// Process all ajax requests
if ($_GET['AJAX_REQUEST'] == "1")
	require_once($MODPATH."ajax_users.php");


function get_usertype($userlevel) {
	if ($userlevel == ADMIN_LEVEL)
		return "Admin";
	if ($userlevel == MANAGER_LEVEL)
		return "Kudeatzailea";
	if ($userlevel == USER_LEVEL)
		return "Erabiltzailea";

	return "Ezezaguna";

}

function number_to_day($jasotakoa)
{
	$r = "Ez dago";
	switch ($jasotakoa)
	{
		case '0': 
		$r = "Astelehena"; 
		break;		
		case '1': 
		$r =  "Asteartea"; 
		break;	
		case '2': 
		$r =  "Asteazkena"; 
		break;	
		case '3': 
		$r =  "Osteguna"; 
		break;	
		case '4': 
		$r =  "Ostirala"; 
		break;	
		case '5': 
		$r =  "Larunbata"; 
		break;	
		case '6': 
		$r =  "Igandea"; 
		break;	
	}

	return $r;
}


if (($_GET['t'] == "gehitu_remote") && !$_POST)
{
	// Load block name info
	$blocks = $db->get_results("SELECT * FROM block_groups ");
	$tpl_options = "";
	foreach ($blocks as $block) {
		$tpl_options .=  $HTMLOutput->GetFileContent('options.tpl', array("NAME" => $block->groupname, "ID" => $block->id));
	}
	$tpl_content = $HTMLOutput->GetFileContent('adduser.tpl', array("BLOCKS" => $tpl_options));

} else if (($_GET['t'] == "gehitu_local"))
{
	$tpl_content = $HTMLOutput->GetFileContent('adduser_local.tpl', array("BLOCKS" => $tpl_options));

	if ($_POST) {
		$izena = $db->escape($_POST['izena']);
		$erabiltzailea = $db->escape($_POST['erabiltzailea']);
		$pasahitza = $db->escape($_POST['pasahitza']);
		$maila = $db->escape($_POST['mota']);
		$desc = $db->escape($_POST['desc']);

		if (!empty($izena) && !empty($erabiltzailea) && !empty($pasahitza) && !empty($maila) && $current_user->level > $maila)
		if (!$db->get_var("SELECT username FROM users WHERE username='$erabiltzailea'")) {
			$db->query("INSERT INTO users VALUES(NULL, '$erabiltzailea', MD5('$pasahitza'), '$izena', '$desc', 0, 1, 'internal', 'img/bitxu.png', '$maila')");
		
			header("Location: index.php?m=configuration&c=users"); 
		}
	}

} else if ($_POST){
	/** GET FORM VARS **/
	$erabiltzailea = $db->escape($_POST['name']);
	$eposta = $db->escape($_POST['email']);
	$progizena = $db->escape($_POST['progizena']);
	$progdeskripzioa = $db->escape($_POST['progdeskripzioa']);
	$zuzenekoa = $db->escape($_POST['zuzenekoa']);
	$ordua = $db->escape($_POST['ordua']);
	$iraupena = $db->escape($_POST['iraupena']);
	$eguna = $db->escape($_POST['eguna']);
	$blokea = $db->escape($_POST['block']);
	$arrosau = $db->escape($_POST['arrosa_user']);
	$arrosap = $db->escape($_POST['arrosa_pass']);
	$fitxategia = $erabiltzailea.".mp3";


	/* Ez dago datu basean */
	if (!$db->get_var("SELECT username FROM users WHERE username='$erabiltzailea'")){


		/*
			Prozesatu irudia
		*/
	   
		if ($_FILES["argazkia"]["size"] > 500000) {
			$argazkia ="";
		} 
		else {
			echo $_FILES["argazkia"]["tmp_name"];
			$argafile = getcwd()."/argazkiak/$erabiltzailea.png";
			if (move_uploaded_file($_FILES["argazkia"]["tmp_name"], $argafile))
				$argazkia = "$erabiltzailea.png";

		}



		/** ADD BLOCK **/
		// Transaction start
		$db->query('BEGIN');

		$last_id = $db->get_var("SELECT id FROM blocks ORDER BY id DESC LIMIT 1"); // get id
		$last_id++;
		$db->query("INSERT INTO blocks VALUES(NULL, 'Block$last_id', 'File', '$fitxategia', '$progizena', '$blokea', 1, '$iraupena minutes')");
		// Commit
		if($db->query('COMMIT') !== false) {
		    $block_id = $db->insert_id;
			$db->query("INSERT INTO programs VALUES(NULL, '$progizena', '$eguna', '$ordua', '$iraupena', '$arrosau', '$arrosap', $zuzenekoa, '$block_id', 1)");
			$program_id = $db->insert_id;
			$db->query("INSERT INTO users VALUES(NULL, '$erabiltzailea', 'password', '$progizena', '$progdeskripzioa', $program_id, 1, 'external', '$argazkia', 20)");
		} else // or rollback
		    $db->query('ROLLBACK');

		header("Location: index.php?m=configuration&c=users"); // Sin más

	}
	
}

else {

// Load blocks table info
		$blocks = $db->get_results("SELECT * FROM users WHERE level > 20");
		$tpl_tableinfo = "";
		foreach ($blocks as $block) {
			$label = $block->enabled ? "success" : "dark";
			$status = $block->enabled ? "Aktibo" : "Inaktibo";
			$tpl_tableinfo .=  $HTMLOutput->GetFileContent('table_localusers_element.tpl', array("NAME" => $block->name, "TYPE" => get_usertype($block->level), "USERNAME" => $block->username, "ID" => $block->id, "LABEL" => $label, "STATUS" => $status));
		}

		$blocks = $db->get_results("SELECT users.*, programs.live_allowed as live, programs.start_day eguna, programs.start_time as starttime, programs.duration as duration FROM users INNER JOIN programs ON programs.id=users.programid WHERE level = 20");
		$tpl_table2info = "";
		foreach ($blocks as $block) {
			$label = $block->enabled ? "btn-success" : "";
			$label2 = $block->live ? "btn-success" : "";

			$status = $block->enabled ? "Aktibo" : "Inaktibo";
			$tpl_table2info .=  $HTMLOutput->GetFileContent('table_radiousers_element.tpl', array("NAME" => $block->name, "TYPE" => get_usertype($block->level), "USERNAME" => $block->username, "ID" => $block->id, "LABEL" => $label, "DAY" => number_to_day($block->eguna), "HOUR" => $block->starttime, "DURATION" => $block->duration, "LIVE" => $label2));
		}
		

		$info_blocks = "<strong>Erabiltzaile</strong> bat sistemara sarbidea izango duen pertsona edo irratsaio bat izango da. Ondorengo erabiltzaile motak bereizten dira:<br/><br/><strong>Administratzailea</strong>: Erabiltzaile mota hauek jabeak dira eta sistemaren kontrol osoa dute. Kontuz nori ematen diozun administratzaile baimena.<br/><strong>Kudeatzailea</strong>: Kudeatzaileak administratzaileen azpitik daude eta parrila aldatu dezakete eta irratsaioak gehitu/kendu ditzakete.<br/><strong>Irratsaioa</strong>: Irratiko irratsaioak dira. Podcastak igo ditzakete, igotako podcastak ikusi, edo zuzeneko emisioak egin (baimena baldin badute).";
		$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Erabiltzaileei buruz", "INFO" => $info_blocks));
		$tpl_content .= $HTMLOutput->GetFileContent('table_localusers.tpl', array("TABLE_ELEMENTS" => $tpl_tableinfo));
		$tpl_content .= $HTMLOutput->GetFileContent('table_radiousers.tpl', array("TABLE_ELEMENTS" => $tpl_table2info));
	
}


$tpl_content = load_config_menu(1, $tpl_content);



