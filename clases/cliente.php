<?php

class  Cliente {
	
		private $idCliente;
		private $nombre;
		private $ruc;
		private $dircliente;
		private $telcliente;
		private $con;
		
		public function conectar_db($cn){
			$this->con = $cn;
		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listacli(){
			$sql = "SELECT * FROM clientes";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM clientes where idCliente=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_cliente($nom, $ruc,$dir,$tel){
			$sql = "insert into clientes (nombre, ruc, dircliente, telcliente) 
			values ('$nom', '$ruc', '$dir', '$tel')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_cliente($id,$nom,$ruc,$dir,$tel){
			$sql = "update clientes set
			nombre='$nom',
			ruc='$ruc',
			dircliente='$dir', 
			telcliente='$tel' 
			where idCliente='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM clientes WHERE idCliente=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}	

		function getIdCliente() { 
			return $this->idCliente; 
	   	} 
   
	   function setIdCliente($idCliente) {  
		   $this->idCliente = $idCliente; 
	   	} 
   
	   function getNombre() { 
			return $this->nombre; 
	   	} 
   
	   function setNombre($nombre) {  
		   $this->nombre = $nombre; 
	   	} 
   
	   function getRuc() { 
			return $this->ruc; 
	   	} 
   
	   function setRuc($ruc) {  
		   $this->ruc = $ruc; 
	   	} 
   
	   function getDircliente() { 
			return $this->dircliente; 
	   	} 
   
	   function setDircliente($dircliente) {  
		   $this->dircliente = $dircliente; 
	   	} 
   
	   function getTelcliente() { 
			return $this->telcliente; 
	   	} 
   
	   function setTelcliente($telcliente) {  
		   $this->telcliente = $telcliente; 
	   	} 
	}	
?>	