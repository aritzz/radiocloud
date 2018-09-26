<?php
/* Token gestio sistema */

// tokena kadukatu
if ($_GET['delToken'])
{
    $db->query("UPDATE login SET expiration=NOW() WHERE token='".$db->escape($_GET['delToken'])."'");
    header("Location: index.php?m=configuration&c=tokens");
}

// tokena ezabatu
if ($_GET['removeToken'])
{
    $db->query("DELETE FROM login WHERE token='".$db->escape($_GET['removeToken'])."'");
    header("Location: index.php?m=configuration&c=tokens");
}

if ($_GET['cleanExpired'])
{
    $db->query("DELETE FROM login WHERE expiration<NOW()");
    header("Location: index.php?m=configuration&c=tokens");
}

if ($_GET['expireAllTokens'])
{
    $db->query("UPDATE login SET expiration=NOW() WHERE expiration>=NOW()");
    header("Location: index.php?m=configuration&c=tokens");
}



$tokens = $db->get_results("SELECT * FROM login INNER JOIN users ON login.userid=users.id WHERE login.expiration>NOW()");
$tpl_tableinfo = "";
foreach ($tokens as $token)
    $tpl_tableinfo .= $HTMLOutput->GetFileContent('table_activetokens_element.tpl', array("NAME" => $token->name, "SEEN" => $token->seen, "IP" => $token->ip, "AGENT"=>$token->agent, "EXPIRY" => $token->expiration, "ID" => $token->token));

$tokens = $db->get_results("SELECT * FROM login INNER JOIN users ON login.userid=users.id WHERE login.expiration<=NOW()");
$tpl_tableinfo2 = "";
foreach ($tokens as $token)
    $tpl_tableinfo2 .= $HTMLOutput->GetFileContent('table_noactivetokens_element.tpl', array("NAME" => $token->name, "SEEN" => $token->seen, "IP" => $token->ip, "AGENT"=>$token->agent, "EXPIRY" => $token->expiration, "ID" => $token->token));





$info_blocks = "<strong>Token</strong> bat erabiltzaile batek identifikazio bakoitzean esleituta izango duen txarteltxoa da. Token hori baliogabetzean, erabiltzailearen identifikazioa sisteman ezabatuko da. Tokena baliogabetzeko kasu bat: erabiltzaile batek ordenagailu publiko batean saioa irekita utzi du.";
		$tpl_content = $HTMLOutput->GetFileContent('panel.tpl', array("TITLE" => "Tokenei buruz", "INFO" => $info_blocks));
		$tpl_content .= $HTMLOutput->GetFileContent('table_activetokens.tpl', array("TABLE_ELEMENTS" => $tpl_tableinfo));
		$tpl_content .= $HTMLOutput->GetFileContent('table_noactivetokens.tpl', array("TABLE_ELEMENTS" => $tpl_tableinfo2));

$tpl_content = load_config_menu(5, $tpl_content);