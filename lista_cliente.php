<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/cliente.php');
$conexion = connect_db();
$ocliente = new Cliente();
$ocliente->conectar_db($conexion);
$datos_cli = $ocliente->listacli();
if ($datos_cli) {
?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Listado de Clientes...</h4>
                <a href="agrega_cli.php" class="btn btn-info add-new">Nuevo</a>
            </div>
            <div class="card card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre del Cliente</th>
                            <th>RUC</th>
                            <th>Direccion</th>
                            <th>Telefono</th>

                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_array($datos_cli)) {
                            $id = $row["idCliente"];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $row['nombre']; ?></td>
                                <td><?php echo $row['ruc']; ?></td>
                                <td><?php echo $row['dircliente']; ?></td>
                                <td><?php echo $row['telcliente']; ?></td>

                                <td>
                                    <a href="modifica_cli.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>
                                    <a href="elimina_cli.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>
                                </td>
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