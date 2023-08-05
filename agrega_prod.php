<?php 
include_once('includes/conectado.php');
include_once('header.php') 
?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <h2>Agrega Producto</h2>
                    <form action="agrega_producto.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre producto" autofocus>
                        </div>
                        <div class="form-group">
                        <input type="text" name="und" class="form-control" placeholder="Unidad">
                        </div>
                        <div class="form-group">
                        <input type="text" name="can" class="form-control" placeholder="Cantidad">
                        </div>
                        <div class="form-group">
                        <input type="text" name="pre" class="form-control" placeholder="Precio Unitario">
                        </div>
                        <div class="form-group">
                        <input type="text" name="cos" class="form-control" placeholder="Costo Unitario">
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