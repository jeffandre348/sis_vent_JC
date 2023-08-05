<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once("footer.php");
include_once("clases/producto.php");
include_once("clases/detalleVentas.php");
include_once("clases/empleado.php");
include_once("clases/documento.php");
include_once("includes/acceso.php");

$conexion = connect_db();

$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos_prod = $oproducto->listaprodu();

$odetventas = new detalleVentas();
$odetventas->conectar_db($conexion);
$datos_det_ventas = $odetventas->listadetvent();

$odocu = new Documento();
$odocu->conectar_db($conexion);
?>

<div class="container p-12">
    <div class="row">
        <div class="container p-4">
            <h4>Listado de Ventas por Producto</h4>
            <div class="col">
                <label for="inputPassword" class="col-sm-2 col-form-label">Seleccionar Producto</label>
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example" name="idcliente" id="idproducto">
                    <option selected>Seleccione un Producto</option>
                    <?php
                    while ($rpro = mysqli_fetch_array($datos_prod)) {
                        $id_produc = $rpro['idProducto'];
                        $nombre = $rpro['nomproducto'];
                    ?>
                        <option value="<?php echo $id_produc; ?>"><?php echo $nombre; ?></option>
                    <?php } ?>
                </select>
            </div>
            <a href="registro_ventas.php" class="btn btn-info add-new">Nuevo</a>
        </div>
        <div class="card card-body" id="detalles-ventas">
            <table class="table table-bordered">
                <thead>
                    <tr>    
                        <th>IdVenta</th>
                        <th>Producto</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($row = mysqli_fetch_array($datos_det_ventas)) {
                        $id = $row['idVenta'];
                        $idPro = $row['idProducto'];
                        $consulta_prod = $oproducto->consulta($idPro);
                        $cant = $row['cantidad'];
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo !empty($consulta_prod['nomproducto']) ? $consulta_prod['nomproducto'] : 'No encontrado';; ?></td>
                            <td><?php echo $cant; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
document.getElementById("idproducto").addEventListener("change", function() {
    var idProducto = this.value;
    if (idProducto !== "") {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                document.getElementById("detalles-ventas").innerHTML = xhr.responseText;
            }
        };
        xhr.open("GET", "obtener_detalles_producto.php?idproducto=" + idProducto, true);
        xhr.send();
    } else {
        document.getElementById("detalles-ventas").innerHTML = "";
    }
});
</script>


