<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once("footer.php");
include_once("clases/cliente.php");
include_once("clases/ventas.php");
include_once("clases/empleado.php");
include_once("clases/documento.php");
include_once("includes/acceso.php");

$conexion = connect_db();

$oventas = new Ventas();
$oventas->conectar_db($conexion);
$datos_ventas = $oventas->listaventfech();

$ocli = new Cliente();
$ocli->conectar_db($conexion);
$datos_cli = $ocli->listacli();

$oemp = new Empleado();
$oemp->conectar_db($conexion);

$odocu = new Documento();
$odocu->conectar_db($conexion);
?>

<div class="container p-12">
    <div class="row">
        <div class="card card-body" id="detalles-ventas">
            <table class="table table-bordered">
                <div>
                    <h4>Lista de las ventas por fecha</h4>
                </div>
                <thead>
                    <tr>
                        <th>IdVenta</th>
                        <th>fecha</th>
                        <th>Cliente</th>
                        <th>Empleado</th>
                        <th>TipoVenta</th>
                        <th>Costo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_array($datos_ventas)) {
                        $id = $row['idVenta'];
                        $fech = $row['fecha'];
                        $idCli = $row['idCliente'];
                        $conculta_cli = $ocli->consulta($idCli);
                        $idEmpl = $row['idEmpleado'];
                        $consulta_emp = $oemp->consulta($idEmpl);
                        $idDoc = $row['idDocumento'];
                        $consulta_docu = $odocu->consulta($idDoc);
                        $total = $row['totalventa'];  
                    ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?php echo $fech; ?></td>
                            <td><?php echo !empty($conculta_cli['nombre']) ? $conculta_cli['nombre'] : 'No encontrado';?></td>
                            <td><?php echo !empty($consulta_emp['nombre']) ? $consulta_emp['nombre'] : 'No encontrado';?></td>
                            <td><?php echo !empty($consulta_docu['nombre']) ? $consulta_docu['nombre'] : 'No encontrado';; ?></td>
                            <td><?php echo $total; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>        
    </div>
</div>