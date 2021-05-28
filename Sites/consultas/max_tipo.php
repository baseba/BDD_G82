<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $tipo = $_POST["tipo"];

  $query = "SELECT unidades.id, COUNT(vehiculos.id) AS cantidad from vehiculos, unidades
  WHERE vehiculos.unidad = unidades.id
  AND vehiculos.tipo = '$tipo'
  GROUP BY unidades.id
  ORDER BY cantidad DESC
  LIMIT 1
  ;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  $unidad = $dataCollected[0][0]
  $cantidad = $dataCollected[0][1]
  
  ?>

  <table>
    <tr>
      <th>ID unidad</th>
      <th>dirección</th>
      <th>jefe</th>
      <th>cantidad de vehiculos del tipo seleccionado</th>

    </tr>
  <?php
  echo $cantidad
  echo $unidad
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td><td>$p[6]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
