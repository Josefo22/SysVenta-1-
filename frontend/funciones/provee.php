 <?php 
 require '../../backend/config/Conexion.php';
 echo '<option value="0">Seleccione</option>';
 $stmt = $connect->prepare('SELECT * FROM `proveedores` ORDER BY idprov  ASC');

  $stmt->execute();


  while($row=$stmt->fetch(PDO::FETCH_ASSOC))
        {
            extract($row);
            ?>
            <option value="<?php echo $idprov ; ?>"><?php echo $nomprv; ?></option>

            <?php
        }

  ?>


