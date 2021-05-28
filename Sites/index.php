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

  <h3 align="center"> despachos en couna por año</h3>

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

  <h3 align="center">¿Quieres buscar todos los pokemones por tipo?</h3>

  <?php
  #Primero obtenemos todos los tipos de pokemones
  require("config/conexion.php");
  $result = $db -> prepare("SELECT DISTINCT tipo FROM pokemones;");
  $result -> execute();
  $dataCollected = $result -> fetchAll();
  ?>

  <form align="center" action="consultas/consulta_tipo.php" method="post">
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
    <input type="submit" value="Buscar por tipo">
  </form>

  <br>
  <br>
  <br>
  <br>
</body>
</html>
