<?php


// GUZTI HAU AJAX-ERA MIGRATZEKO DAGO
if ($_POST)
{
    if (!empty($_POST['titulua']) or !empty($_POST['testua']))
    {
        $titulua = $db->escape($_POST['titulua']);
        $testua = $db->escape($_POST['testua']);
        $myid = $current_user->login_realid;
        $db->query("INSERT INTO notes VALUES(NULL, '$titulua', '$testua', '$myid', NOW())");
            header("Location: index.php?m=configuration&c=notes");

    }
}



// Delete instance and redirect
if ($_GET['delNote'])
    if (is_numeric($_GET['delNote']))
    {
        $db->query("DELETE FROM notes WHERE id = ".$db->escape($_GET['delNote']));
        header("Location: index.php?m=configuration&c=notes");
    }




$oharrak = $db->get_results("SELECT *, notes.id as noteid FROM notes INNER JOIN users ON notes.by=users.id ORDER BY date");
$cont = "";

foreach ($oharrak as $ohar)
{
    $url = $stream->ip.":".$stream->port;
    $cont .= $HTMLOutput->GetFileContent('notes_content.tpl', array("ID" => $ohar->noteid, "TITLE" => $ohar->title, "BY" => $ohar->name, "DATE" => $ohar->date, "TEXT"=> $ohar->text));
}

$tpl_content = $HTMLOutput->GetFileContent('notes_container.tpl', array("STREAM_CONTENT" => $cont));

		






$c = $tpl_content;
$tpl_content = load_config_menu(6, $c);