<?php require_once '!chkpass.php';

$db->query("INSERT INTO `roleassign` (`assignID`, `roleID`, `accountID`) VALUES ('".$_POST['assid']."', '".$_POST['roleid']."', '".$_POST['accid']."')");
?>