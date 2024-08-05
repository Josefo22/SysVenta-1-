<?php
    require_once('../../backend/config/Conexion.php');

    function monto($table,$mes,$periodo){
        global $con;
        $fecha_inicial="$periodo-$mes-1";
        if ($mes==1 or $mes==3 or $mes==5 or $mes==7 or $mes==8 or $mes==10 or $mes==12){
            $dia_fin=31;
        } else if ($mes==2){
            if ($periodo%4==0){
                $dia_fin=29;    
            } else {
                $dia_fin=28;
            }
        } else {
            $dia_fin=30;
        }
        $fecha_final="$periodo-$mes-$dia_fin";
        
        $sentencia = $connect->prepare("select sum(total_price) as total_price from $table where placed_on between '$fecha_inicial' and '$fecha_final'");
        $sentencia->execute([$sentencia]);
        return $sentencia->fetchObject()->total_price;
    }

?>


