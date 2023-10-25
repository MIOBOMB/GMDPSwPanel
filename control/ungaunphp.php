<?php require_once '!chkpass.php';

$db->query("DELETE FROM `gauntlets` WHERE `gauntlets`.`ID` = ".$_POST['gaunid']);
?>