<?php
include('header.php'); 

if (isset($_POST['envia_datos']))
{
    $id=$_POST['idcliente'];
    $nom =strtoupper($_POST['nom']);
    $ruc = $_POST['ruc'];
    $dir = strtoupper($_POST['dir']);
    $telf = $_POST['telf'];
    
    include_once('includes/acceso.php');
    include_once('clases/cliente.php');
    $conexion = connect_db();
    $ocliente = new Cliente();
    $ocliente->conectar_db($conexion);
    
    $response = $ocliente->modifica_cliente($id, $nom, $ruc, $dir, $telf);

    if($response) {
        header("location: lista_cliente.php");
    } else
    echo "No se pudo modificar el cliente";
    
}
?>