<?php require_once '!chkpass.php';

$db->query('UPDATE `quests` SET
`type`="'.$_POST['questtype'].'",
`amount`="'.$_POST['questamount'].'",
`reward`="'.$_POST['questreward'].'",
`name`="'.$_POST['questname'].'"
WHERE `ID`="'.$_POST['questid'].'"');
?>