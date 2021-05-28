<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $año = strval($_POST["año"]);
  $comuna = $_POST["comuna"];

  #Se construye la consulta como un string
 	$query = "SELECT vehiculos.id, vehiculos.patente, vehiculos.estado, vehiculos.tipo FROM direcciones, despachos, vehiculos WHERE despachos.dirección_destino = direcciones.id AND despachos.vehiculo = vehiculos.id AND direcciones.comuna LIKE LOWER('%$comuna%')  AND despachos.fecha::text LIKE '$año-%' ; ";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$vehiculos = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>id vehiculo</th>
    
      <th>patente</th>
    
      <th>estado</th>
    
      <th>tipo</th>
    </tr>
  <?php
	foreach ($vehiculos as $vehiculo) {
  		echo "<tr><td>$vehiculo[0]</td><td>$vehiculo[1]</td><td>$vehiculo[2]</td><td>$vehiculo[3]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
