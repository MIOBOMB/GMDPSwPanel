<?php require_once '!chkpass.php';

$set = $db->prepare('INSERT INTO `gauntlets`(`ID`, `level1`, `level2`, `level3`, `level4`, `level5`)
VALUES (?,?,?,?,?,?)');
$set->execute([
$_POST['gaunid'],
$_POST['gaunlvl1'],
$_POST['gaunlvl2'],
$_POST['gaunlvl3'],
$_POST['gaunlvl4'],
$_POST['gaunlvl5']]);
?>