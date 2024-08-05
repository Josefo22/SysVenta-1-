<?php
ob_start();
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../login.php');
    exit();
}

if (!isset($_SESSION['id'])) {
    header('Location: ../login.php');
    exit();
}

require_once '../../backend/config/Conexion.php';

if (isset($_GET['id'])) {
    $pago_id = $_GET['id'];

    $sql = "SELECT * FROM pagos_administracion WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':id', $pago_id, PDO::PARAM_INT);
    $stmt->execute();
    $pago = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$pago) {
        echo "Pago no encontrado.";
        exit();
    }
} else {
    echo "ID de pago no especificado.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fecha_pago = $_POST['fecha_pago'];
    $monto = $_POST['monto'];
    $estado = $_POST['estado'];

    $sql = "UPDATE pagos_administracion SET fecha_pago = :fecha_pago, monto = :monto, estado = :estado WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->bindParam(':fecha_pago', $fecha_pago);
    $stmt->bindParam(':monto', $monto);
    $stmt->bindParam(':estado', $estado);
    $stmt->bindParam(':id', $pago_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        header('Location: Administracion.php');
        exit();
    } else {
        echo "Error al actualizar el pago.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Editar Pago</title>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" href="../../backend/img/ca.png">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">
</head>
<body>
    <div class="loader-container">
        <div class="load_animation">
            <ion-icon name="bag-handle-outline" class="animation"></ion-icon>
        </div>
    </div>

    <input type="checkbox" id="menu-toggle">
    <div class="sidebar">
        <div class="side-header">
            <h3>Sistema <span>Administrativo</span></h3>
        </div>
        
        <div class="side-content">
            <div class="profile">
                <div class="profile-img bg-img" style="background-image: url(../../backend/img/user13.png)"></div>
                <h4><?php echo $_SESSION['username']; ?></h4>
                <small>Villa Manuela</small>
            </div>

            <div class="side-menu">
                <ul>
                    <!-- Menú de navegación -->
                    <li><a href="../administrador/escritorio.php" class="active"><span class="las la-home"></span><small>Principal</small></a></li>
                    <li><a href="../productos/mostrar.php"><span class="las la-shopping-cart"></span><small>Inventario</small></a></li>
                    <li><a href="../accesos/mostrar.php"><span class="las la-user-friends"></span><small>Accesos</small></a></li>
                    <li><a href="../clientes/mostrar.php"><span class="las la-user-friends"></span><small>Propietarios</small></a></li>
                    <li><a href="../Pagos/Administracion.php"><span class="las la-balance-scale"></span><small>Pagos Administración</small></a></li>
                    <li><a href="../proveedores/mostrar.php"><span class="las la-user-friends"></span><small>Proveedores</small></a></li>
                    <li><a href="../ventas/venta.php"><span class="las la-money-bill"></span><small>Ventas</small></a></li>
                    <li><a href="../compra/mostrar.php"><span class="las la-store"></span><small>Compras</small></a></li>
                    <li><a href="../Faltas/Faltas.php"><span class="las la-exclamation"></span><small>Faltas</small></a></li>
                    <li><a href="../salir.php"><span class="las la-power-off"></span><small>Salir</small></a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="main-content">
        <header>
            <div class="header-content">
                <label for="menu-toggle">
                    <span class="las la-bars"></span>
                </label>
                
                <div class="header-menu">
                    <div class="user">
                        <a href="../salir.php"> 
                            <div class="bg-img" style="background-image: url(../../backend/img/user13.png)"></div>
                        </a>
                    </div>
                </div>
            </div>
        </header>
        
        <main>
            <div class="page-header">
                <h1>Bienvenido <?php echo '<strong>'.$_SESSION['nombre'].'</strong>'; ?></h1>
                <small>Home / Pagos Administrativos - Editar</small>
            </div>
            
            <div class="page-content">
                <div class="records table-responsive">
                    <div class="record-header">
                        <div class="add">
                            <button style="cursor: pointer;" onclick="location.href='Administracion.php'">Regresar</button>
                        </div>
                    </div>
                    
                    <div>
                        <form action="editar_pago.php?id=<?php echo $pago_id; ?>" method="POST">
                            <div>
                                <label for="fecha_pago">Fecha de Pago:</label>
                                <input type="date" id="fecha_pago" name="fecha_pago" value="<?php echo $pago['fecha_pago']; ?>" required>
                            </div>
                            <div>
                                <label for="monto">Monto:</label>
                                <input type="text" id="monto" name="monto" value="<?php echo $pago['monto']; ?>" required>
                            </div>
                            <div>
                                <label for="estado">Estado:</label>
                                <select id="estado" name="estado" required>
                                    <option value="pendiente" <?php echo ($pago['estado'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                    <option value="pagado" <?php echo ($pago['estado'] == 'pagado') ? 'selected' : ''; ?>>Pagado</option>
                                </select>
                            </div>
                            <button type="submit" class="registerbtn">Actualizar Pago</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="../../backend/js/jquery.min.js"></script>
    <script src="../../backend/js/admin.js"></script>
    <script src="https://unpkg.com/ionicons@5.4.0/dist/ionicons.js"></script>
</body>
</html>
