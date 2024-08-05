<?php  
if(isset($_POST['upd_supplier']))
{
    $idprov=trim($_POST['suppid']);
    $rucprv=trim($_POST['rcprv']);
    $nomprv=trim($_POST['noprv']);
    $corrprv=trim($_POST['corprv']);

    try {

        $query = "UPDATE proveedores SET nomprv=:nomprv,rucprv=:rucprv, corrprv=:corrprv WHERE idprov=:idprov LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nomprv' => $nomprv,
            ':rucprv' => $rucprv,
            ':corrprv' => $corrprv,
            ':idprov' => $idprov
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Se actualizó correctamente", "success").then(function() {
            window.location = "../proveedores/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../proveedores/nuevo.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



