<?php require_once '!chkpass.php';

if ($_POST['packstars'] > 10) $_POST['packstars'] = 10;
if ($_POST['packcoins'] > 2) $_POST['packcoins'] = 2;

$db->query('UPDATE `mappacks` SET`name`="'.$_POST['packname'].'",`levels`="'.$_POST['packlvl'].'",`stars`="'.$_POST['packstars'].'",`coins`="'.$_POST['packcoins'].'",`difficulty`="'.$_POST['packdiff'].'",`rgbcolors`="'.$_POST['packcol1'].'",`colors2`="'.$_POST['packcol2'].'" WHERE `ID` = "'.$_POST['packid'].'"');
?>