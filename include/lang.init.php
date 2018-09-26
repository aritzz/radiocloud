<?php
/*
 * RadioCloud - Cloud Radio Automation System∫
 * Language init
 */
/*
if (isSet($_COOKIE['lang'])) {
switch ($_COOKIE['lang']) {
	case "eu":
		$hizkid = 1;
		$hizk = "eu";
		break;
	case "es":
		$hizkid = 2;
		$hizk = "es";
		break;
	default:
		$hizkid = 1;
		$hizk = "eu";
		break;
}
} else {
$hizk = "eu";
$hizkid = 1;
}*/

// Hizkuntzak datu base bidez ---- begiratzeko

function __($mezua) {
	global $db, $hizkid;
	
	if ($berri = $db->get_row("SELECT * FROM multilang WHERE msgid = '".$db->escape($mezua)."' AND hizkid = '".$db->escape($hizkid)."'"))
		return $berri->msgstr;
	
	else
		return $mezua;

}

?>