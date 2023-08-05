<?php
include_once('includes/conectado.php');
include_once('header.php');
include_once('includes/acceso.php');
include_once('clases/linea.php');
$conexion = connect_db();
$olinea = new LInea();
$olinea->conectar_db($conexion);
$datos_lin = $olinea->listalin();
if ($datos_lin){
    ?>
    <div class="container p-12">
        <div class="row">
        <div class="container p-4">
        <h4>Listado de Lineas...</h4>
        <a href="agrega_lin.php" class="btn btn-info add-new">Nuevo</a>
        </div>  
        <div class="card card-body">

            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
        
    <?php
    while ($row=mysqli_fetch_array($datos_lin)){
        $id=$row['idLinea'];
        $nom=$row['nombre'];
        ?>
                <tr>
                    <td><?php echo $id; ?></td>
                    <td><?php echo $nom; ?></td>
                    <td>
                    <a href="modifica_lin.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Modificar</a>   
                    <a href="elimina_lin.php?codigo=<?php echo $id; ?>" class="btn btn-info add-new">Eliminar</a>    
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