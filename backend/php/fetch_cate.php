<?php
	include_once('../config/Conexion.php');

	$database = new Connection();
	$db = $database->open();

	try{	
	    $sql = 'SELECT * FROM categoria';
	    foreach ($db->query($sql) as $row) {
	    	?>
	    	<tr>
	    		<td><?php echo $row['idcate']; ?></td>
	    		<td><?php echo $row['nocate']; ?></td>
	    		<td><?php echo $row['state']; ?></td>
	    	
	    		<td>
	    			<button class="btn btn-success btn-sm edit" data-id="<?php echo $row['idcate']; ?>"><span class="glyphicon glyphicon-edit"></span> Editar</button>
	    			<button class="btn btn-danger btn-sm delete" data-id="<?php echo $row['idcate']; ?>"><span class="glyphicon glyphicon-trash"></span> Eliminar</button>
	    		</td>
	    	</tr>
	    	<?php 
	    }
	}
	catch(PDOException $e){
		echo "There is some problem in connection: " . $e->getMessage();
	}

	//cerrar conexión
	$database->close();
	
?>