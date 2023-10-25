<?php require_once '!chkpass.php';

$db->query("DELETE FROM `roleassign` WHERE `roleassign`.`assignID` = ".$_POST['assid']);
?>