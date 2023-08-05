<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/empleado.php');
$conexion = connect_db();
$oempleado = new Empleado();
$oempleado->conectar_db($conexion);
$datos_emple = $oempleado->listaemple();
if ($datos_emple) {
?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Listado de Empleados...</h4>
                <a href="agrega_emp.php" class="btn btn-info add-new">Nuevo</a>
            </div>
            <div class="card card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>nombre</th>
                            <th>telefono</th>
                            <th>usuario</th>
                            <th>password</th>
                            <th>direccion</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_array($datos_emple)) {
                            $id = $row['idEmpleado'];
                            $nom = $row['nombre'];
                            $telf = $row['telefono'];
                            $usua = $row['usuario'];
                            $pass = $row['password'];
                            $dir = $row['direccion'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nom; ?></td>
                                <td><?php echo $telf; ?></td>
                                <td><?php echo $usua; ?></td>
                                <td><?php echo $pass; ?></td>
                                <td><?php echo $dir; ?></td>
                                <td>
                                    <a href="modifica_emp.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>
                                    <a href="elimina_emple.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>
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