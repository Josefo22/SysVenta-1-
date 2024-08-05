<?php 
require_once('../../backend/config/Conexion.php'); 
 if(isset($_POST['add_category']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $nocate=trim($_POST['catnom']);

    
   
    
  if(empty($nocate)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM categoria WHERE nocate ='$nocate'";
   if(empty($nocate)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../categorias/nuevo.php";
        });
        </script>';


         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM categoria WHERE nocate ='$nocate'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO categoria(nocate,state) VALUES(:nocate,'1')");
$stmt->bindParam(':nocate',$nocate);


   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Se agrego correctamente", "success").then(function() {
            window.location = "../categorias/mostrar.php";
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
swal("Error!", "No se pueden agregar datos,  comuníquese con el administrador ", "error").then(function() {
            window.location = "../categorias/nuevo.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>