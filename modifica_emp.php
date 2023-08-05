<?php
include_once('includes/conectado.php');
include_once('header.php')
?>
<?php
$codigo = $_GET["codigo"];
include_once('includes/acceso.php');
include_once('clases/empleado.php');
$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos = $oempleado->consulta($codigo);

?>
<div class="container p-12">
    <div class="row">

        <div class="card card-body">
            <h2>Modificar empleado</h2>
            <form action="modifica_empleado.php" method="post">
                <div class="form-group">
                    <div class="col-md-4">Codigo:</div>
                    <div class="col-md-4">
                        <input type="text" name="idEmpleado" class="form-control" value="<?php echo $codigo; ?>" readonly>
                    </div>
                    <div class="col-md-4">nombre:</div>
                    <div class="col-md-4">
                        <input type="text" name="nom" class="form-control" value="<?php echo $datos['nombre']; ?>">
                    </div>
                    <div class="col-md-4">telefono:</div>
                    <div class="col-md-4">
                        <input type="num" name="telf" class="form-control" value="<?php echo $datos['telefono']; ?>">
                    </div>
                    <div class="col-md-4">usuario:</div>
                    <div class="col-md-4">
                        <input type="text" name="usu" class="form-control" value="<?php echo $datos['usuario']; ?>">
                    </div>
                    <div class="col-md-4">password:</div>
                    <div class="col-md-4">
                        <input type="text" name="pass" class="form-control" value="<?php echo $datos['password']; ?>">
                    </div>
                    <div class="col-md-4">direccion:</div>
                    <div class="col-md-4">
                        <input type="text" name="dir" class="form-control" value="<?php echo $datos['direccion']; ?>">
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                    </div>
            </form>
        </div>
    </div>
</div>
<?php include_once('footer.php') ?>