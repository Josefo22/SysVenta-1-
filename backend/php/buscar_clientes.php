<?php
require_once '../../backend/config/Conexion.php';

if (isset($_GET['term'])) {
    $term = $_GET['term'];
    $sql = "SELECT idcli, CONCAT(nocl, ' ', apcl) AS nombre_completo FROM clientes WHERE CONCAT(nocl, ' ', apcl) LIKE :term";
    $stmt = $connect->prepare($sql);
    $stmt->execute(['term' => "%$term%"]);
    $clientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $result = [];
    foreach ($clientes as $cliente) {
        $result[] = [
            'id' => $cliente['idcli'],
            'label' => $cliente['nombre_completo'],
            'value' => $cliente['nombre_completo']
        ];
    }
    echo json_encode($result);
}
?>
