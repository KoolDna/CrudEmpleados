<?php
    include("basededatos.php");
    $update = false;

    $conexionbd = conectar_bd();
        if (!$conexionbd) {
            die("No se establecio la conexion: " . mysqli_connect_error());
        }

    if (isset($_POST['guardar'])){

        $Nombre = $_POST['empleado_nombre'];
        $Edad = $_POST['empleado_edad'];
        $consulta = "INSERT INTO empleados VALUES (NULL, '$Nombre', '$Edad')";
        $resultado=mysqli_query($conexionbd,$consulta);
        if ($resultado) {
            echo "Empleado almacenado. <br />";
            header('Location:index.php');
            die();
        } else {
            echo "error en la ejecución de la consulta. <br />";    
            die(mysqli_connect_error());
        }        
    }
    if (isset($_POST['actualizar'])){
        $id= $_GET['actualizar'];
        $Nombre = $_POST['empleado_nombre'];
        $Edad = $_POST['empleado_edad'];
        $consulta = "UPDATE empleados SET nombre='$Nombre', edad = '$Edad' WHERE Id = '$id'";
        $resultado=mysqli_query($conexionbd,$consulta);
        if ($resultado) {
            echo "Empleado actualizado. <br />";
            header('Location:index.php');
            die();
        } else {
            echo "error en la ejecución de la consulta.".$id." <br />";    
            die(mysqli_connect_error());
        }        
    }


    if (isset($_GET['eliminar'])){
        $id = $_GET['eliminar'];
        eliminar_e($id);       
        echo "Empleado eliminado. <br />";
        header('Location:index.php');
        die();
               
    }
    if (isset($_GET['modificar'])){
        $id= $_GET['modificar'];
        $resultado = consulta_id($id);        
        if (mysqli_num_rows($resultado)==1){
            $registro = mysqli_fetch_array($resultado);
            $nombre = $registro['nombre'];
            $edad = $registro['edad'];
            $update = true;
         }
         header('Location:index.php');
         die(); 


    }
?>
