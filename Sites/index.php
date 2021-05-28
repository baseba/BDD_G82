<?php include('templates/header.html');   ?>

<body>
  <h1 align="center">Entrega 2 </h1>
  <p style="text-align:center;">Aquí podrás encontrar información sobre nuestra empresa de despachos.</p>

  <br>

  <h3 align="center"> Ver direcciones de Unidades de despacho</h3>

  <form align="center" action="consultas/direcciones_unidades.php" method="post">
    <br/><br/>
    <input type="submit" value="Direcciones">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> Buscar vehiculos por comuna</h3>

  <form align="center" action="consultas/vehiculos_de_comuna.php" method="post">
    Comuna:
    <input type="text" name="comuna_elegida">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  
  <br>
  <br>
  <br>

  <h3 align="center"> vehiculos que despacharon en comuna por año</h3>

  <form align="center" action="consultas/despacho_comuna_año.php" method="post">
    Año:
    <input type="text" name="año">
    <br/><br/>
    comuna:
    <input type="text" name="comuna">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>

  <h3 align="center">despachos realizados por un tipo de vehiculo cuyo repartidor tiene entre el rango seleccionado</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT tipo FROM vehiculos;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_tipo_edad.php" method="post">
    Seleccinar un tipo:
    <select name="tipo">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($dataCollected as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
    Edad inferior:
    <input type="int" name="año1">
    <br/><br/>
    Edad superior:
    <input type="int" name="año2">
    <br/><br/>
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>

  <h3 align="center"> jefes de unidades que realizan despachos a dos comunas</h3>

  <form align="center" action="consultas/jefes_comunas.php" method="post">
    comuna1:
    <input type="text" name="comuna1">
    <br/><br/>
    comuna2:
    <input type="text" name="comuna2">
    <br/><br/>
    <input type="submit" value="Buscar">
  </form>
  <br>
  <br>
  <br>
  <h3 align="center">Unidad con mas vehiculos por tipo</h3>

<?php
#Primero obtenemos todos los tipos de pokemones
require("config/conexion.php");
$result = $db -> prepare("SELECT DISTINCT tipo FROM vehiculos;");
$result -> execute();
$dataCollected = $result -> fetchAll();
?>

<form align="center" action="consultas/max_tipo.php" method="post">
  Seleccinar un tipo:
  <select name="tipo">
    <?php
    #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
    foreach ($dataCollected as $d) {
      echo "<option value=$d[0]>$d[0]</option>";
    }
    ?>
  </select>
  <br/><br/>
  <input type="submit" value="Buscar por tipo">
</form>

<br>
<br>
  <br>
</body>
</html>
