<?php require_once '!chkpass.php';

$auto = 0;
$demon = 0;
$isdemon = 0;
$feature = 0;
$epic = 0;

switch ($_POST['ratediff']) {
    case 00:
        $stars = 1;
        $_POST['ratediff'] = 50;
        $auto = 1;
        break;
    case 10:
        $stars = 2;
        break;
    case 20:
        $stars = 3;
        break;
    case 30:
        $stars = 4;
        break;
    case 34:
        $stars = 5;
        break;
    case 40:
        $stars = 6;
        break;
    case 44:
        $stars = 7;
        break;
    case 50:
        $stars = 8;
        break;
    case 54:
        $stars = 9;
        break;
    case 60:
        $stars = 10;
        $_POST['ratediff'] = 50;
        $demon = 3;
        $isdemon = 1;
    case 64:
        $stars = 10;
        $_POST['ratediff'] = 50;
        $demon = 4;
        $isdemon = 1;
    case 70:
        $stars = 10;
        $_POST['ratediff'] = 50;
        $demon = 0;
        $isdemon = 1;
    case 74:
        $stars = 10;
        $_POST['ratediff'] = 50;
        $demon = 5;
        $isdemon = 1;
    case 80:
        $stars = 10;
        $_POST['ratediff'] = 50;
        $demon = 6;
        $isdemon = 1;
}

switch ($_POST['ratetype']) {
    case 0:
        $stars = 0;
        $isdemon = 0;
        break;
    case 2:
        $feature = 1;
        break;
    case 3:
        $epic = 1;
        break;
}

$db->query("UPDATE `levels` SET
`starStars` = ".$stars.",
`starCoins` = ".$_POST['coins'].",
`starFeatured` = ".$feature.",
`starEpic` = ".$epic.",
`starDifficulty` = ".$_POST['ratediff'].",
`starAuto` = ".$auto.",
`starDemon` = ".$isdemon.",
`starDemonDiff` = ".$demon."
WHERE `levels`.`levelID` = ".$_POST['lvlid']);
?>