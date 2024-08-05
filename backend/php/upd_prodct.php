<?php  
if(isset($_POST['upd_prodct']))
{
    $idprod=trim($_POST['prdid']);
    $codpro=trim($_POST['prdcod']);
    $nomprd=trim($_POST['prdnom']);
    $desprd=trim($_POST['prddes']);
    $precio=trim($_POST['prdprec']);
    $idmar=trim($_POST['prdmarc']);
    $idcate=trim($_POST['prdcate']);
    $modelo=trim($_POST['prdmod']);
    $peso=trim($_POST['prdpes']);
   
    
    
    try {

        $query = "UPDATE productos SET codpro=:codpro,nomprd=:nomprd,desprd=:desprd,precio=:precio,idmar=:idmar,idcate=:idcate,modelo=:modelo, peso=:peso WHERE idprod=:idprod LIMIT 1";
        $statement = $connect->prepare($query);

        $data = [
            ':codpro' => $codpro,
            ':nomprd' => $nomprd,
            ':desprd' => $desprd,
            ':precio' => $precio,
            ':idmar' => $idmar,
            ':idcate' => $idcate,
            ':modelo' => $modelo,
            ':peso' => $peso,
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



