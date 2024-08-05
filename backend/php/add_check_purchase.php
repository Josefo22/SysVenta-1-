<?php
    

    if(isset($_POST['order'])){

        $user_id=$_POST['pdrus'];
        $idprov=$_POST['cxtprov'];
        $method=$_POST['cxtcre'];
        $placed_on = date('d-M-Y');
        $tipc = $_POST['cxcom'];

        $cart_total = 0;
        $cart_products[] = '';

        $cart_query = $connect->prepare("SELECT cart_purchase.idcpr, cart_purchase.user_id, productos.precio,productos.stock,productos.idprod, productos.codpro, productos.nomprd, cart_purchase.name, cart_purchase.price, cart_purchase.quantity FROM cart_purchase INNER JOIN productos ON cart_purchase.idprod = productos.idprod WHERE  user_id = ?");
        $cart_query->execute([$user_id]);


        if($cart_query->rowCount() > 0){
      while($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)){
         $cart_products[] = $cart_item['name'].' ( '.$cart_item['quantity'].' )';
         $sub_total = ($cart_item['precio'] * $cart_item['quantity']);
         $cart_total += $sub_total;
      };
   };


   $total_products = implode(', ', $cart_products);

   $order_query = $connect->prepare("SELECT * FROM `orders_purchase` WHERE method = ?  AND total_products = ? AND total_price = ? AND tipc = ?");
   $order_query->execute([$method, $total_products, $cart_total, $tipc]);


   if($cart_total == 0){
      $message[] = 'your cart is empty';
   }elseif($order_query->rowCount() > 0){
      $message[] = 'order placed already!';
   }else{

      $insert_order = $connect->prepare("INSERT INTO `orders_purchase`(user_id, idprov, method, total_products, total_price, placed_on,payment_status, tipc) VALUES(?,?,?,?,?,?, 'Aceptado', ?)");
      $insert_order->execute([$user_id, $idprov, $method,$total_products, $cart_total, $placed_on, $tipc]);


     

      
      $delete_cart = $connect->prepare("DELETE FROM `cart_purchase` WHERE user_id = ?");
      $delete_cart->execute([$user_id]);

      //$message[] = 'order placed successfully!';
      echo '<script type="text/javascript">
swal("¡Registrado!", "Agregado correctamente", "success").then(function() {
            window.location = "mostrar.php";
        });
        </script>';
   }


    }

?>