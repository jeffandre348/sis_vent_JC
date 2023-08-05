<?php include_once('header.php') ?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/empleado.php');
$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$res = $oempleado->borrar($codigo);
if ($res)
    header("Location: lista_empleado.php");
else
    echo "Error no se pudo eliminar..";

?>
 