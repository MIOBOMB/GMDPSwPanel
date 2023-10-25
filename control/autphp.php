<?php require_once '!chkpass.php';

$db->query("UPDATE `levels` SET `userName` = '".$_POST['author']."' WHERE `levels`.`levelID` = ".$_POST['lvlid']);
?>