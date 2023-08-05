<?php

class  Documento {
	
		private $idDocumento;
		private $nombre;
		private $con;
		
		public function conectar_db($cn){
			$this->con = $cn;
		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listadoc(){
			$sql = "SELECT * FROM documentos";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM documentos where idDocumento=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res );
			return $return ;
		}
		
		public function agrega_documento($nom){
			$sql = "insert into documentos (nombre) 
			values ('$nom')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
		public function modifica_documento($id,$nom){
			$sql = "update documentos set
			nombre = '$nom'
			where idDocumento = '$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}

		}	
			
		public function borrar($id){
			$sql = "DELETE FROM documentos WHERE idDocumento=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}	

        function getIdDocumento() { 
            return $this->idDocumento; 
        } 
   
       function setIdDocumento($idDocumento) {  
           $this->idDocumento = $idDocumento; 
        } 
   
       function getNombre() { 
            return $this->nombre; 
        } 
   
       function setNombre($nombre) {  
           $this->nombre = $nombre; 
        } 
    }	
?>	