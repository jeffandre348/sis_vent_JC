<?php
include_once('includes/conectado.php');
include_once("clases/producto.php");
include_once("clases/detalleVentas.php");
include_once("clases/empleado.php");
include_once("clases/documento.php");
include_once("includes/acceso.php");

$conexion = connect_db();

$odetventas = new detalleVentas();
$odetventas->conectar_db($conexion);
$datos_det_ventas = $odetventas->listadetvent();

$oprod = new Producto();
$oprod->conectar_db($conexion);

?>

<?php
if (isset($_GET['idproducto'])) {
    $idProducto = $_GET['idproducto'];
?>
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
                $consulta_prod = $oprod->consulta($idPro);
                $cant = $row['cantidad'];
                if($consulta_prod['idProducto']==$idProducto){
            ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo !empty($consulta_prod['nomproducto']) ? $consulta_prod['nomproducto'] : 'No encontrado'; ?></td>
                    <td><?php echo $cant; ?></td>
                </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
<?php } else {
    echo 'No se proporcionó un ID de producto válido.';
}
?>