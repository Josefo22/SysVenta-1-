<?php
require_once '../../backend/config/Conexion.php';

if (isset($_GET['term'])) {
    $term = $_GET['term'] . '%';

    // Consultar las faltas en la base de datos
    $sql = "SELECT id, descripcion FROM faltas WHERE descripcion LIKE ?";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$term]);

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $response = [];

    foreach ($result as $row) {
        $response[] = [
            'id' => $row['id'],
            'descripcion' => $row['descripcion']
        ];
    }

    echo json_encode($response);
}
?>
