<?php
include('header.php'); 
//estos datos llegan desde modifica_prov.php
if (isset($_POST['envia_datos'])){
    $id=$_POST['idproveedor'];
    $nom = strtoupper($_POST['nom']);
    $idlin = ($_POST['idlinea']);
    
    include_once('includes/acceso.php');
    include_once('clases/proveedor.php');
    $conexion = connect_db();
    $oproveedor = new Proveedor();
    $oproveedor->conectar_db($conexion);
    
    $response = $oproveedor->modifica_proveedor($id,$nom,$idlin);
    
    if($response) 
    {
        header("location: lista_proveedor.php");
    }
    else
    echo "No se pudo modificar el provedor";
}
?>