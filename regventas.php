<?php
include_once("includes/acceso.php");
include_once("includes/conectado.php");
include_once("clases/ventas.php");
include_once("clases/detalle_venta.php");
include_once("clases/temp.php");
$conexion = connect_db();

    if(isset($_POST['btnRegistrar'])){
        $fecha = $_POST['fecha'];
        $idCliente = $_POST['idCliente'];
        $idEmpleado = $_SESSION['idEmpleado'];
        $idDocumento = $_POST['idDoc'];
        $tipoventa = $_POST['sel_tipoven'];
        $idVenta = $_POST['nroDocVenta'];
        $totalventa = $_POST['total_venta'];

        $oven = new Ventas();
        $oven->conectar_db($conexion);
        $oven->agrega_vent($fecha,$idCliente,$idEmpleado,$idDocumento,$tipoventa,$totalventa);
        $oDetalleVentas=new DetalleVentas();
        $oDetalleVentas->conectar_db($conexion);

        $oTemp = new Temp();
        $oTemp->conectar_db($conexion);
        $lista=$oTemp->listatemp();   
        while ($row = mysqli_fetch_array($lista)) {
            $id_producto = $row['idProducto'];
            $cantidad = $row['cant'];
        
            $query = "SELECT preuni FROM productos WHERE idProducto='$id_producto'";
            $result = mysqli_query($conexion, $query);
        
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $precio = $row['preuni'];
        
                $importeprod = $cantidad * $precio;
        
                $oDetalleVentas->agrega_detalle_venta($idVenta, $id_producto, $cantidad, $importeprod);
            }
        }
        
        // Redirigir a registro_ventas.php
        header("Location: registro_ventas.php");
        exit; // Asegurarse de que el script se detenga después de la redirección
    }

    if(isset($_POST['btnLimpiar'])){
        $oTemp2 = new Temp();
        $oTemp2->conectar_db($conexion);
        $oTemp2->borrar();

        // Redirigir a registro_ventas.php
        header("Location: registro_ventas.php");
        exit; // Asegurarse de que el script se detenga después de la redirección
    }
    
?>
