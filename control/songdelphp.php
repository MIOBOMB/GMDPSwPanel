<?php require_once '!chkpass.php';

$db->query("DELETE FROM `songs` WHERE `songs`.`ID` = ".$_POST['songid']);
?>