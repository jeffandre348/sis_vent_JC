<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/proveedor.php');
$conexion = connect_db();
$oproveedor = new Proveedor();
$oproveedor->conectar_db($conexion);
$datos_prove = $oproveedor->listaprove();
if ($datos_prove) {
?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Listado de Proveedores...</h4>
                <a href="agrega_prov.php" class="btn btn-info add-new">Nuevo</a>
            </div>
            <div class="card card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>idLinea</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_array($datos_prove)) 
                        {
                            $id = $row['idProveedor'];
                            $nom = $row['nombre'];
                            $idlin = $row['idLinea'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nom; ?></td>
                                <td><?php echo $idlin; ?></td>
                                <td>
                                    <a href="modifica_prov.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>
                                    <a href="elimina_prov.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>
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