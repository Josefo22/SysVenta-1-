<?php
    require_once('../../backend/config/Conexion.php');
if(isset($_POST['delete_category'])){
////////////// Actualizar la tabla /////////
$consulta = "DELETE FROM `categoria` WHERE `idcate`=:idcate";
$sql = $connect-> prepare($consulta);
$sql -> bindParam(':idcate', $idcate, PDO::PARAM_INT);
$idcate=trim($_POST['idcate']);
$sql->execute();

if($sql->rowCount() > 0)
{
$count = $sql -> rowCount();
echo '<script type="text/javascript">
swal("Eliminado!", "Se elimino correctamente", "success").then(function() {
            window.location = "../categorias/mostrar.php";
        });
        </script>';
}
else{
    echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../categorias/nuevo.php";
        });
        </script>';

print_r($sql->errorInfo()); 
}
}// Cierra envio de guardado
?>


 

