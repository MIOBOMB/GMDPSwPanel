<?php require_once '!chkpass.php';

$hashpass = password_hash($_POST['password'], PASSWORD_DEFAULT);$accid = $_POST['accid'];
$result = $db->query("UPDATE `accounts` SET password = '".$hashpass."' WHERE `accounts`.`accountID` = ".$accid);
$obj = $result->fetch(PDO::FETCH_OBJ);

if ($obj->userName == $_GET['username'])exit('-228');

?>