<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/linea.php');
$conexion = connect_db();
$olinea = new Linea();
$olinea->conectar_db($conexion);
$res=$olinea->borrar($codigo);
if ($res)
    header("Location: lista_linea.php");
else
    echo "Error no se pudo eliminar..";

?>
 