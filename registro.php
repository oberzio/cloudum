<?php require_once 'usuarios.inc.php'; ?>
<?php 
if((isset($_POST['usuario']) and isset($_POST['nombre']) and isset($_POST['passw1']) and isset($_POST['passw2'])) &&
    (!empty($_POST['usuario'])) && !empty($_POST['nombre']))
{
    if($_POST['passw1'] == $_POST['passw2'])
    {
        $user = new usuario;
        $user->consultar($_POST['usuario']);
        if($user->usuario == "")
        {
            $user->usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
            $user->apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
            $user->nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $user->email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            $user->password = md5(filter_var($_POST['passw1'], FILTER_SANITIZE_STRING));   
            $res=$user->CrearUsuario();
            
            if($res) {
                header('Location: login.php?id=1&ty=1');
                die();
            }
            else {
                header('Location: login.php?id=3&ty=2');
                die();
            }
        }
        else{
                header('Location: login.php?id=8&ty=2');
                die();
        }
    }
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registración - UM Cloud</title>
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
            <form id="form" name="form" method="post" action="registro.php">
                <h1>Registrate en UM Cloud</h1>
                <p>Crea tu cuenta gratuita para UM Cloud</p>

                <label>Usuario
                <span class="small">Elegi un nombre de usuario</span>
                </label>
                <input type="text" name="usuario" id="usuario" pattern="^[a-zA-Z]{6,15}$" title="Ingrese solo letras." required/>
                
                <label>Nombre
                <span class="small">Tu nombre</span>
                </label>
                <input type="text" name="nombre" id="nombre" pattern="^[a-zA-Z]{3,20}$" maxlength="20" required/>

                <label>Apellido
                <span class="small">Tu apellido</span>
                </label>
                <input type="text" name="apellido" id="apellido" pattern="^[a-zA-Z]{3,20}$" maxlength="20" required/>
                
                <label>Email
                <span class="small">Una direcci&oacute;n v&aacute;lida</span>
                </label>
                <input type="email" name="email" id="email" required/>

                <label>Password
                <span class="small">Min. 6 cars</span>
                </label>
                <input type="password" name="passw1" id="passw1" maxlength="8" required />

                <label>Confirme Password
                <span class="small">Repite la contraseña</span>
                </label>
                <input type="password" name="passw2" id="passw1" maxlength="8" required />
                
                <button type="submit">Aceptar</button>
                <div class="spacer"></div>
            </form>
        </div>
        <div id="pie">Desarrollado para la Cátedra MTI-12 de la Maestria en Teleinformática, U.Mendoza - &copy; 2015 Lic. Oscar Berzio</div>
    </body>
</html>
