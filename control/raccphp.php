<?php require_once '!chkpass.php';

include '../config/reuploadAcc.php';

$old = array(
    '$reupUID = '.$reupUID,
    '$reupAID = '.$reupAID
);

$new = array(
    '$reupUID = '.$_POST['uid'],
    '$reupAID = '.$_POST['aid']
);

$file = file_get_contents('../config/reuploadAcc.php');
$file = str_replace($old, $new, $file);

file_put_contents('../config/reuploadAcc.php', $file);
?>