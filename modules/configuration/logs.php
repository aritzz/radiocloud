<?php

if ($_GET['clean'] == 1)
{
    $db->query("TRUNCATE TABLE log");
    header("Location: index.php?m=configuration&c=logs");
}

$logak = $db->get_results("SELECT * FROM log ORDER BY date DESC");

$log_content = "";
foreach ($logak as $log)
{
	$log_content .= "<strong>".$log->type."</strong> ".$log->date." ".$log->data."<br/>";
}

$log_content = (empty($log_content)) ? "Loga hutsik dago" : $log_content;

$c = $HTMLOutput->GetFileContent('logs.tpl', array("INFO" => $log_content));
$tpl_content = load_config_menu(4, $c);