<?php

class DetalleVentas {
        
    private $id;
    private $id_venta;
    private $id_producto;
    private $cantidad;
    private $conn;

    public function conectar_db($cn){
        $this->conn = $cn;
    }

    public function sanitize($var) {
        $valor = mysqli_real_escape_string($this->conn, $var);
        return $valor;
    }
    
    public function lista_detalles_venta(){
        $sql = "SELECT * FROM detalleventas";
        $res = mysqli_query($this->conn, $sql);
        return $res;
    }

    public function consulta($id){
        $sql = "SELECT * FROM detalleventas WHERE idDetalleVenta=$id";
        $res = mysqli_query($this->conn, $sql);
        $return = mysqli_fetch_array($res);
        return $return;
    }
    
    public function agrega_detalle_venta($id_venta, $id_producto, $cantidad, $importe){
        $sql = "INSERT INTO detalleventas(idVenta, idProducto, cantidad, importe) VALUES ($id_venta, $id_producto, $cantidad, $importe)";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }   

    public function modifica_detalle_venta($id, $id_venta, $id_producto, $cantidad, $importe){
        $sql = "UPDATE detalleventas SET idVenta='$id_venta', idProducto='$id_producto', cantidad='$cantidad', importe='$importe' WHERE idDetalleVenta='$id'";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
        
    public function borrar($id){
        $sql = "DELETE FROM detalleventas WHERE idDetalleVenta=$id";
        $res = mysqli_query($this->conn, $sql);
        if ($res){
            return true;
        } else {
            return false;
        }
    }
    
    public function set_id($id){
        $this->id = $id;
    }
    
    public function set_id_venta($id_venta){
        $this->id_venta = $id_venta;
    }
    
    public function set_id_producto($id_producto){
        $this->id_producto = $id_producto;
    }
    
    public function set_cantidad($cantidad){
        $this->cantidad = $cantidad;
    }
    
    public function get_id(){
        return $this->id;
    }
    
    public function get_id_venta(){
        return $this->id_venta;
    }
    
    public function get_id_producto(){
        return $this->id_producto;
    }
    
    public function get_cantidad(){
        return $this->cantidad;
    }
}
?>
