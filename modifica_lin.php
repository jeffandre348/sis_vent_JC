<?php
include_once('includes/conectado.php');
include_once('header.php') 
?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/linea.php');
$conexion = connect_db();
$olinea = new Linea();
$olinea->conectar_db($conexion);
$datos=$olinea->consulta($codigo);

?>
<div class="container p-12">
<div class="row">

    <div class="card card-body">
        <h2>Modificar linea</h2>
        <form action="modifica_linea.php" method="post">
        <div class="form-group">
        <div class="col-md-4">Codigo:</div>
        <div class="col-md-4">
            <input type="text" name="idlinea" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col-md-4">Nombre:</div>
            <div class="col-md-4">
            <input type="text" name="nom" class="form-control" value="<?php echo $datos['nombre'];?>">
            </div>
            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>