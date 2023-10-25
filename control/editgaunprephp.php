<?php require_once '!chkpass.php';

$result = $db->query('SELECT * FROM `gauntlets` WHERE `ID` = '.$_POST['gaunid']);
$obj = $result->fetch(PDO::FETCH_OBJ);

echo '["'.
$obj->ID.'","'.
$obj->level1.'","'.
$obj->level2.'","'.
$obj->level3.'","'.
$obj->level4.'","'.
$obj->level5.'"]'

?>