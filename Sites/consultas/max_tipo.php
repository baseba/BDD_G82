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
  $unidad = $dataCollected[0][0];
  $cantidad = $dataCollected[0][1];
  
  $query = "SELECT unidades.id, direcciones.nombre_dirección, personal.nombre FROM unidades, personal, direcciones
  WHERE direcciones.id = unidades.dirección 
  AND personal.id = unidades.jefe
  AND unidades.id = $unidad";
  $result = $db -> prepare($query);
  $result -> execute();
  $data_unidad = $result -> fetchAll();
  
  ?>

  <table>
    <tr>
      <th>ID unidad</th>
      <th>dirección</th>
      <th>jefe</th>
      <th>cantidad de vehiculos del tipo seleccionado</th>

    </tr>
  <?php

 echo "<tr> <td>$unidad</td> <td>$data_unidad[1]</td> <td>$data_unidad[2]</td> <td>$cantidad</td> <td>$p[4]</td> <td>$p[5]</td><td>$p[6]</td> </tr>";

  ?>
  </table>

<?php include('../templates/footer.html'); ?>
