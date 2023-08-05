<?php


if (isset($_POST['envia_pass']))
{
    $id = $_POST['idEmpleado'];
    $pass = $_POST['pass'];
    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $oempleado = new Empleado();
    $oempleado->conectar_db($conexion);
    
    $response = $oempleado->modifica_password($id, $pass);
    if($response) 
    {
        header("location: index.php");
    }
    else
    echo "No se pudo modificar el provedor";
}
?>