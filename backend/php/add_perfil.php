<?php  
if(isset($_POST['add_perfil']))
{
    $idcli = $_POST['clid'];
    $username = $_POST['usrcl'];
    $password=MD5($_POST['pswcl']);
    $rol = $_POST['rolcl'];
   
    
    try {

        $query = "UPDATE clientes SET username  =:username, password=:password,rol=:rol  WHERE idcli=:idcli LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
         
            ':username' => $username,
            ':password' => $password,
            ':rol' => $rol,
            ':idcli' => $idcli
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            echo '<script type="text/javascript">
swal("¡Registrado!", "Perfil creado correctamente", "success").then(function() {
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



