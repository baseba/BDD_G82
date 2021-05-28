<?php include('../templates/header.html');   ?>

<body>

  <?php
  require("../config/conexion.php"); #Llama a conexión, crea el objeto PDO y obtiene la variable $db

  $tipo = $_POST["tipo"];
  $año1 = $_POST["tipo"];
  $año2 = $_POST["tipo"];
  $query = "SELECT despachos.id, despachos.fecha, despachos.dirección_origen, despachos.dirección_destino, despachos.id_compra, despachos.vehiculo, despachos.repartidor FROM despachos, vehiculos, personal 
  WHERE despachos.repartidor = personal.id
  AND despachos.vehiculo = vehiculos.id
  AND vehiculos.tipo = '$tipo'
  AND personal.edad <= $año1
  AND personal.edad >= $año2
  ;;";
  $result = $db -> prepare($query);
  $result -> execute();
  $dataCollected = $result -> fetchAll(); #Obtiene todos los resultados de la consulta en forma de un arreglo
  ?>

  <table>
    <tr>
      <th>ID</th>
      <th>fecha</th>
      <th>dirección_origen</th>
      <th>dirección_destino</th>
      <th>id_compra</th>
      <th>vehiculo</th>
      <th>repartidor</th>
    </tr>
  <?php
  foreach ($dataCollected as $p) {
    echo "<tr> <td>$p[0]</td> <td>$p[1]</td> <td>$p[2]</td> <td>$p[3]</td> <td>$p[4]</td> <td>$p[5]</td><td>$p[6]</td> </tr>";
  }
  ?>
  </table>

<?php include('../templates/footer.html'); ?>
