<?php  
if(isset($_POST['upd_acceso']))
{
    $id=trim($_POST['useid']);
    $nombre=trim($_POST['nomuse']);
    $username=trim($_POST['namuse']);
    $correo=trim($_POST['corruse']);
   
    try {

        $query = "UPDATE usuarios SET nombre=:nombre,username=:username,correo=:correo  WHERE id=:id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':nombre' => $nombre,
            ':username' => $username,
            ':correo' => $correo,
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("Actualizado!", "Se actualizó correctamente", "success").then(function() {
            window.location = "../accesos/mostrar.php";
        });
        </script>';
            exit(0);
        }
        else
        {
           echo '<script type="text/javascript">
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../accesos/mostrar.php";
        });
        </script>';
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>



