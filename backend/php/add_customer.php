<?php 
require_once('../../backend/config/Conexion.php'); 
 if(isset($_POST['add_customer']))
 {
  //$username = $_POST['user_name'];// user name
  //$userjob = $_POST['user_job'];// user email
    $tipd=trim($_POST['tipcl']);
    $nudoc=trim($_POST['numcl']);
    $nocl=trim($_POST['nomcl']);
    $apcl=trim($_POST['apecl']);
    $telfcl=trim($_POST['telcl']);

    
  if(empty($tipd)){
   $errMSG = "Please enter number.";
  }

   
  $stmt = "SELECT * FROM clientes WHERE nudoc ='$nudoc' or telfcl='$telfcl'";
   if(empty($nudoc)) {
             echo '<script type="text/javascript">
swal("Error!", "Ya existe el registro a agregar!", "error").then(function() {
            window.location = "../clientes/nuevo.php";
        });
        </script>';


         }

         else
         {  // Validaremos primero que el document no exista
            $sql="SELECT * FROM clientes WHERE nudoc ='$nudoc' or telfcl='$telfcl'";
            

            $stmt = $connect->prepare($sql);
            $stmt->execute();

            if ($stmt->fetchColumn() == 0) // Si $row_cnt es mayor de 0 es porque existe el registro
            {
                if(!isset($errMSG))
  {
$stmt = $connect->prepare("INSERT INTO clientes(tipd,nudoc,nocl,apcl,telfcl,state) VALUES(:tipd,:nudoc,:nocl,:apcl,:telfcl,'1')");
$stmt->bindParam(':tipd',$tipd);
$stmt->bindParam(':nudoc',$nudoc);
$stmt->bindParam(':nocl',$nocl);
$stmt->bindParam(':apcl',$apcl);
$stmt->bindParam(':telfcl',$telfcl);


   if($stmt->execute())
   {
    echo '<script type="text/javascript">
swal("¡Registrado!", "Se agrego correctamente", "success").then(function() {
            window.location = "../clientes/mostrar.php";
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
            window.location = "../clientes/nuevo.php";
        });
        </script>';

 // if no error occured, continue ....

}
  

  }
 
 }
?>