<?php require_once '!chkpass.php';

$db->query('UPDATE `gauntlets` SET `ID`="'.$_POST['gaunid'].'",`level1`="'.$_POST['gaunlvl1'].'",`level2`="'.$_POST['gaunlvl2'].'",`level3`="'.$_POST['gaunlvl3'].'",`level4`="'.$_POST['gaunlvl4'].'",`level5`="'.$_POST['gaunlvl5'].'" WHERE `ID`="'.$_POST['gaunidold'].'"');
?>