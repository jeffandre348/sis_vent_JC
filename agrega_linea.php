<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
    
    include_once('includes/acceso.php');
    include_once('clases/linea.php');
    $conexion = connect_db();
    $olinea = new Linea();
    $olinea->conectar_db($conexion);
    
    $response = $olinea->agrega_linea($nom);

    if($response) {
        header("location: lista_linea.php");
    } else
    echo "No se pudo agregar la linea";
    
}
?>
