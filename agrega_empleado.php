<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom = strtoupper($_POST['nom']);
    $telf = $_POST['telf'];
    $usua = $_POST['usu'];
    $pass = $_POST['pass'];
    $dir = $_POST['dir'];

    
    include_once('includes/acceso.php');
    include_once('clases/empleado.php');
    $conexion = connect_db();
    $oempleado = new Empleado();
    $oempleado->conectar_db($conexion);
    
    $response = $oempleado->agrega_empleado($nom, $telf, $usua, $pass, $dir);

    if($response) {
        header("location: lista_empleado.php");
    } else
    echo "No se pudo agregar el proveedor";
}
?>
