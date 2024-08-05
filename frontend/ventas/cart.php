<?php
    ob_start();
     session_start();
    
    if(!isset($_SESSION['rol']) || $_SESSION['rol'] != 1){
    header('location: ../login.php');

  }
?>
<?php if(isset($_SESSION['id'])) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Computer Advance</title>
    <link rel="stylesheet" href="../../backend/css/admin.css">
    <link rel="icon" type="image/png" href="../../backend/img/ca.png">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
     <!-- Data Tables -->
    <link rel="stylesheet" type="text/css" href="../../backend/css/datatable.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/buttonsdataTables.css">
    <link rel="stylesheet" type="text/css" href="../../backend/css/font.css">
    <style type="text/css">
 .loader-container{
   
}

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
                        <div class="bg-img" style="background-image: url(../../backend/img/user13.png)"></div>

                    </div>
                </div>
            </div>
        </header>
        
        <main>
            
            <div class="page-header">
                <h1>Bienvenido <?php echo '<strong>'.$_SESSION['nombre'].'</strong>'; ?></h1>
                <small>Home / Ventas / Carrito de compras </small>
            </div>
            
            <div class="page-content">
            
            <div class="records table-responsive">
                     
                    <div>
                    

    <table width="100%" id="example">
        <thead>
            <tr>
            
            <th><span class="las la-sort"></span>Código</th>
            <th><span class="las la-sort"></span>Producto</th>
            <th><span class="las la-sort"></span>Precio</th>
            <th><span class="las la-sort"></span>Stock</th>
            <th><span class="las la-sort"></span>Cantidad</th>
            <th><span class="las la-sort"></span>Subtotal</th>
            <th><span class="las la-sort"></span></th>
        </tr>
        </thead>
        <tbody>
        <?php 
require '../../backend/config/Conexion.php';
$grand_total = 0;
$select_cart = $connect->prepare("SELECT cart.idv, usuarios.id, usuarios.nombre, productos.precio,productos.stock,productos.foto,productos.idprod, productos.codpro, productos.nomprd, cart.name, cart.price, cart.quantity FROM cart INNER JOIN usuarios ON cart.user_id = usuarios.id INNER JOIN productos ON cart.idprod = productos.idprod;");
 $select_cart->execute();
 if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){ 
     ?>
     <tr>
   
         <td><h4><?= $fetch_cart['codpro']; ?></h4></td>
         <td><h4><?= $fetch_cart['nomprd']; ?></h4></td>
         <td><h4>S/<?php echo number_format($fetch_cart['precio'],2) ?></h4></td>
         <td><h4><?= $fetch_cart['stock']; ?></h4></td>
        <td>
    <form action="" method="POST">
        <div class="form-group">
            <input type="hidden" name="prdt" value="<?= $fetch_cart['idv']; ?>">
                <input type="number" name="p_qty" value="<?= $fetch_cart['quantity']; ?>" style="width:100px;" min="1" max="99" class="form-control" placeholder="Cantidad">
        </div>
    <button type="submit" name="update_qty" class="btn btn-primary" style="cursor: pointer;"> <i class="fa fa-refresh"></i></button>
    </form>    
        </td>
        <td><h4>S/<?= number_format($sub_total = ($fetch_cart['precio'] * $fetch_cart['quantity']),2); ?></h4></td>
    <td style="width:260px;">
    <a title="Eliminar" onclick="return confirm('Eliminar del carrito?');" href="../ventas/eliminar.php?id=<?= $fetch_cart['idv']; ?>" class="fa fa-trash"></a>                            
    </td>
     </tr>
     <?php
      $grand_total += $sub_total;
      }
   }else{
      echo '<p class="alert alert-warning">Tu carrito esta vació</p>';
   }
   ?>
        </tbody>
    </table>
     <h1 style="font-size:42px; color:#000000;">Precio Total: S/<?php echo number_format($grand_total, 2); ?>
                    </div>


                    <div>
                        <button  onclick="location.href='nuevo.php'" class="registerbtn">CONTINUAR COMPRANDO </button>
                       
                        <button class="pabtn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="location.href='checkout.php'">PRECEDER PAGO</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <?php include_once '../../backend/php/upd_cart.php' ?>
</body>
</html>

<?php }else{ 
    header('Location: ../login.php');
 } ?>