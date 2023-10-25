<?php require_once '!chkpass.php';


$_POST['isDefault'] = $_POST['isDefault'] ? '1' : '0';
$_POST['profilecommandDiscord'] = $_POST['profilecommandDiscord'] ? '1' : '0';
$_POST['actionRateDemon'] = $_POST['actionRateDemon'] ? '1' : '0';
$_POST['actionRateStars'] = $_POST['actionRateStars'] ? '1' : '0';
$_POST['actionRateDifficulty'] = $_POST['actionRateDifficulty'] ? '1' : '0';
$_POST['actionSuggestRating'] = $_POST['actionSuggestRating'] ? '1' : '0';
$_POST['actionDeleteComment'] = $_POST['actionDeleteComment'] ? '1' : '0';
$_POST['toolLeaderboardsban'] = $_POST['toolLeaderboardsban'] ? '1' : '0';
$_POST['toolPackcreate'] = $_POST['toolPackcreate'] ? '1' : '0';
$_POST['toolQuestsCreate'] = $_POST['toolQuestsCreate'] ? '1' : '0';
$_POST['toolModactions'] = $_POST['toolModactions'] ? '1' : '0';
$_POST['toolSuggestlist'] = $_POST['toolSuggestlist'] ? '1' : '0';

$_POST['commandRate'] = $_POST['commandRate'] ? '1' : '0';
$_POST['commandFeature'] = $_POST['commandFeature'] ? '1' : '0';
$_POST['commandEpic'] = $_POST['commandEpic'] ? '1' : '0';
$_POST['commandUnepic'] = $_POST['commandUnepic'] ? '1' : '0';
$_POST['commandVerifycoins'] = $_POST['commandVerifycoins'] ? '1' : '0';
$_POST['commandDaily'] = $_POST['commandDaily'] ? '1' : '0';
$_POST['commandWeekly'] = $_POST['commandWeekly'] ? '1' : '0';
$_POST['commandDelete'] = $_POST['commandDelete'] ? '1' : '0';
$_POST['commandSetacc'] = $_POST['commandSetacc'] ? '1' : '0';
$_POST['commandRenameOwn'] = $_POST['commandRenameOwn'] ? '1' : '0';
$_POST['commandRenameAll'] = $_POST['commandRenameAll'] ? '1' : '0';
$_POST['commandPassOwn'] = $_POST['commandPassOwn'] ? '1' : '0';
$_POST['commandPassAll'] = $_POST['commandPassAll'] ? '1' : '0';
$_POST['commandDescriptionOwn'] = $_POST['commandDescriptionOwn'] ? '1' : '0';
$_POST['commandDescriptionAll'] = $_POST['commandDescriptionAll'] ? '1' : '0';
$_POST['commandPublicOwn'] = $_POST['commandPublicOwn'] ? '1' : '0';
$_POST['commandPublicAll'] = $_POST['commandPublicAll'] ? '1' : '0';
$_POST['commandUnlistOwn'] = $_POST['commandUnlistOwn'] ? '1' : '0';
$_POST['commandUnlistAll'] = $_POST['commandUnlistAll'] ? '1' : '0';
$_POST['commandSharecpOwn'] = $_POST['commandSharecpOwn'] ? '1' : '0';
$_POST['commandSharecpAll'] = $_POST['commandSharecpAll'] ? '1' : '0';
$_POST['commandSongOwn'] = $_POST['commandSongOwn'] ? '1' : '0';
$_POST['commandSongAll'] = $_POST['commandSongAll'] ? '1' : '0';
$_POST['profilecommandDiscord'] = $_POST['profilecommandDiscord'] ? '1' : '0';

$db->query("
UPDATE `roles` SET
`roleName`='".$_POST['roleName']."'
,`priority`=".$_POST['priority']."
,`modipCategory`=".$_POST['modipCategory']."
,`isDefault`=".$_POST['isDefault']."
,`commentColor`='".$_POST['commentColor']."'
,`modBadgeLevel`=".$_POST['modBadgeLevel']."
,`profilecommandDiscord`=".$_POST['profilecommandDiscord']."
,`actionRateDemon`=".$_POST['actionRateDemon']."
,`actionRateStars`=".$_POST['actionRateStars']."
,`actionRateDifficulty`=".$_POST['actionRateDifficulty']."
,`actionSuggestRating`=".$_POST['actionSuggestRating']."
,`actionDeleteComment`=".$_POST['actionDeleteComment']."
,`toolLeaderboardsban`=".$_POST['toolLeaderboardsban']."
,`toolPackcreate`=".$_POST['toolPackcreate']."
,`toolQuestsCreate`=".$_POST['toolQuestsCreate']."
,`toolModactions`=".$_POST['toolModactions']."
,`toolSuggestlist`=".$_POST['toolSuggestlist']."

,`commandRate`=".$_POST['commandRate']."
,`commandFeature`=".$_POST['commandFeature']."
,`commandEpic`=".$_POST['commandEpic']."
,`commandUnepic`=".$_POST['commandUnepic']."
,`commandVerifycoins`=".$_POST['commandVerifycoins']."
,`commandDaily`=".$_POST['commandDaily']."
,`commandWeekly`=".$_POST['commandWeekly']."
,`commandDelete`=".$_POST['commandDelete']."
,`commandSetacc`=".$_POST['commandSetacc']."
,`commandRenameOwn`=".$_POST['commandRenameOwn']."
,`commandRenameAll`=".$_POST['commandRenameAll']."
,`commandPassOwn`=".$_POST['commandPassOwn']."
,`commandPassAll`=".$_POST['commandPassAll']."
,`commandDescriptionOwn`=".$_POST['commandDescriptionOwn']."
,`commandDescriptionAll`=".$_POST['commandDescriptionAll']."
,`commandPublicOwn`=".$_POST['commandPublicOwn']."
,`commandPublicAll`=".$_POST['commandPublicAll']."
,`commandUnlistOwn`=".$_POST['commandUnlistOwn']."
,`commandUnlistAll`=".$_POST['commandUnlistAll']."
,`commandSharecpOwn`=".$_POST['commandSharecpOwn']."
,`commandSharecpAll`=".$_POST['commandSharecpAll']."
,`commandSongOwn`=".$_POST['commandSongOwn']."
,`commandSongAll`=".$_POST['commandSongAll']."
,`profilecommandDiscord`=".$_POST['profilecommandDiscord']."

WHERE `roleID`=".$_POST['roleid']);
?>