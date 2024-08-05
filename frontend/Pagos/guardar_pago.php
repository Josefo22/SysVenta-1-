<?php
ob_start();
session_start();

// Verificar sesión de usuario
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('Location: ../login.php');
    exit(); // Detener ejecución si no hay sesión válida
}

// Verificar si se recibió el formulario de pago
if (isset($_POST['guardar_pago'])) {
    // Obtener datos del formulario
    $cliente_id = $_POST['cliente_id'];
    $fecha_pago = $_POST['fecha_pago'];
    $monto = $_POST['monto'];
    $estado = $_POST['estado'];
    $descripcion = $_POST['descripcion']; // Nuevo campo

    try {
        // Incluir archivo de configuración de la base de datos
        require_once '../../backend/config/Conexion.php';

        // Preparar consulta SQL para insertar el pago
        $query = "INSERT INTO pagos_administracion (cliente_id, fecha_pago, monto, estado, descripcion) VALUES (:cliente_id, :fecha_pago, :monto, :estado, :descripcion)";
        $statement = $connect->prepare($query);

        // Asociar parámetros
        $statement->bindParam(':cliente_id', $cliente_id);
        $statement->bindParam(':fecha_pago', $fecha_pago);
        $statement->bindParam(':monto', $monto);
        $statement->bindParam(':estado', $estado);
        $statement->bindParam(':descripcion', $descripcion); // Nuevo parámetro

        // Ejecutar consulta
        $query_execute = $statement->execute();

        if ($query_execute) {
            // Pago registrado exitosamente
            echo '<script type="text/javascript">
                    alert("Pago registrado correctamente.");
                    window.location = "../Pagos/Administracion.php";
                </script>';
            exit(); // Detener ejecución después de redirigir
        } else {
            // Error al registrar el pago
            echo '<script type="text/javascript">
                    alert("Error: No se pudo registrar el pago. Comuníquese con el administrador.");
                    window.location = "../Pagos/Administracion.php";
                </script>';
            exit(); // Detener ejecución después de redirigir
        }

    } catch (PDOException $e) {
        // Error de base de datos
        echo '<script type="text/javascript">
                alert("Error de base de datos: '. $e->getMessage() .'");
                window.location = "../Pagos/Administracion.php";
            </script>';
        exit(); // Detener ejecución después de redirigir
    }
} else {
    // Si se intenta acceder directamente a este script sin procesar el formulario
    header('Location: ../Pagos/Administracion.php');
    exit(); // Detener ejecución si no se procesó el formulario
}
?>
