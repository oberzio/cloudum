<?php include 'auth.inc.php'; ?>
<!DOCTYPE html>
<html>
        
    <head>
        <title>Bienvenido a UM Cloud</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css2.css">
    </head>
    <body>
        
        <div id="cabecera" class="myform"><img src="images/logo.png" alt='UM Cloud' width="130" height="111"></div>
        <nav id="menu">
           <ul>
                <li><a href='index.html'>Home</a></li>
           </ul>
        </nav>
        <div id="login" class="myform">
            <form id="form" name="form" method="post" action="verifica_otp.php">
                <h1>Verificación de doble factor</h1>
                <p>Tu cuenta de UM Cloud</p>

                <label>Código de Autenticación
                <span class="small">Ingresa el código de Google Authenticator</span>
                </label>
                <input type="text" name="code" pattern="^[0-9]{6}$" title="Código de autenticación." required/>
                <input type="hidden" name="2factor" value="1">
                              
                <button type="submit">Validar</button>
                <div class="spacer"></div>
            </form>
        </div>
        <div id="pie">Desarrollado para la Cátedra MTI-12 de la Maestria en Teleinformática, U.Mendoza - &copy; 2015 Lic. Oscar Berzio</div>
    </body>
</html>