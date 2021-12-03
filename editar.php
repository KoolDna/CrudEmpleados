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
      <h1>Modificar Empleados</h1>
    </div>
  </header>
  <?php
    include 'basededatos.php';
  if (isset($_GET['modificar'])){
        $id= $_GET['modificar'];
        $resultado = consulta_id($id);        
        if (mysqli_num_rows($resultado)==1){
            $registro = mysqli_fetch_array($resultado);
            $nombre = $registro['nombre'];
            $edad = $registro['edad'];
         }else{    
            header('Location:index.php');
            die(); }
    }

    ?>
  <div class="container">
    <div class="row justify-content-center">
      <form method="POST" action="procesos.php?actualizar=<?php echo $id;?>">
        <div class="form-group">
          <label>Nombre del Empleado</label>
          <input id="empleado_nombre" class="form-control" type="text" name="empleado_nombre" value="<?php echo $nombre; ?>" placeholder="Ingresa el nombre del empleado">
        </div>
        <div class="form-group">
          <label for="Empleado Edad">Edad del Empleado</label>
          <input id="Empleado Edad" class="form-control" type="text" name="empleado_edad" value="<?php echo $edad;?>" placeholder="Ingresa la edad del empleado">
        </div>
        <div class="form-group">
          <button class="btn btn-info" type="submit" name="actualizar">Actualizar</button>
        </div>
      </form>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>


</html>