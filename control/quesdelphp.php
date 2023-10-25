<?php require_once '!chkpass.php';

$db->query("DELETE FROM `quests` WHERE `quests`.`ID` = ".$_POST['quesid']);
?>