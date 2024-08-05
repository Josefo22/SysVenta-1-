<?php
ob_start();
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../login.php');
    exit();
}

if (isset($_SESSION['id'])) {
    require_once '../../backend/config/Conexion.php';

    // Obtener faltas asignadas con detalles del cliente y la falta
    $sqlFaltasAsignadas = "SELECT fa.id, fa.fecha_falta, 
                                  c.nocl AS nombre_cliente, c.apcl AS apellido_cliente, 
                                  f.descripcion AS falta_descripcion
                           FROM faltas_asignadas AS fa
                           INNER JOIN clientes AS c ON fa.cliente_id = c.idcli
                           INNER JOIN faltas AS f ON fa.falta_id = f.id
                           ORDER BY fa.fecha_falta DESC";
    $stmtFaltasAsignadas = $connect->prepare($sqlFaltasAsignadas);
    $stmtFaltasAsignadas->execute();
    $faltasAsignadas = $stmtFaltasAsignadas->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Sistema Administrativo</title>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" href="../../backend/img/ca.png">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <!-- Data Tables -->
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
                    <li><a href="../administrador/escritorio.php"><span class="las la-home"></span><small>Principal</small></a></li>
                    <li><a href="../productos/mostrar.php"><span class="las la-shopping-cart"></span><small>Inventario</small></a></li>
                    <li><a href="../accesos/mostrar.php"><span class="las la-user-friends"></span><small>Accesos</small></a></li>
                    <li><a href="../clientes/mostrar.php"><span class="las la-user-friends"></span><small>Propietarios</small></a></li>
                    <li><a href="../Pagos/Administracion.php"><span class="las la-balance-scale"></span><small>Pagos Administración</small></a></li>
                    <li><a href="../proveedores/mostrar.php"><span class="las la-user-friends"></span><small>Proveedores</small></a></li>
                    <li><a href="../ventas/venta.php"><span class="las la-money-bill"></span><small>Ventas</small></a></li>
                    <li><a href="../compra/mostrar.php"><span class="las la-store"></span><small>Compras</small></a></li>
                    <li><a href="../Faltas/Faltas.php" class="active"><span class="las la-exclamation"></span><small>Faltas</small></a></li>
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
                <h1>Listado de Faltas Asignadas</h1>
                <small>Home / Faltas / Mostrar Faltas Asignadas</small>
            </div>

            <div class="page-content">
                <div class="records table-responsive">
                    <?php if (isset($_GET['mensaje'])): ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong><?php echo $_GET['mensaje']; ?></strong>
                    </div>
                    <?php endif; ?>
                    <?php if(count($faltasAsignadas) > 0): ?>
                    <table width="100%" id="example">
                        <thead>
                            <tr>
                                <th>Nombre del Cliente</th>
                                <th>Apellido del Cliente</th>
                                <th>Descripción de la Falta</th>
                                <th>Fecha de Falta</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
    <?php foreach ($faltasAsignadas as $faltaAsignada): ?>
    <tr>
        <td><?php echo $faltaAsignada['nombre_cliente']; ?></td>
        <td><?php echo $faltaAsignada['apellido_cliente']; ?></td>
        <td><?php echo $faltaAsignada['falta_descripcion']; ?></td>
        <td><?php echo $faltaAsignada['fecha_falta']; ?></td>
        <td>
            <!-- Botón para generar factura -->
            <a href="generar_factura.php?id=<?php echo $faltaAsignada['id']; ?>" class="fa fa-file-text-o tooltip"></a>
            <!-- Botón para eliminar -->
            <a href="eliminar_falta.php?id=<?php echo $faltaAsignada['id']; ?>" class="fa fa-trash-o tooltip" onclick="return confirm('¿Estás seguro de que deseas eliminar esta falta?');"></a>
        </td>
    </tr>
    <?php endforeach; ?>
</tbody>
                        
                    </table>
                    <?php else: ?>
                    <div class="alert">
                        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                        <strong>No hay faltas asignadas.</strong>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>

    <script src="../../backend/js/jquery.min.js"></script>
    <!-- Data Tables -->
    <script type="text/javascript" src="../../backend/js/datatable.js"></script>
    <script type="text/javascript" src="../../backend/js/datatablebuttons.js"></script>
    <script type="text/javascript" src="../../backend/js/jszip.js"></script>
    <script type="text/javascript" src="../../backend/js/pdfmake.js"></script>
    <script type="text/javascript" src="../../backend/js/vfs_fonts.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonshtml5.js"></script>
    <script type="text/javascript" src="../../backend/js/buttonsprint.js"></script>
    <script type="text/javascript">
        $(window).on("load",function(){
            $(".load_animation").fadeOut(1000);
        });

        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
</body>
</html>

<?php
} else {
    header('Location: ../login.php');
    exit();
}
?>
