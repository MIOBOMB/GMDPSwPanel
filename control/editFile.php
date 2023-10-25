<?php require_once '!chkpass.php';

if (filesize($_GET['dir']) > 1048576) exit('Too large file');

if (strpos($_GET['dir'], '../..') == true) {
    exit('Acces denied');
}

echo '

<textarea style="width:90vw;height:400px;min-width:300px">'.file_get_contents($_GET['dir']).'</textarea>

';