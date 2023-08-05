<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id=$_POST['idlinea'];
    $nom =strtoupper($_POST['nom']);
    
    include_once('includes/acceso.php');
    include_once('clases/linea.php');
    $conexion = connect_db();
    $olinea = new Linea();
    $olinea->conectar_db($conexion);
    
    $response = $olinea->modifica_linea($id,$nom);

    if($response) {
        header("location: lista_linea.php");
    } else
    echo "No se pudo modificar la linea";
    
}
?>
