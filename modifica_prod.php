<?php 
include_once('includes/conectado.php');
include_once('header.php') 
?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos=$oproducto->consulta($codigo);

?>
<div class="container p-12">
<div class="row">

    <div class="card card-body">
        <h2>Modificar producto</h2>
        <form action="modifica_producto.php" method="post">
        <div class="form-group">
        <div class="col-md-4">Codigo:</div>
        <div class="col-md-4">
            <input type="text" name="idproducto" class="form-control" value="<?php echo $codigo;?>" readonly>
            </div>
            <div class="col-md-4">Descripcion:</div>
            <div class="col-md-4">
            <input type="text" name="nom" class="form-control" value="<?php echo $datos['nomproducto'];?>" >
        </div>
        <div class="col-md-4">Unidad medida:</div>
        <div class="col-md-4">
            <input type="text" name="und" class="form-control" value="<?php echo $datos['unimed'];?>">
            </div>
            <div class="col-md-4">Stock:</div>
            <div class="col-md-4">
            <input type="text" name="can" class="form-control" value="<?php echo $datos['stock'];?>">
            </div>
            <div class="col-md-4">Precio Unitario:</div>
            <div class="col-md-4">
            <input type="text" name="pre" class="form-control" value="<?php echo $datos['preuni'];?>">
            </div>
            <div class="col-md-4">Costo Unitario:</div>
            <div class="col-md-4">
            <input type="text" name="cos" class="form-control" value="<?php echo $datos['cosuni'];?>">
            </div>
            <div class="col-md-4">
            <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
            </div>
        </form>

    </div>
  </div>
 </div>  
<?php include_once('footer.php') ?>