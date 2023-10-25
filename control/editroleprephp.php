<?php require_once '!chkpass.php';

$result = $db->query('SELECT * FROM `roles` WHERE `roleID` = '.$_POST['roleid']);
$obj = $result->fetchObject();
 
echo '["'.
$obj->roleName.'",'.
$obj->priority.','.
$obj->modipCategory.','.
$obj->isDefault.',"'.
$obj->commentColor.'",'.
$obj->modBadgeLevel.','.
$obj->profilecommandDiscord.','.

$obj->actionRateDemon.','.
$obj->actionRateStars.','.
$obj->actionRateDifficulty.','.
$obj->actionSuggestRating.','.
$obj->actionDeleteComment.','.

$obj->toolLeaderboardsban.','.
$obj->toolPackcreate.','.
$obj->toolQuestsCreate.','.
$obj->toolModactions.','.
$obj->toolSuggestlist.','.

$obj->commandRate.','.
$obj->commandFeature.','.
$obj->commandEpic.','.
$obj->commandUnepic.','.
$obj->commandVerifycoins.','.
$obj->commandDaily.','.
$obj->commandWeekly.','.
$obj->commandDelete.','.
$obj->commandSetacc.','.
$obj->commandRenameOwn.','.
$obj->commandRenameAll.','.
$obj->commandPassOwn.','.
$obj->commandPassAll.','.
$obj->commandDescriptionOwn.','.
$obj->commandDescriptionAll.','.
$obj->commandPublicOwn.','.
$obj->commandPublicAll.','.
$obj->commandUnlistOwn.','.
$obj->commandUnlistAll.','.
$obj->commandSharecpOwn.','.
$obj->commandSharecpAll.','.
$obj->commandSongOwn.','.
$obj->commandSongAll.','.
$obj->profilecommandDiscord.','.

$obj->dashboardModTools.']';

?>