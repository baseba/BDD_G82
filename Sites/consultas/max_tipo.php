<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $tipo = $_POST["tipo"];

  $query = "SELECT unidades.id, direcciones.nombre_dirección, personal.nombre,  COUNT(vehiculos.id) AS cantidad from vehiculos, unidades, personal
  WHERE vehiculos.unidad = unidades.id
  AND unidades.dirección = direcciones.id
  AND personal.id = unidades.jefe
  AND vehiculos.tipo = '$tipo'  
  GROUP BY unidades.id
  ORDER BY cantidad DESC
  LIMIT 1
  ;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>ID unidad</th>
      <th>dirección</th>
      <th>jefe</th>
      <th>cantidad de vehiculos del tipo seleccionado</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td></tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
