<?php require_once '!chkpass.php';

$db->query("INSERT INTO `quests` (`ID`, `type`, `amount`, `reward`, `name`) VALUES ('".$_POST['questid']."', '".$_POST['questtype']."', '".$_POST['questamount']."', '".$_POST['questreward']."', '".$_POST['questname']."')");
?>