<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	04-10-2016
 */



/******** Aux. functions for ajax ********/


/******** Ajax requests for podcasts ********/

if ($_GET["EDIT"] == 1)
{
	$id = $db->escape($_POST['pk']);
	$val = $db->escape($_POST['value']);
	switch($_POST['name'])
	{
		case "izena": // izena bloketan dago
            RC_Block::set_desc($id, $val);
			break;
		case "ordua":
            RC_Podcast::set_hour($id, $val);
			break;
		case "url":
            RC_Podcast::set_url($id, $val);
			break;
		case "egoera":
            RC_Podcast::set_day($id, $val);
			break;
	}

}

else if ($_GET["FORCE"] == 1)
{
    $id = $db->escape($_GET['id']);
    RC_Podcast::force_update($id);
}

else {

	if ($_POST["action"] == "delete") 
        RC_Podcast::del_podcast($_POST['id']);
	
	
}

// Don't load all the page
die();