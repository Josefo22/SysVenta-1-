<?php
require '../../backend/config/Conexion.php';

$term = trim(strip_tags($_GET['term']));

$consulta = $connect->prepare("SELECT idcli, CONCAT(nocl, ' ', apcl) AS nombre_completo FROM clientes WHERE nocl LIKE :term OR apcl LIKE :term LIMIT 10");
$consulta->execute(['term' => '%' . $term . '%']);

$clientes = $consulta->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($clientes);
?>
