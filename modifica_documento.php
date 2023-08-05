<?php
include('header.php'); 

if (isset($_POST['envia_datos'])){
    $id=$_POST['iddocumento'];
    $nom =strtoupper($_POST['nom']);
    
    include_once('includes/acceso.php');
    include_once('clases/documento.php');
    $conexion = connect_db();
    $odocumento = new Documento();
    $odocumento->conectar_db($conexion);
    
    $response = $odocumento->modifica_documento($id,$nom);

    if($response) {
        header("location: lista_documento.php");
    } else
    echo "No se pudo modificar el documento";
    
}
?>
