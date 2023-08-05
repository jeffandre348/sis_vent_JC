<?php
include_once('includes/acceso.php');
include_once('clases/temp.php');
$conexion = connect_db();
$otemp = new Temp();
$otemp->conectar_db($conexion);

if (isset($_POST['envioProducto'])){
    $idproducto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    print_r($_POST);
    var_dump($producto);
    $query = "SELECT idProducto, preuni FROM productos WHERE idProducto = '$idproducto'";
    $res = mysqli_query($conexion, $query);

    if($res && mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_assoc($res);
        $id_producto = $row['idProducto'];
        $precio_unidad = $row['preuni'];

        $otemp->agrega_temp($cantidad, $id_producto);

        if ($res_insert) {
            // Mostrar mensaje de éxito en la página principal (registro_ventas.php)
            echo "<script>window.location.href = 'registro_ventas.php?success=true';</script>";
        } else {
            // Mostrar mensaje de error en la página principal (registro_ventas.php)
            echo "<script>window.location.href = 'registro_ventas.php?success=false';</script>";
        }
    } else {
        // Mostrar mensaje de error en la página principal (registro_ventas.php)
        echo "<script>window.location.href = 'registro_ventas.php?success=false';</script>";
    }
}
?>