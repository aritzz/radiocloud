<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	04-10-2016
 */



if ($_GET["EDIT"] == 1)
{
	$id = $db->escape($_POST['pk']);
	$val = $db->escape($_POST['value']);
	switch($_POST['name'])
	{
		case "blokea":
            RC_Block::set_desc($id, $val);
            //echo "f";
			//$db->query("UPDATE blocks SET blocks.desc='$val' WHERE blocks.id=$id");
			break;
		case "mota":
            RC_Block::set_name($id, $val);
			//$db->query("UPDATE block_groups SET groupname='$val' WHERE id=$id");
			break;
		case "url":
            RC_Block::set_var($id, $val);
			//$db->query("UPDATE blocks SET blocks.vars='$val' WHERE blocks.id=$id");
			break;
		case "egoera":
			$newstatus = ($val == "Inaktibo") ? 0 : 1;
			if ($id > 2) {
                
				if ($newstatus == 0) // delete block from schedule
					RC_Block::disable($id);
				else
                    RC_Block::enable($id);
			}
			break;
	}

}

else {
if ($_POST)
	switch ($_POST['block'])
	{
		case "group":
			if ($_POST["action"] == "delete")
                RC_Block::del_group($_POST['id']);
            
		break;
		case "block":
			if ($_POST["action"] == "delete")
                RC_Block::del_block($_POST['id']);
		break;
	}
}

// Don't load all the page
die();