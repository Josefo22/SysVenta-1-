<?php
    require_once('../../backend/config/Conexion.php');
        $trat1=$_POST['trat'];
        
        
////////////// Insertar a la tabla la informacion generada /////////

       

$sql="INSERT INTO marca(nomarc, state) VALUES ('$trat1', '1')";
 $connect->exec($sql);
echo 'Agregado correctamente';




?>