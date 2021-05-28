<?php include('../templates/header.html');   ?>

<body>

<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

	$tipo = $_POST["tipo_elegido"];
	$nombre = $_POST["nombre_pokemon"];

 	$query = "SELECT direcciones.nombre_dirección FROM unidades, direcciones WHERE unidades.dirección = direcciones.id;";
	$result = $db -> prepare($query);
	$result -> execute();
	$pokemones = $result -> fetchAll();
  ?>

	<table>
    <tr>
      <th>direcciones</th>
    </tr>
  <?php
	foreach ($pokemones as $pokemon) {
  		echo "<tr> <td>$pokemon[0] </tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>
