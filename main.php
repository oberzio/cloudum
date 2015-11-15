<?php include 'auth2.inc.php'; ?>
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
                <li>Bienvenido <?php echo " ".$_SESSION['usuario']; ?></li>
                <li><a href='cerrar_sesion.php'>Cerrar Sesión</a></li>
           </ul>
        </nav>
        <div id="login" class="myform">
            <h1>Servicios de UM Cloud</h1>
            <p>Crea tu máquina virtual en UM Cloud</p>
            
            <a href='main.php'>aplicaciones</a>
            <a href='main.php'>almacenamiento</a>
            <a href='main.php'>procesamiento</a>
            <p></p>
            
        </div>
        <div id="pie">Desarrollado para la Cátedra MTI-12 de la Maestria en Teleinformática, U.Mendoza - &copy; 2015 Lic. Oscar Berzio</div>
        
    </body>
</html>
