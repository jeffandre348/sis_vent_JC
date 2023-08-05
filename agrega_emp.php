<?php
include_once('includes/conectado.php');
include_once('header.php')
?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <h2>Agrega Empleado</h2>
                    <form action="agrega_empleado.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre empleado" autofocus>
                        </div>
                        <div class="form-group">
                        <input type="text" name="telf" class="form-control" placeholder="telefono">
                        </div>
                        <div class="form-group">
                        <input type="text" name="usu" class="form-control" placeholder="usuario">
                        </div>
                        <div class="form-group">
                        <input type="text" name="pass" class="form-control" placeholder="password">
                        </div>
                        <div class="form-group">
                        <input type="text" name="dir" class="form-control" placeholder="direccion">
                        </div>
                        <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" name="envia_datos" value="Enviar">
                        </div>
                    </form>
                </div>
            </div>
            </div>
            </div>  
<?php include_once('footer.php') ?>