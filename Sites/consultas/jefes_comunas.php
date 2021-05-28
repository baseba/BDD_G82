<?php include('../templates/header.html');   ?>

<body>
<?php
  #Llama a conexión, crea el objeto PDO y obtiene la variable $db
  require("../config/conexion.php");

  #Se obtiene el valor del input del usuario
  $comuna1 = $_POST["comuna1"];
  $comuna2 = $_POST["comuna2"];

  #Se construye la consulta como un string
 	$query = "SELECT personal.id , personal.nombre, rut, sexo, edad, clasificacion FROM personal, unidades, cobertura
     WHERE personal.id = unidades.jefe
     AND  unidades.id = cobertura.id_unidad
     AND cobertura.comuna LIKE LOWER('%$comuna1%')
     INTERSECT
     SELECT personal FROM personal, unidades, cobertura
     WHERE personal.id = unidades.jefe
     AND  unidades.id = cobertura.id_unidad
     AND cobertura.comuna LIKE LOWER('%$comuna2%')
     ;";

  #Se prepara y ejecuta la consulta. Se obtienen TODOS los resultados
	$result = $db -> prepare($query);
	$result -> execute();
	$jefes = $result -> fetchAll();
  ?>

<table>
    <tr>
      <th>id jefe</th>
    
      <th>nombre</th>
    
      <th>rut</th>
    
      <th>sexo</th>
      <th>edad</th>
      <th>clasificacion</th>
    </tr>
  <?php
	foreach ($jefes as $j) {
  		echo "<tr><td>$j[0]</td><td>$j[1]</td><td>$j[2]</td><td>$j[3]</td><td>$j[4]</td><td>$j[5]</td></tr>";
	}
  ?>
	</table>

<?php include('../templates/footer.html'); ?>