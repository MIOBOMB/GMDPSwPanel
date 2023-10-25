<?php require_once '!chkpass.php';

$currentDirectory = $_GET['dir'];

if (strpos($_GET['dir'], '../..') == true) {
    exit('Acces denied');
}

echo '<tr><th>File</th><th>Size</th></tr>';

if (is_dir($currentDirectory)) {
    $files = glob($currentDirectory . '/*');

    foreach ($files as $file) {
        if (is_dir($file)) {
            echo '<tr><td><button style="background-color:#555555;color:#eeeeee" onclick=recent("'.$file.'")>'.basename($file).'</button></td>
            <td></td></tr>';
        }
    }

    foreach ($files as $file) {
        if (!is_dir($file)) {
            echo '<tr><td><button style="background-color:#eeeeee;color:#555555" onclick=opel("'.$file.'")>'.basename($file).'</button></td>
            <td>'.filesize($file).'</td></tr>';
        }
    }

} else {
    echo 'Can\'t find this file or folder';
}
?>