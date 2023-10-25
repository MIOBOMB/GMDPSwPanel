<?php require_once '!chkpass.php';

if ($_POST['packstars'] > 10) $_POST['packstars'] = 10;
if ($_POST['packcoins'] > 2) $_POST['packcoins'] = 2;

$db->query('INSERT INTO `mappacks`
(`ID`, `name`, `levels`, `stars`, `coins`, `difficulty`, `rgbcolors`, `colors2`) 
VALUES ("'.$_POST['packid'].'","'.$_POST['packname'].'","'.$_POST['packlvl'].'","'.$_POST['packstars'].'","'.$_POST['packcoins'].'","'.$_POST['packdiff'].'","'.$_POST['packcol1'].'","'.$_POST['packcol2'].'")');
?>