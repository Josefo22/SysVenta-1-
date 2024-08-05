<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['delete_customer'])){
////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `clientes` WHERE `idcli`=:idcli";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idcli', $idcli, PDO::PARAM_INT);
$idcli=trim($_POST['idcli']);
$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo '<script type="text/javascript">
swal("Eliminado!", "Se elimino correctamente", "success").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
}
else{
    echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../clientes/nuevo.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>


 

