<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="estilos.css" rel="stylesheet">
  <title>EmpleadosPHP</title>

</head>

<body>
  <header>
    <div class="container">      
      <h1>Movimientos a Empleados</h1>
      
    </div>
  </header>

  <div class="container">
    <div class="row justify-content-center">
      <form method="POST" action="procesos.php">
        <div class="form-group">
          <label>Nombre del Empleado</label>
          <input id="empleado_nombre" class="form-control" type="text" name="empleado_nombre" value="<?php echo $nombre; ?>" placeholder="Ingresa el nombre del empleado">
        </div>
        <div class="form-group">
          <label for="Empleado Edad">Edad del Empleado</label>
          <input id="Empleado Edad" class="form-control" type="text" name="empleado_edad" value="<?php echo $edad;?>" placeholder="Ingresa la edad del empleado">
        </div>
        <div class="form-group">
        <?php 
          if ($update == true):
        ?>
          <button class="btn btn-info" type="submit" name="modificar">Modificar</button>
        <?php else: ?>
          <button class="btn btn-primary" type="submit" name="guardar">Guardar</button>
        <?php endif; ?>
        </div>
      </form>
    </div>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <table class="table">
        <thead>
          <tr>
            <th>Nombre del empleado</th>
            <th>Edad del empleado</th>
            <th colspan="2">Acción</th>
          </tr>
        </thead>

        <?php
        include("basededatos.php");
        $resultado = consulta_bd();
        while ($registro = mysqli_fetch_assoc($resultado)) {
          echo "<tr>";
          echo "<td>" . $registro["nombre"] ."</td>" . "<td>". "(" . $registro["edad"] . " años)" . "</td>";
          echo "<td>" . "<a href=procesos.php?modificar=" . $registro["Id"] . " class = 'btn btn-info'>Modificar  </a></td>";
          echo "<td>" . "<a href=procesos.php?eliminar=" . $registro["Id"] . " class = 'btn btn-danger'>Eliminar</a></td>";
          echo "</tr>";
        }
        ?>
      </table>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>


</html>