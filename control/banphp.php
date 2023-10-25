<?php require_once '!chkpass.php';

$db->query("UPDATE `accounts` SET `isActive` = 0 WHERE `accounts`.`accountID` = ".$_POST['accid']);
?>