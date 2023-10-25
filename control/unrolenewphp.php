<?php require_once '!chkpass.php';

$db->query("DELETE FROM `roles` WHERE `roles`.`roleID` = ".$_POST['roleid']);
?>