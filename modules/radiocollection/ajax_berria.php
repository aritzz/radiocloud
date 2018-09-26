<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	RADIOCORE
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	09-10-2016
 */

/** Calendar ajax requests **/


function disc_exists($barcode)
{
    global $db;
    $barcode = $db->escape($barcode);
    if ($id = $db->get_var("SELECT id FROM collection WHERE barcode='$barcode'"))
        return $id;
    
    return 0;
}

// get calendar events
if ($_POST)
{

	
	$artist = $db->escape($_POST['artist']);
	$title = $db->escape($_POST['title']);
	$genre = $db->escape($_POST['genre']);
	$year = $db->escape($_POST['year']);
	$country = $db->escape($_POST['country']);
	$thumb = $db->escape($_POST['thumb']);
	$format = $db->escape($_POST['format']);
	$label = $db->escape($_POST['label']);
	$where = $db->escape($_POST['whereis']);
    $barcode = $db->escape($_POST['barcode']);

	$copies = is_numeric($db->escape($_POST['whereis'])) ? $db->escape($_POST['whereis']) : 1;


    $date = new DateTime();

    $img_name = $date->getTimestamp().".jpg";
    $img = get_dir("collection_thumbs").'/'.$img_name;
    $ch = curl_init($thumb);
    $fp = fopen($img, 'wb');
    curl_setopt($ch, CURLOPT_FILE, $fp);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

    curl_exec($ch);
    curl_close($ch);
    fclose($fp);
    $elementid = disc_exists($barcode);
    if ($elementid != 0)
        $db->query("UPDATE collection SET collection.quantity=collection.quantity+$copies WHERE id=$elementid");
    else
        $db->query("INSERT INTO collection VALUES(NULL, '$artist', '$title', '$label', '$year', '$genre', '$country', '$format', '$img_name', '$barcode', '$where', '$copies')");
	echo "OK".get_dir("collection_thumbs");
}




die();

