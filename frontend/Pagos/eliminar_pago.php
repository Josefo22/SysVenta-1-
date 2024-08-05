<?php
require '../../backend/config/Conexion.php';

$id = $_GET['id'];

$stmt = $connect->prepare("DELETE FROM pagos_administracion WHERE id = ?");
if ($stmt->execute([$id])) {
    // Redirigir de nuevo a la página de la lista de pagos con un mensaje de éxito
    header('Location: Administracion.php?');
} else {
    // Redirigir de nuevo a la página de la lista de pagos con un mensaje de error
    header('Location: Administracion.php?');
}
?>
