<?php require_once '!chkpass.php';

include '../config/discord.php';

$discordEnabled = $discordEnabled ? 'true' : 'false';

$old = array(
    '$discordEnabled = '.$discordEnabled,
    '$secret = "'.$secret.'";',
    '$bottoken = "'.$bottoken.'";'
);

$new = array(
    '$discordEnabled = '.$_POST['disc'],
    '$secret = "'.$_POST['botsecret'].'";',
    '$bottoken = "'.$_POST['bottoken'].'";'
);

$file = file_get_contents('../config/discord.php');
$file = str_replace($old, $new, $file);

file_put_contents('../config/discord.php', $file);
?>