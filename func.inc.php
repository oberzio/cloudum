<?php
/*require_once('db.inc.php');*/
             
     /*Devuelve los dias transcurridos entre dos fechas*/     
     function GetDiasFechas($fecha_mayor, $fecha_menor) {
         $fmayor = date_create($fecha_mayor);
         $fmenor = date_create($fecha_menor);
         
         $intervalo = date_diff($fmayor, $fmenor);
         return $intervalo->format('%a');
     }
          
   
   function GetSexo($codigo) {
        switch ($codigo)
        {
        case "1":
            return "MASCULINO";
            break;
        case "2":
            return "FEMENINO";
            break;
        default:
            return "NO CONSIGNA";
            break;
        }
   }
            
    function GetIP() {
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            return $_SERVER['HTTP_CLIENT_IP'];
           
        if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            return $_SERVER['HTTP_X_FORWARDED_FOR'];
       
        return $_SERVER['REMOTE_ADDR'];
    }
    
    /*function GrabarAuditoria($usuario, $descripcion, $ip, $observa, $sistema) {
        if(isset($usuario) && isset($descripcion))
        {
            $DB=DB::Open();
            $result=$DB->qry("INSERT INTO auditoria (usuario, fecha, descripcion, ip, observaciones, sistema) VALUES ('".$usuario."','"
                    .date("Y-m-d H:i:s"). "', '" .$descripcion. "', '" .$ip. "', '" .$observa. "', '" .$sistema. "');",0);

        }
    }*/
    
   
?>