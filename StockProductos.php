<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/producto.php');
$conexion = connect_db();
$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos_produ = $oproducto->listaprodu();
if ($datos_produ) {
?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Stock de Productos...</h4>
            </div>
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Descripcion</th>
                            <th>Unidad</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Costo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($datos_produ)) {
                            $id = $row['idProducto'];
                            $nom = $row['nomproducto'];
                            $und = $row['unimed'];
                            $can = $row['stock'];
                            $pre = $row['preuni'];
                            $cos = $row['cosuni'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nom; ?></td>
                                <td><?php echo $und; ?></td>
                                <td><?php echo $can; ?></td>
                                <td><?php echo $pre; ?></td>
                                <td><?php echo $cos; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
}

?>