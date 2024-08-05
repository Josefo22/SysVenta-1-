<?php  
if(isset($_POST['upd_customer']))
{
    $idcli=trim($_POST['clid']);
    $tipd=trim($_POST['tipcl']);
    $nudoc=trim($_POST['numcl']);
    $nocl=trim($_POST['namcl']);
    $apcl=trim($_POST['apecl']);
    $telfcl=trim($_POST['telcl']);
    $username=trim($_POST['usrcl']);
   
    
    
    try {

        $query = "UPDATE clientes SET tipd=:tipd,nudoc=:nudoc,nocl=:nocl,apcl=:apcl,telfcl=:telfcl,username=:username WHERE idcli=:idcli LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':tipd' => $tipd,
            ':nudoc' => $nudoc,
            ':nocl' => $nocl,
            ':apcl' => $apcl,
            ':telfcl' => $telfcl,
            ':username' => $username,
            ':idcli' => $idcli
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Se actualizó correctamente", "success").then(function() {
            window.location = "../clientes/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../clientes/nuevo.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



