<?php 
function conectar_bd()
{
$servidor = "localhost";
$nombrebd = "Empresa";
$usario = "mad";
$pass = "Avatar2910";
$conexion = mysqli_connect($servidor, $usario, $pass, $nombrebd);
return $conexion;
}
function consulta_bd()
{
    $conexionbd = conectar_bd();
    if (!$conexionbd) {
        die("No se establecio la conexion: " . mysqli_connect_error());
        }
            
    $consulta = 'SELECT * FROM empleados';
    if ($resultado = mysqli_query($conexionbd, $consulta)){
    return $resultado;
    }
}
function consulta_id($id)
{
    $conexionbd = conectar_bd();
    if (!$conexionbd) {
        die("No se establecio la conexion: " . mysqli_connect_error());
        }
            
    $consulta = 'SELECT * FROM empleados WHERE Id='.$id;
    if ($resultado = mysqli_query($conexionbd, $consulta)){
    return $resultado;
    }
}
function eliminar_e($id)
{
    $conexionbd = conectar_bd();
    if (!$conexionbd) {
        die("No se establecio la conexion: " . mysqli_connect_error());
        }
            
    $consulta = 'DELETE FROM empleados WHERE Id='.$id;
    if ($resultado = mysqli_query($conexionbd, $consulta)){
    return $resultado;
    }    

}
?>
