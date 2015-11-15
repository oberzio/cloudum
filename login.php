<!DOCTYPE html>
<html>
        
    <head>
        <title>Bienvenido a UM Cloud</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="css2.css">
    </head>
    <body>
        <?php require_once 'errors.inc.php'; ?>
        <div id="cabecera" class="myform"><img src="images/logo.png" alt='UM Cloud' width="130" height="111"></div>
        <nav id="menu">
           <ul>
                <li><a href='index.html'>Home</a></li>
           </ul>
        </nav>
        <div id="login" class="myform">
            <form id="form" name="form" method="post" action="validar.php">
                <h1>Inicie Sesión</h1>
                <p>Tu cuenta de UM Cloud</p>

                <label>Usuario
                <span class="small">Tu nombre de usuario</span>
                </label>
                <input type="text" name="usuario" id="usuario" pattern="^[a-zA-Z]{6,8}$" title="Ingrese solo letras." required/>
                
                <label>Password
                <span class="small">Tu contraseña</span>
                </label>
                <input type="password" name="passw" id="passw" maxlength="8" required />

                           
                <button type="submit">Aceptar</button>
                <div class="spacer"></div>
            </form>
        </div>
        <div id="pie">Desarrollado para la Cátedra MTI-12 de la Maestria en Teleinformática, U.Mendoza - &copy; 2015 Lic. Oscar Berzio</div>
    </body>
</html>