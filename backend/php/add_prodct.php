<?php  
require_once('../../backend/config/Conexion.php');

if (isset($_POST['add_prodct'])) {
    $codpro = $_POST['prdcod'];
    $nomprd = $_POST['prdnom'];
    $desprd = $_POST['prddes'];
    $precio = $_POST['prdprec'];
    $stock = $_POST['prdstco'];

    if (empty($codpro)) {
        $errMSG = "Please enter your code.";
    } else if (empty($nomprd)) {
        $errMSG = "Please enter your name.";
    }

    if (!isset($errMSG)) {
        $stmt = $connect->prepare("INSERT INTO productos(codpro, nomprd, desprd, precio, stock, state) VALUES(:codpro, :nomprd, :desprd, :precio, :stock, '1')");
        $stmt->bindParam(':codpro', $codpro);
        $stmt->bindParam(':nomprd', $nomprd);
        $stmt->bindParam(':desprd', $desprd);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':stock', $stock);

        if ($stmt->execute()) {
            echo '<script type="text/javascript">
                swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
                    window.location = "../productos/mostrar.php";
                });
            </script>';
        } else {
            $errMSG = "Error while inserting.";
        }
    }

    if (isset($errMSG)) {
        echo '<script type="text/javascript">
            swal("Error!", "'. $errMSG .'", "error").then(function() {
                window.location = "../productos/mostrar.php";
            });
        </script>';
    }
}
?>
