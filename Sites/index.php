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
  <?php
  #Primero obtenemos todos los años
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT EXTRACT(YEAR FROM despachos.fecha) FROM despachos;");
  $result -> execute();
  $años_despachos = $result -> fetchAll();
  ?>
  <form align="center" action="consultas/despacho_comuna_año.php" method="post">
    Año:
    <select name="año">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($años_despachos as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
    </select>
    <br><br>
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
  <?php
  #Primero obtenemos edades del personal
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT edad FROM personal ORDER BY edad;");
  $result -> execute();
  $edades = $result -> fetchAll();
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
    <select name="año1">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($edades as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
      </select>
    <br/><br/>
    Edad superior:
    <select name="año2">
      <?php
      #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
      foreach ($edades as $d) {
        echo "<option value=$d[0]>$d[0]</option>";
      }
      ?>
      </select>
    <br/><br/>
    <input type="submit" value="Buscar">
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
  Seleccionar un tipo:
  <select name="tipo">
    <?php
    #Para cada tipo agregamos el tag <option value=value_of_param> visible_value </option>
    foreach ($dataCollected as $d) {
      echo "<option value=$d[0]>$d[0]</option>";
    }
    ?>
  </select>
  <br/><br/>
  <input type="submit" value="Buscar">
</form>

<br>
<br>
  <br>
</body>
</html>
