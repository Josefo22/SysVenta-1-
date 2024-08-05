<?php  
if(isset($_POST['upd_category']))
{
    $idcate=trim($_POST['cateid']);
    $nocate=trim($_POST['catnom']);
   
    
    
    try {

        $query = "UPDATE categoria SET nocate=:nocate WHERE idcate=:idcate LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nocate' => $nocate,
            ':idcate' => $idcate
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Se actualizó correctamente", "success").then(function() {
            window.location = "../categorias/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../categorias/nuevo.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



