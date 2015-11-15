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
    require_once 'usuarios.inc.php';
    require_once 'PHPGangsta/GoogleAuthenticator.php';    
    $s_username  = filter_var($_SESSION['usuario'],FILTER_SANITIZE_STRING);
    $user=new usuario();
    
    $oneCode = $_POST['code'];
    
    if($_POST['2factor']){
      $secret = $user->Get_Secreto($s_username);
    }
    else{
      $secret = $_POST['secret'];  
    }
    
    $ga = new PHPGangsta_GoogleAuthenticator();
    $checkResult = $ga->verifyCode($secret, $oneCode, 4);    //Tolerancia 4*30seg
    ?>
    <div id="cabecera" class="myform"><img src="images/logo.png" alt='UM Cloud' width="130" height="111"></div>
    <div id="login" class="myform"> 
        <h1>Registrate en UM Cloud</h1>
        <p>Verificación de la Cuenta</p>
    <?php
    if ($checkResult) {
        
        
        $res=$user->OTP_Ok($s_username, $secret);
        
        if($res){
            $_SESSION['auth2f']='ok';
        ?>
                <img src='images/ok.png' alt='Ok' width='96' height='92'>
                <span class="textoh1">La cuenta ha sido verificada con éxito.</span>
                <a href='main.php' target="_self">Ingresar</a>
        <?php
                die();
        }
        else{
        ?>
                <img src='images/failed.png' alt='Ok' width='96' height='92'>
                <span class="textoh1">Error al verificar la cuenta. Intenta nuevamente</span>
                <a href='cerrar_sesion.php?id=9&ty=2' target="_self">Volver</a>
        <?php
                die();
        }
        ?>
        

            
    <?php
    } else {
        ?>
        <img src='images/failed.png' alt='Ok' width='130' height='111'>
        <span class="textoh1">Ha fallado la verificación de la cuenta. Intenta nuevamente</span>
        <a href='cerrar_sesion.php?id=9&ty=2' target="_self">Volver</a>
    <?php
    }
        die();
    ?>
    </div>
    <div id="pie">Desarrollado para la Cátedra MTI-12 de la Maestria en Teleinformática, U.Mendoza - &copy; 2015 Lic. Oscar Berzio</div>
    </body>
</html>

