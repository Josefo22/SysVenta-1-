<?php  
if(isset($_POST['upd_acceso_pwd']))
{
    $id = $_POST['useid'];
    $password=MD5($_POST['pswuse']);
    
    
    try {

        $query = "UPDATE usuarios SET password=:password WHERE id=:id LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':password' => $password,
            ':id' => $id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Actualizado!", "Contraseña actualizada correctamente", "success").then(function() {
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



