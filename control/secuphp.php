<?php require_once '!chkpass.php';

include '../config/security.php';

$sessionGrants = $sessionGrants ? 'true' : 'false';
$unregisteredSubmissions = $unregisteredSubmissions ? 'true' : 'false';
$preactivateAccounts = $preactivateAccounts ? 'true' : 'false';
$enableCaptcha = $enableCaptcha ? 'true' : 'false';

$hCaptchaKey = '"'.$hCaptchaKey.'";';
$_POST['sitekey'] = '"'.$_POST['sitekey'].'";';
$hCaptchaSecret = '"'.$hCaptchaSecret.'";';
$_POST['secretkey'] = '"'.$_POST['secretkey'].'";';

$old = array(
    '$sessionGrants = '.$sessionGrants,
    '$unregisteredSubmissions = '.$unregisteredSubmissions,
    '$preactivateAccounts = '.$preactivateAccounts,
    '$enableCaptcha = '.$enableCaptcha,
    '$hCaptchaKey = '.$hCaptchaKey,
    '$hCaptchaSecret = '.$hCaptchaSecret
);

$new = array(
    '$sessionGrants = '.$_POST['gjpchk'],
    '$unregisteredSubmissions = '.$_POST['lvlupl'],
    '$preactivateAccounts = '.$_POST['autoacc'],
    '$enableCaptcha = '.$_POST['captcha'],
    '$hCaptchaKey = '.$_POST['sitekey'],
    '$hCaptchaSecret = '.$_POST['secretkey']
);

$file = file_get_contents('../config/security.php');
$file = str_replace($old, $new, $file);

file_put_contents('../config/security.php', $file);
?>