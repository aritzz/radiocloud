<?php

// Igotzeak

if ($_GET['u']) {

    $type = ($_GET['text'] == 1) ? "jingle" : "intro";
    $upload_path = $db->get_var("SELECT dirpath FROM dirs WHERE dirname='radiocloud_dir'");
	$upload_dir = $db->get_var("SELECT dirpath FROM dirs WHERE dirname='console_upload'");

	$valid_formats = array("mp3", "ogg", "flac");
    if(isset($_POST))
        {
            $file1 = $_FILES['fitxeroa']['name']; 
            $size = $_FILES['fitxeroa']['size'];

            if(strlen($file1) > 0)
                {
                    list($txt, $ext) = explode(".", $file1);
					$ext  = pathinfo($_FILES['fitxeroa']['name'], PATHINFO_EXTENSION);

                    if(in_array($ext,$valid_formats))
                    {
                            $temp_name = $current_user->login_realid.$type.time().".".$ext;
                            $tmp = $_FILES['fitxeroa']['tmp_name'];
                            if(move_uploaded_file($tmp, $upload_path."/".$upload_dir."/".$temp_name))
                                {
                                	$myid = $current_user->login_realid; 
                                    echo RC_Console::add_console($myid, '', $temp_name, $type);
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

// Streamak berritu
if ($_GET['streams'])
{
    $streamlist = RC_Streams::get_streams();
    foreach ($streamlist as $stream)
    {
        if ($stream->type == "shoutcast")
            $listeners = RC_Streams::get_shoutcast_listeners($stream->ip, $stream->port, $stream->vars);
        else 
            $listeners = RC_Streams::get_icecast_listeners($stream->ip, $stream->port, $stream->vars);
        
        echo $HTMLOutput->GetFileContent('streambox.tpl', array("COLOR" => $stream->color, "NAME" => $stream->name, "LISTENERS" => $listeners));
    }
    
    

    die();
}

// Aktualizazinoik
if ($_GET['update'] == 1)
{
    if (is_numeric($_POST['id']))
        RC_Console::set_name($_POST['id'], $_POST['text']);
    
    die();
}

if ($_GET['update'] == 2)
{
    $type = ($_POST['text'] == 1) ? "jingle" : "intro";
    echo $type.$_POST['id'];
    if (is_numeric($_POST['id']))
        RC_Console::set_type($_POST['id'], $type);
    
    die();
}


// Ezabaketak
if ($_GET['del'])
{
    $idnum = $_POST['remid'];
    if (is_numeric($idnum))
    {
        $type = RC_Console::get_type_user($idnum, $current_user->login_realid);
        
        if (($type == "intro") or ($type == "jingle")) {
            $res = RC_Console::get_file_user($idnum, $current_user->login_realid);

            $upload_path = $db->get_var("SELECT dirpath FROM dirs WHERE dirname='radiocloud_dir'");
            $upload_dir = $db->get_var("SELECT dirpath FROM dirs WHERE dirname='console_upload'");
            unlink($upload_path."/".$upload_dir."/".$res);
        }
        
        RC_Console::del_console_user($idnum, $current_user->login_realid);
    }
    echo "OK";
    die();
}


// Gehitu
if ($_GET['add'])
{
    $name = $db->escape($_POST['name']);
    $url = $db->escape($_POST['url']);
    $type = ($_GET['add'] == 1) ? "stream" : "youtube";
    
    if (!empty($name) && !empty($url))
        RC_Console::add_console($current_user->login_realid, $name, $url, $type);

}

// Datuak jaso ta bidali
switch($_GET['type']) {
    case 'jingle':
        $a = RC_Console::get_user_jingles($current_user->login_realid);
        break;
    case 'intro':
        $a = RC_Console::get_user_intro($current_user->login_realid);
        break;
    case 'youtube':
        $a = RC_Console::get_user_youtube($current_user->login_realid);
        break;
    case 'stream':
        $a = RC_Console::get_user_stream($current_user->login_realid);
        break;     
    default:
        $a = "error";        
}


echo json_encode($a);
die();
?>