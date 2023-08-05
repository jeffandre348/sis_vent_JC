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
$datos_ventas = $oventas->listavent();

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
        <div class="container p-4">
            <h4>Listado de Ventas por Cliente</h4>
            <div class="col">
                <label for="inputPassword" class="col-sm-2 col-form-label">Seleccione un Cliente</label>
            </div>
            <div class="col">
                <select class="form-select" aria-label="Default select example" name="idcliente" id="idcliente">
                    <option selected>Seleccione un Cliente</option>
                    ><?php
                        while ($rcli = mysqli_fetch_array($datos_cli)) {
                            $id_cli = $rcli['idCliente'];
                            $nombre = $rcli['nombre'];
                        ?>
                    <option value="<?php echo $id_cli; ?>"><?php echo $nombre; ?></option>
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

<script>//script para detectar cuando se genera un cambio en el select de cliente
    document.getElementById("idcliente").addEventListener("change", function() {
        var idCliente = this.value;
        if (idCliente !== "") {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    document.getElementById("detalles-ventas").innerHTML = xhr.responseText;
                }
            };
            xhr.open("GET", "obtener_detalles_ventas.php?idcliente=" + idCliente, true);
            xhr.send();
        } else {
            document.getElementById("detalles-ventas").innerHTML = "";
        }
    });
</script>
