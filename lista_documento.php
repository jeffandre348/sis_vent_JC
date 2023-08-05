<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/documento.php');
$conexion = connect_db();
$oproveedor = new Documento();
$oproveedor->conectar_db($conexion);
$datos_prove = $oproveedor->listadoc();
if ($datos_prove) {
?>
    <div class="container p-12">
        <div class="row">
            <div class="container p-4">
                <h4>Listado de Documentos...</h4>
                <a href="agrega_doc.php" class="btn btn-info add-new">Nuevo</a>
            </div>
            <div class="card card-body">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>idDocumento</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        while ($row = mysqli_fetch_array($datos_prove)) 
                        {
                            $id = $row['idDocumento'];
                            $nom = $row['nombre'];
                        ?>
                            <tr>
                                <td><?php echo $id; ?></td>
                                <td><?php echo $nom; ?></td>
                                <td>
                                    <a href="modifica_doc.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>
                                    <a href="elimina_doc.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>
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