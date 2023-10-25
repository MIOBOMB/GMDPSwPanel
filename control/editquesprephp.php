<?php require_once '!chkpass.php';

$result = $db->query('SELECT * FROM `quests` WHERE `ID` = '.$_POST['quesid']);
$obj = $result->fetchObject();

echo '["'.
$obj->ID.'","'.
$obj->type.'","'.
$obj->amount.'","'.
$obj->reward.'","'.
$obj->name.'"]'

?>