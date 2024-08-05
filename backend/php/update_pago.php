<?php
require '../../backend/config/Conexion.php';

if (isset($_POST['upd_pago'])) {
    $id = $_POST['id'];
    $cliente_id = $_POST['cliente_id'];
    $fecha_pago = $_POST['fecha_pago'];
    $monto = $_POST['monto'];
    $estado = $_POST['estado'];

    $sentencia = $connect->prepare("UPDATE pagos_administracion SET cliente_id = ?, fecha_pago = ?, monto = ?, estado = ? WHERE id = ?");
    $result = $sentencia->execute([$cliente_id, $fecha_pago, $monto, $estado, $id]);

    if ($result) {
        echo "<script>
        swal('¡Éxito!', 'Pago actualizado correctamente.', 'success').then(function() {
            window.location.href = 'Administracion.php';
        });
        </script>";
    } else {
        echo "<script>
        swal('¡Error!', 'No se pudo actualizar el pago.', 'error');
        </script>";
    }
}
?>
