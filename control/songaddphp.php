<?php require_once '!chkpass.php';
require_once '../incl/lib/exploitPatch.php';
require_once '../incl/lib/mainLib.php';
require_once '../incl/lib/Captcha.php';
$gs = new mainLib();
if(!empty($_POST['songlink'])){
	$result = $gs->songReupload($_POST['songlink']);
	if($result == "-4" && $result == "-3" && $result == "-2"){
        exit();
    }

    $nong = $db->query("SELECT * FROM `songs` WHERE `ID` = ".$result);
    $data = $nong->fetch(PDO::FETCH_OBJ);
    foreach ($data as $obj) {
        $strink = $obj->name;
        if (strlen($strink) > 25) {
            $strink = substr($strink, 0, 25).'...';
        }
        echo '<tr id="song'.$obj->ID.'">
    <td>'.$strink.'</td>
    <td>'.$obj->ID.'</td>
    <td>'.$obj->authorName.'</td>
    <td><button onclick="unsongpre('.$obj->ID.')">Remove</button></td>
    <td><button onclick="playSound(\'nong'.$obj->ID.'\', \''.$obj->download.'\')" id="nong'.$obj->ID.'">Play</button></td>
    </tr>';
    }
}
?>