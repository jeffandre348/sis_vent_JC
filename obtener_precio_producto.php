<?php
include_once("includes/acceso.php");
include_once("clases/producto.php");

$conexion = connect_db();
$oprodu = new Producto();
$oprodu->conectar_db($conexion);

// Obtener el ID del producto del parámetro POST
$idProducto = $_POST['idProducto'];

$datos_produ = $oprodu->consulta($idProducto);

// Consulta para obtener el precio del producto
$query = "SELECT preuni FROM productos WHERE idProducto = $idProducto";
$resultado = mysqli_query($conexion, $query);

// Obtener el precio de la consulta
if ($fila = mysqli_fetch_assoc($resultado)) {
    $precio = $fila['preuni'];
    echo $precio; // Devolver el precio como respuesta a la solicitud AJAX
} else {
    echo 'No encontrado'; // Manejo de errores si el producto no se encuentra
}

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>
