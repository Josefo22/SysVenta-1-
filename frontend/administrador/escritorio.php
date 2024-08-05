<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../login.php');

  }
?>
<?php if(isset($_SESSION['id'])) { ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Sistema-Administrativo</title>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" href="../../backend/img/ca.png">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">
    <style type="text/css">


.load_animation{
  width: 100%;
  height: 100vh;
  font-size: 4rem ;
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
  transform: translate(-50% , -50%) ;
  opacity: .5;
  animation: spinner 1s infinite;
  transition: .1s;
  transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
}
@keyframes spinner {
  50% {
    transform: translate(-50% , -50%) ;
    border: 2px solid rgba(0, 0, 0, 0.178);
    padding: 30px;
  }
  100% {
    opacity: 1;
    transform:translate(-50% , -50%) rotate(360deg);
    border: 3px solid rgba(0, 0, 0, 0);
    padding: 17rem;
    color: #233975;
  }

}

.pie-chart {
            
  width: 100%;
  padding: 0 10px;
  margin: 0px;
        }
        .text-center{
            text-align: center;
        }

        /* Responsive columns */
@media screen and (max-width: 600px) {
  .pie-chart, .text-center {
    width: 100%;
    display: block;
    margin-bottom: 20px;
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
                       <a href="escritorio.php" class="active">
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
                <small>Home / Principal</small>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">

                    <div class="card">
                        <div class="card-head">
                            <?php 
                             require_once('../../backend/config/Conexion.php');
                                            $sql = "SELECT COUNT(*) total FROM clientes";
                                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                                            $total = $result->fetchColumn();

                                             ?>
                            <h2><?php echo  $total; ?></h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Propietarios</small>
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                             <?php 
                                            $sql = "SELECT SUM(total_price) total FROM orders";
                                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                                            $total = $result->fetchColumn();

                                             ?>
                            <h2>COP/<?php echo number_format($total) ?></h2>
                            <span class="las la-money-bill"></span>
                        </div>
                        <div class="card-progress">
                            <small>Ventas</small>
                           
                        </div>
                    </div>

                    <div class="card">
    <div class="card-head">
        <?php
        require_once '../../backend/config/Conexion.php'; // Asegúrate de que la conexión se realiza correctamente

        // Consulta SQL para obtener la suma total de la columna monto
        $sql = "SELECT SUM(monto) AS total_monto FROM pagos_administracion";
        $result = $connect->query($sql);

        // Obtener el resultado
        $totalMonto = $result->fetchColumn();

        // Mostrar el total de monto
        ?>
        <h2>COP/<?php echo number_format($totalMonto); ?></h2>
        <span class="las la-balance-scale"></span>
    </div>
    <div class="card-progress">
        <small>Pagos Administracion</small>
    </div>
</div>
                    

                    <div class="card">
                        <div class="card-head">
                            <?php 
                             
                                            $sql = "SELECT COUNT(*) total FROM productos";
                                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                                            $total = $result->fetchColumn();

                                             ?>
                            <h2><?php echo  $total; ?></h2>
                            <span class="las la-shopping-cart"></span>
                        </div>
                        <div class="card-progress">
                            <small>Inventario</small>
                          
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                            <?php 
                             
                                            $sql = "SELECT COUNT(*) total FROM usuarios";
                                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                                            $total = $result->fetchColumn();

                                             ?>
                            <h2><?php echo  $total; ?></h2>
                            <span class="las la-user-friends"></span>
                        </div>
                        <div class="card-progress">
                            <small>Accesos</small>
                            
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-head">
                             <?php 
                                            $sql = "SELECT SUM(total_price) total FROM orders_purchase";
                                            $result = $connect->query($sql); //$pdo sería el objeto conexión
                                            $total = $result->fetchColumn();

                                             ?>
                            <h2>COP/<?php echo number_format($total) ?></h2>
                            <span class="las la-store"></span>
                        </div>
                        <div class="card-progress">
                            <small>Compras</small>
                           
                        </div>
                    </div>
                    <div class="card">
    <div class="card-head">
        <?php
        require_once '../../backend/config/Conexion.php'; // Incluye la conexión a la base de datos

        // Consulta para contar la cantidad de faltas asignadas
        $sqlCount = "SELECT COUNT(*) AS total_faltas_asignadas FROM faltas_asignadas";
        $resultCount = $connect->query($sqlCount);
        $totalFaltasAsignadas = $resultCount->fetchColumn();

        // Consulta para sumar la cantidad de todos los valores de faltas (asumiendo que faltas.valor es la columna a sumar)
        $sqlSum = "SELECT SUM(f.valor) AS total_valor_faltas FROM faltas_asignadas AS fa
                   INNER JOIN faltas AS f ON fa.falta_id = f.id";
        $resultSum = $connect->query($sqlSum);
        $totalValorFaltas = $resultSum->fetchColumn();
        
        // Mostrar el total de faltas asignadas y la suma total de los valores
        ?>
        <h2><?php echo $totalFaltasAsignadas; ?></h2>
        <span class="las la-exclamation"></span>
    </div>
    <div class="card-progress">
        <small>Total Faltas Asignadas: <?php echo number_format($totalValorFaltas); ?></small>
    </div>
</div>


                </div>


                
                <div class="records table-responsive">
    <div class="record-header">
        <h1>Ultimos Pagos de Administracion</h1>
    </div>
    <div>
        <?php 
        // Consultar la última transacción de pago
        $sql = "SELECT p.cliente_id, p.fecha_pago, p.monto, c.nocl AS nombre_cliente, c.apcl AS apellido_cliente, c.telfcl AS torre, c.aptclien AS apartamento
                FROM pagos_administracion p
                INNER JOIN clientes c ON p.cliente_id = c.idcli
                WHERE p.estado = 'pagado'
                ORDER BY p.fecha_pago DESC
                LIMIT 1";
        
        $stmt = $connect->prepare($sql);
        $stmt->execute();
        $lastPayment = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>
        <?php if($lastPayment): ?>
            <table width="100%" id="example">
                <thead>
                    <tr>
                        <th>#</th>
                        <th><span class="las la-sort"></span> PROPIETARIO</th>
                        <th><span class="las la-sort"></span> TORRE</th>
                        <th><span class="las la-sort"></span> APARTAMENTO</th>
                        <th><span class="las la-sort"></span> MONTO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo htmlspecialchars($lastPayment['cliente_id']); ?></td>
                        <td>
                            <div class="client">
                                <div class="client-img bg-img" style="background-image: url('../../backend/img/user13.png')"></div>
                                <div class="client-info">
                                    <h4><?php echo htmlspecialchars($lastPayment['nombre_cliente'] . ' ' . $lastPayment['apellido_cliente']); ?></h4>
                                </div>
                            </div>
                        </td>
                        <td><?php echo htmlspecialchars($lastPayment['torre']); ?></td>
                        <td><?php echo htmlspecialchars($lastPayment['apartamento']); ?></td>
                        <td><?php echo number_format($lastPayment['monto'], 2, ',', '.'); ?></td>
                    </tr>
                </tbody>
            </table>
        <?php else: ?>
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
                <strong>Danger!</strong> No hay datos de pagos.
            </div>
        <?php endif; ?>
    </div>
</div>

                <br>
              
                
            </div>

            <div class="page-content">
            
            <div class="records table-responsive">
                    <div class="record-header">
                        <h1>Gráficas</h1>
                    </div>
                    <div>
    

                <hr>
        <div id="chartDiv" class="pie-chart"></div>  
        <div class="text-center"></div>       
                    </div>

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
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
    </script>
    <script type="text/javascript">
        $(window).on("load",function(){
            $(".load_animation").fadeOut(1000);
        });
    </script>

     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
 
 <script src="https://www.google.com/jsapi"></script>


 <script type="text/javascript">
    window.onload = function() {
        google.load("visualization", "1.1", {
            packages: ["corechart"],
            callback: 'drawChart'
        });
    };
  
    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Country', 'Popularity'],
            
            <?php

        $stmt = $connect->prepare("SELECT productos.idprod,productos.codpro ,productos.nomprd, productos.desprd, productos.foto, productos.precio, productos.stock, marca.idmar, marca.nomarc, categoria.idcate, categoria.nocate,productos.modelo, productos.peso, productos.state, productos.fere FROM productos INNER JOIN marca ON productos.idmar = marca.idmar INNER JOIN categoria ON productos.idcate = categoria.idcate");
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        while($row = $stmt->fetch()) { 
            echo "['".$row['nomprd']."', ".$row['stock']."],";
        }

            ?>

            
        ]);

        var options = {
            pieHole: 0.4,
            title: 'Productos por stock',
        };
  
        var chart = new google.visualization.PieChart(document.getElementById('chartDiv'));
        chart.draw(data, options);
    }

</script>


</body>
</html>

<?php }else{ 
    header('Location: ../login.php');
 } ?>