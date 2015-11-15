<?php include 'auth.inc.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registración - UM Cloud</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css2.css">
    </head>
    <body>
        <?php
        require_once 'PHPGangsta/GoogleAuthenticator.php';
        
        $ga = new PHPGangsta_GoogleAuthenticator();
        $secret = $ga->createSecret();
        $cuenta = $_SESSION['usuario'] .'@'. 'UMCloud';
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($cuenta, $secret);
        ?>
        
        <div id="cabecera" class="myform"><img src="images/logo.png" alt='UM Cloud' width="130" height="111"></div>
        <div id="login" class="myform"> 
           
        <img src='<?php echo $qrCodeUrl?>' alt="QR Code" height="150" width="150">
        <span class="texto">
            <p class="retorno">Paso 1: Descarga la app de Google Authenticator en tu dispositivo.</p>
            <p class="retorno">Paso 2: Abre la app, y escanea el código de barras.</p>
            <p class="retorno">Paso 3: Cuando aparezca el código de seguridad en la app de autenticación, ingresalo abajo, y haz clic en el botón "Validar".</p>
        </span>
         <form action='verifica_otp.php' method='POST'>
             <label>Código de Autenticación
                <span class="small">Ingresa el código de Google Authenticator</span>
             </label>
             <input type='text' name='code' maxlength="6">
             <button type='submit'>Validar</button>
             <input type='hidden' name='secret' value='<?php echo $secret;?>'>
         </form>
        
        <a href='https://support.google.com/accounts/answer/1066447?hl=es' target="_blank">Cómo instalar Google Authenticator</a>
        </div>
        <div id="pie">Desarrollado para la Cátedra MTI-12 de la Maestria en Teleinformática, U.Mendoza - &copy; 2015 Lic. Oscar Berzio</div>
    </body>
</html>
