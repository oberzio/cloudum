<?php

if(isset($_GET['id']) && isset($_GET['ty']) && !empty($_GET['id']) && !empty($_GET['ty'])) 
{ 
    if ($_GET['ty']==1)
    {
        echo '<div class="message" align="center">'; 
        switch($_GET['id']) 
        { 
            case 1: 
                echo "El usuario ha sido creado con éxito. Ingresa."; 
                break;
            case 2: 
                echo "La contraseña ha sido modificada exitosamente. Ingrese nuevamente"; 
                break;
        }
        echo '</div>'; 
    }
    
    else
    {
     echo '<div class="error" align="center">'; 
     switch($_GET['id']) 
     { 
     case 1: 
         echo "Usuario y/o Contraseña Incorrectos."; 
         break; 
     case 2: 
         echo "Debe Ingresar Usuario y/o Contraseña válidos."; 
         break; 
     case 3:
         echo "La cuenta de usuario no ha podido crearse.";
         break;
     case 4:
         echo "Debe iniciar sesión.";
         break;
     case 5:
         echo "Usuario Inhabilitado";
         break;
     case 6:
         echo "Las contraseñas no coinciden";
         break;
     case 7:
         echo "La nueva contraseña no debe ser igual a la anterior";
         break;
     case 8:
         echo "Ya existe una cuenta con ese nombre de usuario.";
         break;
     case 9:
         echo "Error al validar la cuenta.";
         break;
     
     default:
          echo "Error inesperado."; 
          break;
          
     }
     echo '</div>'; 
    }
 }    
 
   
?>
