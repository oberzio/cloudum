<?php
       
       include('usuarios.inc.php');
       include('func.inc.php');
       
       $usuario=new usuario();
       
       $s_username = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
       
       $usuario->consultar($s_username);
       
       if($usuario)
       {
           if($usuario->password==md5($_POST['passw']))
           {
               if($usuario->estado=='A'){
                    session_start();
                    $_SESSION['usuario']=$s_username;
                    $_SESSION['rol']=$usuario->rol;
                   
                    if($usuario->otp=='f')
                    {   
                        header('Location: registro_otp.php');
                        die();
                    }
                    /*
                    if(GetDiasFechas(date('Y-m-d'),$usuario->fecha_pass) > 30) {
                       $usuario->cambiar_pass='t';
                    }
                    
                    if($usuario->cambiar_pass == 't')
                    {
                        $ip = GetIP();
                        $res = GrabarAuditoria($s_username, 'Login c/cambio de clave', $ip, 'Ingreso al Sistema', 'UMCloud');
                        header('Location: change_pass.php');                       
                    }
                    */
                    else {
                        /*$url=$usuario->login_rol($usuario->rol);
                        header('Location: '.$url);*/
                        header('Location: 2factorlogin.php');
                        die();
                    }
               }
               else {
                    header('Location: login.php?id=5&ty=2');
               }
           }
           else
           {
               /*echo $_POST['usuario'] . " " . $_POST['passw'];*/
               header('Location: login.php?id=1&ty=2');
           }
       }
       else
       {
          header('Location: login.php?id=2&ty=2'); 
       }
?>