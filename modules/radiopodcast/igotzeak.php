<?php
/*
 * RadioCloud - Cloud Radio Automation System
 * MODULE: 	UPLOAD PODCAST
 * AUTHOR: 	Aritz Olea <aritzolea@gmail.com>
 * DATE: 	20-10-2016
 */


$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Igotzeei buruz", "INFO" => "Bide hau erabiliz, zure irratsaioa irratira eta irratiko beste sistemetara igotzeko aukera ematen dizu. Jarraitu pausu hauek:<br/><br/>1. Audioa aukeratu eta igotzen jarri<br/>2. Bete irratsaioari buruzko informazioa, beharrezkoak dira data eta titulua.<br/>3. Audioa igotzeko zain egon eta,<br/>4. IGO botoia aktibatuko da, sakatu.<br/><br/><strong>Oharra</strong>: Audioa MP3 edo OGG formatuan ez badago, ezin da igo. Audio guztiak, gehienez, 128Kbps-tako MP3 fitxategietan kodetuko dira. Beraz, ez sortu alperrikako trafikorik sarean."));


if ($_GET['u'] == "true") {
    $upload_path = $db->get_var("SELECT dirpath FROM dirs WHERE dirname='radiocloud_dir'");
	$upload_dir = $db->get_var("SELECT dirpath FROM dirs WHERE dirname='podcast_upload'");

	$valid_formats = array("mp3", "ogg", "flac"); //list of file extention to be accepted
    if(isset($_POST))
        {
            $file1 = $_FILES['fitxeroa']['name']; //input file name in this code is file1
            $size = $_FILES['fitxeroa']['size'];

            if(strlen($file1) > 0)
                {
                    list($txt, $ext) = explode(".", $file1);
					$ext  = pathinfo($_FILES['fitxeroa']['name'], PATHINFO_EXTENSION);

                    if(in_array($ext,$valid_formats))
                    {
                            $temp_name = $current_user->login_id.time().".".$ext;
                            $tmp = $_FILES['fitxeroa']['tmp_name'];
                            if(move_uploaded_file($tmp, $upload_path."/".$upload_dir."/".$temp_name))
                                {
                                	$myid = $current_user->login_realid;
                                 	$db->query("INSERT INTO podcast_upload VALUES(NULL, '$myid', '','', NULL, NULL, NULL, NULL, NULL, '$temp_name', '0', NULL, '0', '1')");
					
                                 	echo $db->insert_id;
                                 	die();
                                }
                            else
                                die("FAIL");              
                        } else
                                die("FAIL");      
            } echo "FAIL";
        } 


        die(); // finish here
}

else if ($_POST) // Sending form info
{
	$data = $db->escape($_POST['data']);
	$titulua = $db->escape($_POST['titulua']);
	$errepikatu = ($db->escape($_POST['errepikatu']) == "on") ? 1 : 0;
	$igo_web = ($db->escape($_POST['igo_web'])) ? 1 : 0;
	$igo_arrosa = ($db->escape($_POST['igo_arrosa'])) ? 1 : 0;
	//$kopiatu = ($db->escape($_POST['kopiatu'])) ? 1 : 0;
	$fitxategi_id = $db->escape($_POST['fitxategi_id']);
	$testua = $db->escape($_POST['editorea']);
	

	if (!empty($titulua) or !empty($data))
	{
		$db->query("UPDATE podcast_upload SET title='$titulua', date='$data', text='$testua', add_repeat='$errepikatu', add_podcast='$igo_web', add_arrosa='$igo_arrosa', load_date=NOW(), is_trash='0' WHERE id='$fitxategi_id'");
		$myid = $current_user->login_realid;
		$db->query("DELETE FROM active_repeats WHERE progid='$myid'");
		$db->query("INSERT INTO active_repeats VALUES('$myid', '$titulua', NOW(), 1)");
	}
	
	$tpl_content .= $HTMLOutput->GetFileContent('panel_green.tpl', array("TITLE" => "Podcasta igo da", "INFO" => "Podcasta igo da sistemara! <a href=\"index.php?m=radiopodcast&c=irratsaioak\">Irratsaioen atalean</a> ikus dezakezu zure podcastaren egoera"));

} else $tpl_content .= $HTMLOutput->GetFileContent('upload.tpl', array());



$tpl_location = $HTMLOutput->GetFileContent('current_location.tpl', array("WHERE" => "RadioPodcast", "ICON" => "cloud-upload", "MODULE" => "Igotzeak"));
