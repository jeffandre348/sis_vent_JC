<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/producto.php');
include_once('clases/cliente.php');
include_once('clases/documento.php');
//include_once('clases/empleado.php');
//include_once('clases/venta.php');
//include_once('clases/detalle_ventas.php');

$conexion = connect_db();
$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$datos_cli = $ocliente->listacli();
$sql = "create table tmp_999(
    id int,
    idproducto int,
    unimed varchar(10),
    cant decimal(5,2),
    preuni decimal(5.2),
    cosuni decimal(5,2)
)";
mysqli_query($conexion, $sql);
?>
<h2>Registro de Ventas</h2>
<table border="0">
    <form name="fventas" method="post" action="regventas.php">
        <tr>
            <td>
                <div>
                    Vendedor: <?php echo $_SESSION["nombre"]; ?>
                </div>
            </td>

            <td>
                <div class="input-group input-group-sm mb-1">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Documento</span>
                    <input type="text" class="form-control" placeholder="Documento" aria-label="Documento" aria-describedby="basic-addon1">
                </div>
            </td>

            <td>
                <div class="input-group input-group-sm mb-1">
                    <span class="input-group-text" id="basic-addon1">Nro</span>
                    <input type="text" class="form-control" placeholder="nro" aria-label="nro" aria-describedby="basic-addon1">
                </div>
            </td>

        </tr>
        <tr>
            <td>

                <div>
                    <select class="form-select" name="sel_cliente" aria-label="Default select example">
                        <?php
                        while ($row = mysqli_fetch_array($datos_cli)) {
                            $id = $row["idCliente"];
                        ?>
                            <option selected>Cliente:</option>
                            <option value="<?php echo $id; ?>"><?php echo $row['nombre']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </td>

            <td>
                <div>
                    <select name="form-select" name="sel_tipoVenta" aria-label="Default select example">
                        <option selected>Tipo venta:</option>
                    </select>
                </div>
            </td>

            <td>
                <div>
                    <div class="input-group input-group-sm mb-1">
                        <span class="input-group-text" id="basic-addon1">fecha</span>
                        <input type="date" class="form-control" aria-label="fecha" aria-describedby="basic-addon1">
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <button type="button" class="btn btn-primary">Agregar producto</button>
            </td>
        </tr>

    </form>
</table>
<?php
$sql = "drop table tmp_999";
mysqli_query($conexion, $sql);

?>