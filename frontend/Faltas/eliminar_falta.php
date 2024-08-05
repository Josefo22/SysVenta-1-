<?php
require '../../backend/config/Conexion.php';

$id = $_GET['id'];

$stmt = $connect->prepare("DELETE FROM faltas_asignadas WHERE id = ?");
if ($stmt->execute([$id])) {
    // Redirigir de nuevo a la página de la lista de faltas con un mensaje de éxito
    header('Location: Faltas.php?mensaje=Falta eliminada correctamente');
} else {
    // Redirigir de nuevo a la página de la lista de faltas con un mensaje de error
    header('Location: Faltas.php?mensaje=Error al eliminar la falta');
}
?>
