<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna_elegida = $_POST["comuna_elegida"];

 	$query = "SELECT vehiculos FROM unidades, vehiculos, direcciones WHERE unidades.id = direcciones.id AND vehiculos.unidad = unidades.id AND direcciones.comuna = lower('%$comuna_elegida%')  ;";
	$result = $db -> prepare($query);
	$result -> execute();
	$vehiculos = $result -> fetchAll();
  ?>
  <?php 
  echo $comuna_elegida
  ?>
	<table>
    <tr>
      <th>Vehiculo</th>
    </tr>
  <?php
	foreach ($vehiculos as $vehiculo) {
  		echo "<tr><td>$vehiculo[0]</td></tr>hola";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
