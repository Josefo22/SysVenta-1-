<?php 
require_once('../../backend/config/Conexion.php'); 
 if(isset($_POST['add_supplier']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $rucprv=trim($_POST['rcprv']);
    $nomprv=trim($_POST['nomprv']);
    $corrprv=trim($_POST['corrprv']);
    
  if(empty($rucprv)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM proveedores WHERE rucprv ='$rucprv'";
   if(empty($rucprv)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../proveedores/nuevo.php";
        });
        </script>';


         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM proveedores WHERE rucprv ='$rucprv'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO proveedores(rucprv,nomprv,corrprv,state) VALUES(:rucprv,:nomprv,:corrprv,'1')");
$stmt->bindParam(':rucprv',$rucprv);
$stmt->bindParam(':nomprv',$nomprv);
$stmt->bindParam(':corrprv',$corrprv);



   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Se agrego correctamente", "success").then(function() {
            window.location = "../proveedores/mostrar.php";
        });
        </script>';
   }
   else
   {
    $errMSG = "error while inserting....";
   }

  } 
            }

                else{

                     echo '<script type="text/javascript">
swal("Error!", "Datos duplicados no se acepta,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../proveedores/nuevo.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>