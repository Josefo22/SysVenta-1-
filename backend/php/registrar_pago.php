<?php
session_start();
ob_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Verificar que los datos necesarios fueron recibidos
    if (isset($_POST['cliente_id'], $_POST['fecha_pago'], $_POST['monto'])) {
        $cliente_id = $_POST['cliente_id'];
        $fecha_pago = $_POST['fecha_pago'];
        $monto = $_POST['monto'];

        // Validar datos (puedes implementar validaciones adicionales según tus necesidades)

        // Conectar a la base de datos
        require_once '../../backend/config/Conexion.php'; // Ajusta la ruta según tu estructura

        try {
            // Preparar consulta SQL para insertar el pago administrativo
            $sql = "INSERT INTO pagos_administracion (cliente_id, fecha_pago, monto, estado)
                    VALUES (:cliente_id, :fecha_pago, :monto, 'pendiente')";
            $stmt = $connect->prepare($sql);
            $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
            $stmt->bindParam(':fecha_pago', $fecha_pago);
            $stmt->bindParam(':monto', $monto, PDO::PARAM_STR);
            $stmt->execute();

            // Redireccionar a la página de pagos administrativos después de registrar el pago
            header('Location: ../../frontend/Pagos/Administracion.php');
            exit();
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    } else {
        // Datos incompletos, manejar el error adecuadamente
        echo "Error: Datos incompletos.";
    }
} else {
    // Acceso incorrecto al archivo, redireccionar a página de inicio de sesión
    header('Location: ../login.php');
    exit();
}
?>
