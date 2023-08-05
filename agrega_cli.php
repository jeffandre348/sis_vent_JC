<?php 
include_once('includes/conectado.php');
include_once('header.php');
?>
<div class="container p-12">
<div class="row">
<div class="col-md-4">
                <div class="card card-body">
                    <h2>Agrega Cliente</h2>
                    <form action="agrega_cliente.php" method="post">
                        <div class="form-group">
                        <input type="text" name="nom" class="form-control" placeholder="Nombre cliente" autofocus>
                        </div>
                        <div class="form-group">
                        <input type="text" name="ruc" class="form-control" placeholder="RUC">
                        </div>
                        <div class="form-group">
                        <input type="text" name="dir" class="form-control" placeholder="Dirección Cliente">
                        </div>
                        <div class="form-group">
                        <input type="text" name="tel" class="form-control" placeholder="Teléfono cliente">
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