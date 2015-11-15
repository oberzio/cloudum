<?php

$oneCode = $_POST['code'];
$secret = $_POST['secret'];

require_once 'PHPGangsta/GoogleAuthenticator.php';
/*echo $_POST['code'];*/
$ga = new PHPGangsta_GoogleAuthenticator();
$checkResult = $ga->verifyCode($secret, $oneCode, 4);    // 2 = 2*30sec clock tolerance
        if ($checkResult) {
            echo 'OK';
        } else {
            echo 'FAILED';
        }

?>

