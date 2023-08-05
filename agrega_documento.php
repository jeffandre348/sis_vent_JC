<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $nom =strtoupper($_POST['nom']);
    
    include_once('includes/acceso.php');
    include_once('clases/documento.php');
    $conexion = connect_db();
    $odocumento = new Documento();
    $odocumento->conectar_db($conexion);
    
    $response = $odocumento->agrega_documento($nom);

    if($response) {
        header("location: lista_documento.php");
    } else
    echo "No se pudo agregar la linea";
    
}
?>
