<?php require_once '!chkpass.php';

include '../config/topArtists.php';

$file = file_get_contents('../config/topArtists.php');
$file = str_replace('$redirect = '.$redirect, '$redirect = '.$_POST['artist'], $file);

file_put_contents('../config/topArtists.php', $file);
?>