<?php
require_once 'db.inc.php';

class usuario{			
		var $id;
		var $usuario;
		var $password;
		var $rol;
		var $nombre;
		var $apellido;
		var $estado;
                var $cambiar_pass;
                var $fecha_pass;
                var $otp;
                
		function usuario()
                {
                        $this->usuarios=array();
                }
                
                function rol($usuario)
                {
                    $DB = DB::Open();
                    $result = $DB->qry("SELECT rol FROM usuarios WHERE username = '$usuario'",2);
                    if($result){
                        return $result['rol'];
                    }
                }
                function consultar($usuario)
                {
                    $DB = DB::Open();
                    $result = $DB->qry("SELECT * FROM usuarios WHERE username = '$usuario'",0);
                    $fila=pg_fetch_array($result);
                    if($fila){
                                $this->usuario=$fila['username'];
                                $this->password=$fila['passw'];
                                $this->nombre=$fila['nombre'];
                                $this->apellido=$fila['apellido'];
                                $this->rol=$fila['rol'];
                                $this->estado=$fila['estado'];
                                $this->cambiar_pass=$fila['cambio_pwd'];
                                $this->fecha_pass=$fila['fecha_pwd'];
                                $this->otp=$fila['otp'];
                              }
                    return $result;
                }
                function login_rol($rol)
                {
                    switch ($rol) {
                        case 'user': //Usuario estadar del Cloud
                            $url='main.php';    
                            break;
                        default:
                            $url='login.php?id=3&ty=2';
                            break;
                    }
                    return $url;
                }
                
                function cambiar_pass($usuario, $passw)
                {
                    $DB = DB::Open();
                    $fecha = date('Y-m-d');
                    $result = $DB->qry("UPDATE usuarios SET passw = '$passw', cambio_pwd = 'FALSE', fecha_pwd = '$fecha' WHERE username = '$usuario'",0);
                    if (!$result){
                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
                
                function CrearUsuario()
                {
                    $DB = DB::Open();
                    $fecha= date('Y-m-d');
                    $result = $DB->qry("INSERT INTO usuarios (username, apellido, nombre, email, passw, estado, fecha_pwd, rol) values ('$this->usuario', '$this->apellido', '$this->nombre', '$this->email', '$this->password', 'A', '$fecha', 'user')",0);
                   
                    if (!$result){
                        return false;
                    }
                    else
                    {
                        return true;
                    }
                }
                function OTP_Ok($usuario,$secreto)
                {
                    $DB = DB::Open();
                    $result = $DB->qry("UPDATE usuarios SET otp = 't', secreto = '$secreto' WHERE username = '$usuario'",0);
                    return $result;    
                }
                
                function Get_Secreto($usuario)
                {
                    $DB = DB::Open();
                    $result = $DB->qry("SELECT secreto FROM usuarios WHERE username = '$usuario'",0);
                    $fila=pg_fetch_array($result);
                    return $fila['secreto'];
                }
}
?>