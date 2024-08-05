<?php
// buscar_cliente.php

// Conectar a la base de datos
require_once '../../backend/config/Conexion.php';

// Obtener el nombre del cliente desde la solicitud POST
if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];

    // Consulta SQL para buscar clientes por nombre
    $query = "SELECT idcli, nocl FROM clientes WHERE nocl LIKE :nombre";
    $statement = $connect->prepare($query);
    $statement->bindValue(':nombre', '%' . $nombre . '%', PDO::PARAM_STR);
    $statement->execute();

    // Construir opciones de selección basadas en los resultados de la consulta
    $options = '';
    while ($cliente = $statement->fetch(PDO::FETCH_ASSOC)) {
        $options .= "<option value='{$cliente['idcli']}'>{$cliente['nocl']}</option>";
    }

    // Imprimir las opciones como respuesta
    echo $options;
}
?>
