<?php
ob_start();
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 1) {
    header('location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Sistema Administrativo</title>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" href="../../backend/img/ca.png">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
                <small>Home / Pagos Administrativos / Registrar Pago</small>
            </div>
            <div class="page-content">
            <form action="guardar_pago.php" method="POST" autocomplete="off">
    <div class="containerss">
        <h1>Registrar Pago</h1>
        <div class="alert-danger">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <strong>Importante!</strong> Es importante rellenar los campos con <span class="badge-warning">*</span>
        </div>
        <hr>
        <br>
        <label for="cliente_nombre"><b>Propietario</b></label><span class="badge-warning">*</span>
        <input type="text" id="cliente_nombre" name="cliente_nombre" required>
        <input type="hidden" id="cliente_id" name="cliente_id" required>

        <label for="fecha_pago"><b>Fecha de Pago</b></label><span class="badge-warning">*</span>
        <input type="date" name="fecha_pago" required>

        <label for="monto"><b>Monto</b></label><span class="badge-warning">*</span>
        <input type="text" name="monto" required>

        <label for="estado"><b>Estado</b></label><span class="badge-warning">*</span>
        <select name="estado" required>
            <option value="pendiente">Pendiente</option>
            <option value="pagado">Pagado</option>
        </select>

        <!-- Campo de descripción añadido -->
        <label for="descripcion"><b>Descripción</b></label>
        <textarea name="descripcion" rows="4" cols="50" placeholder="Descripción del pago..."></textarea>
        
        <hr>
        <button type="submit" name="guardar_pago" class="registerbtn">Registrar</button>
    </div>
</form>
<button onclick="window.location.href='Administracion.php'" class="registerbtn">Volver a Pago Administracion</button>

            </div>
        </main>
    </div>
    <script>
        $(function() {
            $("#cliente_nombre").autocomplete({
                source: "../../backend/php/buscar_cliente.php",
                minLength: 2,
                select: function(event, ui) {
                    $("#cliente_nombre").val(ui.item.nombre_completo);
                    $("#cliente_id").val(ui.item.idcli);
                    return false;
                }
            })
            .autocomplete("instance")._renderItem = function(ul, item) {
                return $("<li>")
                    .append("<div>" + item.nombre_completo + "</div>")
                    .appendTo(ul);
            };
        });
    </script>
</body>
</html>
