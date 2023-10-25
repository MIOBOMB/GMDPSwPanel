<?php require_once '!chkpass.php';

$db->query("INSERT INTO `roles` (`roleID`, `priority`, `roleName`) VALUES ('".$_POST['roleid']."', '".$_POST['priority']."', '".$_POST['rolename']."')");
?>