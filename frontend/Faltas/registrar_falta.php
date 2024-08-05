<?php
ob_start();
session_start();

// Verificar sesión de usuario
if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('Location: ../login.php');
    exit();
}

// Verificar si se recibió el formulario de falta
if (isset($_POST['descripcion'], $_POST['valor'], $_POST['caracteristicas'])) {
    // Obtener datos del formulario
    $descripcion = trim($_POST['descripcion']);
    $valor = trim($_POST['valor']);
    $caracteristicas = trim($_POST['caracteristicas']);

    try {
        // Incluir archivo de configuración de la base de datos
        require_once '../../backend/config/Conexion.php';

        // Preparar consulta SQL para insertar la falta
        $query = "INSERT INTO faltas (descripcion, valor, caracteristicas) VALUES (:descripcion, :valor, :caracteristicas)";
        $statement = $connect->prepare($query);

        // Asociar parámetros
        $statement->bindParam(':descripcion', $descripcion);
        $statement->bindParam(':valor', $valor);
        $statement->bindParam(':caracteristicas', $caracteristicas);

        // Ejecutar consulta
        $query_execute = $statement->execute();

        if ($query_execute) {
            // Redirigir a la página de faltas con un mensaje de éxito
            echo '<script type="text/javascript">
                    alert("Falta registrada correctamente.");
                    window.location = "Faltas.php";
                </script>';
            exit(); // Detener ejecución después de redirigir
        } else {
            // Error al registrar la falta
            echo '<script type="text/javascript">
                    alert("Error: No se pudo registrar la falta. Comuníquese con el administrador.");
                    window.location = "Faltas.php";
                </script>';
            exit(); // Detener ejecución después de redirigir
        }

    } catch (PDOException $e) {
        // Error de base de datos
        echo '<script type="text/javascript">
                alert("Error de base de datos: ' . $e->getMessage() . '");
                window.location = "Faltas.php";
            </script>';
        exit(); // Detener ejecución después de redirigir
    }
} else {
    // Si se intenta acceder directamente a este script sin procesar el formulario
    header('Location: Faltas.php');
    exit(); // Detener ejecución si no se procesó el formulario
}
?>
