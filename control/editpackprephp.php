<?php require_once '!chkpass.php';

$result = $db->query('SELECT * FROM `mappacks` WHERE `ID` = '.$_POST['packid']);
$obj = $result->fetch(PDO::FETCH_OBJ);

$numbers = explode(",", $obj->levels);
$result = array_map(function($number) {
    return '"' . $number . '"';
}, $numbers);
$lvls = implode(",", $result);

echo '["'.
$obj->name.'",'.
$lvls.',"'.


$obj->stars.'","'.
$obj->coins.'","'.
$obj->difficulty.'","'.
$obj->rgbcolors.'","'.
$obj->colors2.'"]';

?>