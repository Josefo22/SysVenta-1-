<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['delete_product'])){
////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `productos` WHERE `idprod`=:idprod";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idprod', $idprod, PDO::PARAM_INT);
$idprod=trim($_POST['idprod']);
$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo '<script type="text/javascript">
swal("Eliminado!", "Se elimino correctamente", "success").then(function() {
            window.location = "../productos/mostrar.php";
        });
        </script>';
}
else{
    echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../productos/nuevo.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>


 

