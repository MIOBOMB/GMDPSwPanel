<?php require_once '!chkpass.php';

$db->query("DELETE FROM `mappacks` WHERE `mappacks`.`ID` = ".$_POST['packid']);
?>