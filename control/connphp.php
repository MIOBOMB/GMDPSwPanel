<?php require_once '!chkpass.php';

$old = array(
    '$username = "'.$username,
    '$password = "'.$password,
    '$dbname = "'.$dbname
);

$new = array(
    '$username = "'.$_POST['dbuser'],
    '$password = "'.$_POST['dbpass'],
    '$dbname = "'.$_POST['dbname']
);

$file = file_get_contents('../config/connection.php');
$file = str_replace($old, $new, $file);

file_put_contents('../config/connection.php', $file);
?>