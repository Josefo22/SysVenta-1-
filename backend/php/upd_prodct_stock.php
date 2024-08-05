<?php  
if(isset($_POST['upd_prodct_stock']))
{
    $idprod=trim($_POST['prdid']);
    $stock=trim($_POST['prdstock']);
    
    try {

        $query = "UPDATE productos SET stock=:stock WHERE idprod=:idprod LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':stock' => $stock,
            ':idprod' => $idprod
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Se actualizó correctamente", "success").then(function() {
            window.location = "../productos/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../productos/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



