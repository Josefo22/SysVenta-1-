<?php  
	if (!isset($_GET['id'])) {
		exit();
	}

	$id = $_GET['id'];
	include '../../backend/config/Conexion.php';

	$sentencia = $connect->prepare("DELETE FROM cart_purchase WHERE idcpr = ?;");
	$resultado = $sentencia->execute([$id]);

	if ($resultado === TRUE) {
		

		    header('Location: cart.php');

	}else{
		

		 echo '<script type="text/javascript">
swal("Error!", "No se pueden eliminar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "cart.php";
        });
        </script>';
	}

?>