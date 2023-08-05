<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/documento.php');
$conexion = connect_db();
$odocumento = new Documento();
$odocumento->conectar_db($conexion);
$res=$odocumento->borrar($codigo);
if ($res)
    header("Location: lista_documento.php");
else
    echo "Error no se pudo eliminar..";
?>