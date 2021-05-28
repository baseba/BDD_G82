<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  $comuna_elegida = $_POST["comuna_elegida"];

 	$query = "SELECT vehiculos FROM unidades, vehiculos, direcciones
   WHERE unidades.id = direcciones.id
   AND vehiculos.unidad = unidades.id
   AND lower(direcciones.comuna) LIKE %$comuna_elegida%  -- aqui se pone la comuna con lo que dice el pdf
   ;";
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Altura</th>
      <th>Peso</th>
      <th>Experiencia Base</th>
      <th>Tipo</th>
    </tr>
  <?php
	foreach ($pokemones as $pokemon) {
  		echo "<tr><td>$pokemon[0]</td><td>$pokemon[1]</td><td>$pokemon[2]</td><td>$pokemon[3]</td><td>$pokemon[4]</td><td>$pokemon[5]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
