<?php require_once '!chkpass.php';

include '../config/dailyChests.php';

if ($_POST['chest1items'] != '') {
    $_POST['chest1items'] = str_split($_POST['chest1items']);
    $_POST['chest1items'] = implode(", ", $_POST['chest1items']);
}
if ($_POST['chest2items'] != '') {
    $_POST['chest2items'] = str_split($_POST['chest2items']);
    $_POST['chest2items'] = implode(", ", $_POST['chest2items']);
}

$old = array(
    '$chest1minOrbs = '.(string)$chest1minOrbs,
    '$chest1maxOrbs = '.(string)$chest1maxOrbs,
    '$chest1minDiamonds = '.(string)$chest1minDiamonds,
    '$chest1maxDiamonds = '.(string)$chest1maxDiamonds,
    '$chest1minKeys = '.(string)$chest1minKeys,
    '$chest1maxKeys = '.(string)$chest1maxKeys,
    '$chest1items = ['.implode(', ', $chest1items),
    '$chest1wait = '.(string)$chest1wait,

    '$chest2minOrbs = '.(string)$chest2minOrbs,
    '$chest2maxOrbs = '.(string)$chest2maxOrbs,
    '$chest2minDiamonds = '.(string)$chest2minDiamonds,
    '$chest2maxDiamonds = '.(string)$chest2maxDiamonds,
    '$chest2minKeys = '.(string)$chest2minKeys,
    '$chest2maxKeys = '.(string)$chest2maxKeys,
    '$chest2items = ['.implode(', ', $chest2items),
    '$chest2wait = '.(string)$chest2wait,
);

$new = array(
    '$chest1minOrbs = '.(string)$_POST['chest1minOrbs'],
    '$chest1maxOrbs = '.(string)$_POST['chest1maxOrbs'],
    '$chest1minDiamonds = '.(string)$_POST['chest1minDiamonds'],
    '$chest1maxDiamonds = '.(string)$_POST['chest1maxDiamonds'],
    '$chest1minKeys = '.(string)$_POST['chest1minKeys'],
    '$chest1maxKeys = '.(string)$_POST['chest1maxKeys'],
    '$chest1items = ['.$_POST['chest1items'],
    '$chest1wait = '.(string)$_POST['chest1wait'],
    
    '$chest2minOrbs = '.(string)$_POST['chest2minOrbs'],
    '$chest2maxOrbs = '.(string)$_POST['chest2maxOrbs'],
    '$chest2minDiamonds = '.(string)$_POST['chest2minDiamonds'],
    '$chest2maxDiamonds = '.(string)$_POST['chest2maxDiamonds'],
    '$chest2minKeys = '.(string)$_POST['chest2minKeys'],
    '$chest2maxKeys = '.(string)$_POST['chest2maxKeys'],
    '$chest2items = ['.$_POST['chest2items'],
    '$chest2wait = '.(string)$_POST['chest2wait']
);

$file = file_get_contents('../config/dailyChests.php');
$file = str_replace($old, $new, $file);

file_put_contents('../config/dailyChests.php', $file);
?>