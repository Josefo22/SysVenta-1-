<?php
ob_start();
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../login.php');
    exit(); // Ensure execution stops after redirect
}
?>

<?php if (isset($_SESSION['id'])) { ?>
<!DOCTYPE html>
<html lang="en">
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
    <style type="text/css">
        .load_animation {
            width: 100%;
            height: 100vh;
            font-size: 4rem;
            background-color: #fff;
            z-index: 500;
            position: fixed;
            top: 0;
            left: 0;
            overflow: hidden;
        }

        .animation {
            position: absolute;
            top: 50%;
            left: 50%;
            border: 3px solid rgb(0, 0, 0);
            border-radius: 50%;
            box-sizing: content-box;
            padding: 10px;
            transform: translate(-50%, -50%);
            opacity: .5;
            animation: spinner 1s infinite;
            transition: .1s;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes spinner {
            50% {
                transform: translate(-50%, -50%);
                border: 2px solid rgba(0, 0, 0, 0.178);
                padding: 30px;
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) rotate(360deg);
                border: 3px solid rgba(0, 0, 0, 0);
                padding: 17rem;
                color: #233975;
            }
        }
    </style>
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
                    <li>
                        <a href="../administrador/escritorio.php" class="active">
                            <span class="las la-home"></span>
                            <small>Principal</small>
                        </a>
                    </li>
                    <li>
                        <a href="../productos/mostrar.php">
                            <span class="las la-shopping-cart"></span>
                            <small>Inventario</small>
                        </a>
                    </li>
                    <li>
                        <a href="../accesos/mostrar.php">
                            <span class="las la-user-friends"></span>
                            <small>Accesos</small>
                        </a>
                    </li>
                    <li>
                        <a href="../clientes/mostrar.php">
                            <span class="las la-user-friends"></span>
                            <small>Propietarios</small>
                        </a>
                    </li>
                    <li>
                        <a href="../Pagos/Administracion.php">
                            <span class="las la-balance-scale"></span>
                            <small>Pagos Administracion</small>
                        </a>
                    </li>
                    
                    <li>
                        <a href="../proveedores/mostrar.php">
                            <span class="las la-user-friends"></span>
                            <small>Proveedores</small>
                        </a>
                    </li>
                    <li>
                        <a href="../ventas/venta.php">
                            <span class="las la-money-bill"></span>
                            <small>Ventas</small>
                        </a>
                    </li>
                    <li>
                        <a href="../compra/mostrar.php">
                            <span class="las la-store"></span>
                            <small>Compras</small>
                        </a>
                    </li>
                    <li>
                        <a href="../Faltas/Faltas.php">
                            <span class="las la-exclamation"></span>
                            <small>Faltas</small>
                        </a>
                    </li>
                    <li>
                        <a href="../salir.php">
                            <span class="las la-power-off"></span>
                            <small>Salir</small>
                        </a>
                    </li>
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
                <small>Home / Productos</small>
            </div>
            
            <div class="page-content">
                <div class="records table-responsive">
                    <div class="record-header">
                        <div class="add">
                            <button style="cursor: pointer;" onclick="location.href='nuevo.php'">Nuevo</button>
                        </div>
                    </div>

                    <div>
                        <?php 
                        require '../../backend/config/Conexion.php';
                        $sentencia = $connect->prepare("SELECT productos.idprod, productos.codpro, productos.nomprd, productos.desprd, productos.precio, productos.stock, productos.state, productos.fere FROM productos ORDER BY idprod DESC;");
                        $sentencia->execute();
                        $data = $sentencia->fetchAll(PDO::FETCH_OBJ);
                        ?>

                        <?php if(count($data) > 0): ?>
                        <table width="100%" id="example">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Producto</th>
                                    <th>Precio</th>
                                    <th>Stock</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($data as $d): ?>
                                <tr>
                                    <td><?php echo $d->codpro ?></td>
                                    <td>
                                        <div class="client">
                                            <div class="client-info">
                                                <h4><?php echo $d->nomprd ?></h4>
                                            </div>
                                        </div>
                                    </td>
                                    <td><h4>COP/<?php echo number_format($d->precio) ?></h4></td>
                                    <td>
                                        <?php if ($d->stock < 11): ?>
                                            <span class="badge">Se está agotando</span>
                                        <?php else: ?>
                                            <h4><?php echo $d->stock ?></h4>
                                        <?php endif; ?>
                                    </td>
                                    <td data-title="Estado">
                                        <label class="switch">
                                            <input type="checkbox" id="<?=$d->idprod?>" value="<?=$d->state ?>" <?=$d->state == '1' ? 'checked' : '' ;?>/> 
                                            <span class="slider"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <a title="Actualizar" href="../productos/editar.php?id=<?php echo $d->idprod ?>" class="fa fa-pencil tooltip"></a>
                                        <form onsubmit="return confirm('¿Realmente desea eliminar el registro?');" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <input type="hidden" name="idprod" value="<?php echo $d->idprod; ?>">
                                            <button name="delete_product" style="cursor: pointer;" class="fa fa-trash"></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                        <div class="alert">
                            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                            <strong>Danger!</strong> No hay datos.
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </main>
    </div>div>

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
        $(document).ready(function() {
            $('#example').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
            });
        });
    </script>
    <script type="text/javascript">
        $(window).on("load",function(){
            $(".load_animation").fadeOut(1000);
        });
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <?php include_once '../../backend/php/delete_product.php' ?>
</body>
</html>

<?php } else { 
    header('Location: ../login.php');
    exit(); // Asegurarse de que la ejecución se detenga después de redirigir
} ?>
