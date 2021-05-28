<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna_elegida = $_POST["comuna_elegida"];

 	$query = "SELECT vehiculos.id, vehiculos.patente, vehiculos.estado, vehiculos.tipo FROM unidades, vehiculos, direcciones WHERE unidades.id = direcciones.id AND vehiculos.unidad = unidades.id AND direcciones.comuna = '$comuna_elegida'  ;";
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
