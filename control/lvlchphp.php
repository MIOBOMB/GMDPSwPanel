<?php require_once '!chkpass.php';

$db->query("UPDATE `levels` SET `levelName` = '".$_POST['lvlname']."' WHERE `levels`.`levelID` = ".$_POST['lvlid']);
?>