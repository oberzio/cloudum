<!DOCTYPE html>
<html>
    <head>
        <meta charset="iso-8859-1">

    </head>
    <body>
        <?php
        require_once 'PHPGangsta/GoogleAuthenticator.php';

        $ga = new PHPGangsta_GoogleAuthenticator();

        /*$secret = $ga->createSecret();*/
        $secret = 'PLZTWE5MKIG425KY';
        echo "Secret is: ".$secret."\n\n";

        $qrCodeUrl = $ga->getQRCodeGoogleUrl('Blog', $secret);
        echo "Google Charts URL for the QR-Code: ".$qrCodeUrl."\n\n";
        ?>
        <p><img src='<?php echo $qrCodeUrl?>' alt="QR Code" height="150" width="150"></p> 
         <form action='verifica.php' method='POST'>
             <input type='text' name='code' maxlength="10">
             <input type='submit' value='Procesar'>
             <input type='hidden' name='secret' value='<?php echo $secret;?>'>
         </form>
        <?php

        /*$oneCode = $ga->getCode($secret);
        echo "Checking Code '$oneCode' and Secret '$secret':\n";*/

        
        ?>
    </body>
</html>
