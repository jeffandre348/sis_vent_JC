<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/ventas.php');
include_once('clases/cliente.php');
include_once('clases/empleado.php');
include_once('clases/documento.php');
include_once('clases/producto.php');


$conexion = connect_db();

$oproducto = new Producto();
$oproducto->conectar_db($conexion);
$datos_produ = $oproducto->listaprodu();

$ocli = new Cliente();
$ocli->conectar_db($conexion);

$oemp = new Empleado();
$oemp->conectar_db($conexion);

$odocu = new Documento();
$odocu->conectar_db($conexion);

$oventas = new Ventas();
$oventas->conectar_db($conexion);
$datosvent = $oventas->listaventrank();

if ($datosvent) {
?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Ranking de ventas...</h4>
            </div>
            <div class="card card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>IdVenta</th>
                            <th>Fecha</th>
                            <th>Cliente</th>
                            <th>Empleado</th>
                            <th>TipoVenta</th>
                            <th>FormaPago</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_array($datosvent)) {
                            $id = $row['idVenta'];
                            $fecha = $row['fecha'];
                            $idcli = $row['idCliente'];
                            $nomcli = $ocli->consulta($idcli);
                            $idemp = $row['idEmpleado'];
                            $nomemp = $oemp->consulta($idemp);
                            $iddoc = $row['idDocumento'];
                            $tipdoc = $odocu->consulta($iddoc);
                            $tipovent = $row['tipo_venta'];
                            $totalven = $row['totalventa'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $fecha; ?></td>
                                <td><?php echo !empty($nomcli['nombre']) ? $nomcli['nombre'] : 'No encontrado';; ?></td>
                                <td><?php echo !empty($nomemp['nombre']) ? $nomemp['nombre'] : 'No encontrado';; ?></td>
                                <td><?php echo !empty($tipdoc['nombre']) ? $tipdoc['nombre'] : 'No encontrado';; ?></td>
                                <td><?php echo $tipovent; ?></td>
                                <td><?php echo $totalven; ?></td>
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