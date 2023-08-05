<?php
class detalleVentas {       
		private $idproducto;
		private $nomproducto;
		private $unimed;
		private $stock;
		private $preuni;
		private $cosuni;
		private $con;

		public function conectar_db($cn){
			$this->con = $cn;
		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listadetvent(){
			$sql = "SELECT * FROM detalleventas";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
        
        public function consulta($id){
			$sql = "SELECT * FROM detalleventas where idDetalleVenta=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return;
		}
		
		public function agrega_det_vent($idVenta,$idProducto,$cantidad){
			$sql = "insert into detalleventas(idVenta,idProducto,catidad) values ('$idVenta','$idProducto',$cantidad)";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_det_vent($id,$idVenta,$idProducto,$cantidad){
			$sql = "update detalleventas set
			idVenta='$idVenta',
			idProducto='$idProducto',
			cantidad=$cantidad
			where idDetalleVenta='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}			
		public function borrar($id){
			$sql = "DELETE FROM detalleventas WHERE idDetalleVenta=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
	}
