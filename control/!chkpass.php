<?php include_once '../incl/lib/connection.php';

$result = $db->query('SELECT * FROM `accounts` WHERE `userName` ="'.$_GET['username'].'"');
$obj = $result->fetch(PDO::FETCH_OBJ);

if (!password_verify($_GET['password'], $obj->password))exit('-229');
if ($obj->isAdmin != 1)exit('-229');
?>