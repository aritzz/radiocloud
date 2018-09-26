<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	CONFIGURATION
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	11-10-2016
 */


function delete_block($id) {
	global $db;

	if (is_numeric($id) && $id > 2) {
		$getblockname = $db->get_var("SELECT name FROM blocks WHERE blocks.id=".$id);
		$db->query("DELETE FROM schedule WHERE type='".$getblockname."'");
		// Delete groups and blocks with that group
		$db->query("DELETE FROM blocks WHERE id = '".$id."'");
	}
	//echo $id."deleted block";
}

if ($_GET["EDIT"] == 1)
{

	$id = $db->escape($_POST['pk']);
	$val = $db->escape($_POST['value']);
	switch($_POST['name'])
	{
		case "pasahitza":
			$val = md5($val);
			$db->query("UPDATE users SET password='$val' WHERE id=$id");
			echo "Aldatuta";
			break;
		case "izena":
			$db->query("UPDATE users SET name='$val' WHERE id=$id");
			break;
		case "erabiltzailea":
			$db->query("UPDATE users SET username='$val' WHERE id=$id");
			break;
		case "iraupena":
			$progid = $db->get_var("SELECT programid FROM users WHERE id=$id");
			$db->query("UPDATE programs SET duration='$val' WHERE id=$progid");
			break;
		case "ordua":
			echo "ha";
			$progid = $db->get_var("SELECT programid FROM users WHERE id=$id");
			$db->query("UPDATE programs SET start_time='$val' WHERE id=$progid");
			break;
		case "eguna":
			$progid = $db->get_var("SELECT programid FROM users WHERE id=$id");
			$db->query("UPDATE programs SET start_day='$val' WHERE id=$progid");
			break;
		
		case "egoera":
			$newstatus = ($val == "Inaktibo") ? 0 : 1;
			if ($id > 2) {
				$db->query("UPDATE users SET users.enabled='$newstatus' WHERE users.id=$id");
				
			}
			break;
	}

}

else {
if ($_POST)

			if ($_POST["action"] == "delete") {
				$userid = $db->escape($_POST['id']);
				if (is_numeric($userid) and ($userid > 1))
				{
					// Get user block
					$programid = $db->get_var("SELECT programid FROM users WHERE id='".$userid."'");

					if ($programid > 0) { // Delete user associated blocks and schedule
						$blockid = $db->get_var("SELECT blockid FROM programs WHERE id='".$programid."'");
						delete_block($blockid);
						
						// Program
						$db->query("DELETE FROM programs WHERE id = '".$programid."'");
						
                       
                        
                        // Podcasts
                        $db->query("DELETE FROM podcast_upload WHERE userid = '".$programid."'");


					}
                    echo "DELETE FROM users WHERE id = '".$userid."'";
                    // Access info
                    $db->query("DELETE FROM access WHERE access_user = '".$userid."'");
                    $db->query("DELETE FROM access_menu WHERE userid = '".$userid."'");
                    $db->query("DELETE FROM users WHERE id = $userid");
                    // Console
                    $db->query("DELETE FROM console WHERE userid = '".$programid."'");
                    $db->query("DELETE FROM notes WHERE by = '".$programid."'");
                    $db->query("DELETE FROM login WHERE userid = '".$programid."'");


				}
			} elseif ($_POST["action"] == "disable") {
				$userid = $db->escape($_POST['id']);
				if (is_numeric($userid) && ($userid>1)) {
					$getstatus = $db->get_var("SELECT enabled FROM users WHERE id='".$userid."'");
					$val = !$getstatus;
					$db->query("UPDATE users SET enabled='$val' WHERE id='".$userid."'");
				}
			} elseif ($_POST["action"] == "live") {
				$userid = $db->escape($_POST['id']);
				if (is_numeric($userid) && ($userid>1)) {
					$progid = $db->get_var("SELECT programs.id as id FROM users INNER JOIN programs ON users.programid=programs.id WHERE users.id='".$userid."'");
					$getstatus = $db->get_var("SELECT live_allowed FROM users INNER JOIN programs ON users.programid=programs.id WHERE users.id='".$userid."'");
					$val = !$getstatus;
					$db->query("UPDATE programs SET live_allowed='$val' WHERE id='".$progid."'");
				}
			}
}

// Don't load all the page
die();