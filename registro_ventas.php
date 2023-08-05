<?php
include_once('includes/conectado.php');
include_once("header.php");
include_once("footer.php");
include_once("clases/cliente.php");
include_once("clases/ventas.php");
include_once("clases/documento.php");
include_once("clases/producto.php");
include_once("includes/acceso.php");
// creacion objetos
$conexion = connect_db();
$ocli = new Cliente();
$ocli->conectar_db($conexion);
$datos_cli = $ocli->listacli();

$odoc = new Documento();
$odoc->conectar_db($conexion);
$datos_doc = $odoc->listadoc();

$oprodu = new Producto();
$oprodu->conectar_db($conexion);
$datos_produ = $oprodu->listaprodu();

$oven = new Ventas();
$oven->conectar_db($conexion);
$idven = $oven->obtener_ultidventa();
$idven = $idven + 1;
?>

<form action="regventas.php" method="POST">
  <div class="container-fluid">
    <div class="container">
      <h4>Registro de Ventas</h4>
      <div class="row">
        <div class="col">
          <label for="inputPassword" class="col-sm-2 col-form-label">Vendedor</label>
        </div>
        <div class="col">
          <input class="form-control" type="text" value="<?php echo $_SESSION['nombre']; ?>" aria-label="readonly input example" readonly>
        </div>
        <div class="col">
          <label for="inputPassword" class="col-sm-2 col-form-label">Documento</label>
        </div>
        <div class="col">
          <select class="form-select" aria-label="Default select example" name="idDoc">
            <option selected>Seleccione Documento</option>
            <?php
            while ($rdoc = mysqli_fetch_array($datos_doc)) {
              $id_doc = $rdoc['idDocumento'];
              $nombre = $rdoc['nombre'];
            ?>
              <option value="<?php echo $id_doc; ?>"><?php echo $nombre; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="col">
          <label for="inputPassword" class="col-sm-2 col-form-label">Nro. Documento</label>
        </div>
        <div class="col">
          <input class="form-control" type="text" value="<?php echo $idven; ?>" aria-label="readonly input example" name="nroDocVenta" readonly>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="inputPassword" class="col-sm-2 col-form-label">Cliente</label>
        </div>
        <div class="col">
          <select class="form-select" aria-label="Default select example" name="idCliente">
            ><?php
              while ($rcli = mysqli_fetch_array($datos_cli)) {
                $id_cli = $rcli['idCliente'];
                $nombre = $rcli['nombre'];
              ?>
            <option value="<?php echo $id_cli; ?>"><?php echo $nombre; ?></option>
          <?php } ?>
          </select>
        </div>
        <div class="col">
          <label for="inputPassword" class="col-sm-2 col-form-label">Tipo Venta</label>
        </div>
        <div class="col">
          <select class="form-select" aria-label="Default select example" name="sel_tipoven">
            <option selected>Seleccione Tipo</option>
            <option value="Contado">Venta Contado</option>
            <option value="Credito">Venta Credito</option>
          </select>
        </div>
        <div class="col">
          <label for="inputPassword" class="col-sm-2 col-form-label">Fecha</label>
        </div>
        <div class="col">
          <input class="form-control" type="text" aria-label="readonly input example" name="fecha" value="<?php echo date('d-m-Y'); ?>" readonly>
        </div>
      </div>
    </div>
    <div class="container">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Productos
      </button>

      <div class="container">
        <table class="table table-hover">
          <thead>
            <th>Nro</th>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Unidad</th>
            <th>Cant.</th>
            <th>P.Unit</th>
            <th>Importe</th>
          </thead>
          <tbody>
            <?php
            //obtener productos de la tabla temp
            include_once('includes/acceso.php');
            $conexion = connect_db();
            $query = "SELECT temp.id, productos.idProducto AS codigo, productos.nomproducto AS descripcion, productos.unimed AS unidad, temp.cant, productos.preuni AS precio
                    FROM temp
                    INNER JOIN productos ON temp.idProducto = productos.idProducto";
            $res = mysqli_query($conexion, $query);

            // enumerar filas
            $contador = 1;
            $total = 0;
            while ($row = mysqli_fetch_array($res)) {
              $codigo = $row['codigo'];
              $descripcion = $row['descripcion'];
              $unidad = $row['unidad'];
              $cantidad = $row['cant'];
              $precio = $row['precio'];
              $importe = $cantidad * $precio;

              echo "<tr>";
              echo "<td><input class='form-control' type='number' name='contador' value='$contador' readonly></td>";
              echo "<td><input class='form-control' type='number' value='$codigo' name='codigo' readonly></td>";
              echo "<td><input class='form-control' type='text' value='$descripcion' readonly></td>";
              echo "</th><td><input class='form-control' type='text' value='$unidad' readonly></td>";
              echo "<td><input class='form-control' type='number' value='$cantidad' readonly></td>";
              echo "<td> <input class='form-control' type='number' value='$precio' readonly></td>";
              echo "<td><input class='form-control' type='number' value='$importe' name='importeprod' readonly></td>";
              echo "</tr>";
              $total = $total + $importe;
              $contador++;
            }
            ?>
          </tbody>
        </table>

        <table class="table table-striped">
          <thead>
            <th align="right">Subtotal</th>
            <th align="right">
            <td><?php echo $total ?></td>
            </th>
          </thead>
          <thead>
            <th align="right">IGV</th>
            <th align="right">
            <td><?php echo $total * 18 / 100 ?></td>
            </th>
          </thead>
          <thead>
            <th align="right">Total Venta</th>
            <th align="right">
            <td>
              <input type="text" name="total_venta" value='<?php echo $total * 118 / 100 ?>' id="total_venta" readonly>
            </td>
            </th>
          </thead>
        </table>
        <hr>
        <button type="submit" name="btnRegistrar" class="btn btn-secondary">Registrar Venta</button>
        <button type="submit" name="btnLimpiar" class="btn btn-danger">Limpiar</button>
        <button type="button" name="btnSalir" class="btn btn-success">Salir</button>
      </div>
    </div>
</form>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // Capturar el elemento select y el input de precio
    const productoSelect = $('#productoSelect');
    const precioInput = $('#precioInput');

    // Escuchar el evento de cambio en el select
    productoSelect.on('change', function() {
      // Obtener el valor seleccionado del producto
      const selectedProductId = $(this).val();

      // Realizar una llamada AJAX para obtener el precio del producto seleccionado
      $.ajax({
        url: 'obtener_precio_producto.php', // Cambia esto por la URL correcta
        method: 'POST', // Puedes usar GET o POST según tu necesidad
        data: {
          idProducto: selectedProductId
        }, // Envía el ID del producto al servidor
        success: function(response) {
          // Actualizar el campo de precio con el valor obtenido
          precioInput.val(response);
        },
        error: function() {
          // Manejo de errores si es necesario
        }
      });
    });
  });
</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregando detalle venta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
        <!-- Formulario para agregar los productos -->
        <form action="vender_prod.php" method="post">
          <div class="row">
            <div class="col">
              <label for="inputPassword" class="col-sm-2 col-form-label">Producto</label>
              <select class="form-select" name="producto" aria-label="Default select example" id="productoSelect">
                ><?php
                  while ($rprod = mysqli_fetch_array($datos_produ)) {
                    $id_prod = $rprod['idProducto'];
                    $nomprodu = $rprod['nomproducto'];
                  ?>
                <option value="<?php echo $id_prod; ?>"><?php echo $nomprodu; ?></option>
              <?php } ?>
              </select>
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label for="inputPassword" class="col-sm-2 col-form-label">Precio</label>
                <input class="form-control" type="text" name="preuni" id="precioInput" aria-label="readonly input example" readonly>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <label for="inputPassword" class="col-sm-2 col-form-label">Cant</label>
                <input class="form-control" type="num" name="cantidad">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary" name="envioProducto">Agregar</button>

        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
</div>