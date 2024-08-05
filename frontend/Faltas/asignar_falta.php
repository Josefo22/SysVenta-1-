<?php
session_start();

if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../login.php');
    exit();
}

if(isset($_SESSION['id'])) {
    require_once '../../backend/config/Conexion.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cliente_id = $_POST['cliente_id'];
        $falta_id = $_POST['falta_id'];
        $fecha_falta = $_POST['fecha_falta'];

        $sql = "INSERT INTO faltas_asignadas (cliente_id, falta_id, fecha_falta) VALUES (?, ?, ?)";
        $stmt = $connect->prepare($sql);

        if ($stmt->execute([$cliente_id, $falta_id, $fecha_falta])) {
            header('Location: mostrar_faltas_asignadas.php?mensaje=Falta asignada exitosamente');
        } else {
            header('Location: mostrar_faltas_asignadas.php?mensaje=Error al asignar la falta');
        }
        exit();
    }
}
?>
