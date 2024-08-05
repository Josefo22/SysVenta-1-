<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['delete_supplier'])){
////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `proveedores` WHERE `idprov`=:idprov";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idprov', $idprov, PDO::PARAM_INT);
$idprov=trim($_POST['idprov']);
$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo '<script type="text/javascript">
swal("Eliminado!", "Se elimino correctamente", "success").then(function() {
            window.location = "../proveedores/mostrar.php";
        });
        </script>';
}
else{
    echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../proveedores/nuevo.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>


 

