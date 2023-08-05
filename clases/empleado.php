<?php
class  Empleado {
        
		private $idEmpleado;
		private $nombre;
		private $telefono;
        private $usuario;
        private $password;
        private $direccion;

		private $con;
		
		public function conectar_db($cn){
			$this->con = $cn;
		}

		public function sanitize($var) {
			$valor = mysqli_real_escape_string($this->con, $var);
			return $valor;
		}
		
		public function listaemple(){
			$sql = "SELECT * FROM empleados";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

        public function consulta($id){
			$sql = "SELECT * FROM empleados where idEmpleado=$id";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res);
			return $return ;
		}
		
		public function agrega_empleado($nom, $telf, $usua, $pass, $dir){
            $usu_pass_hash = password_hash ($pass, PASSWORD_DEFAULT);
			$sql = "insert into empleados(nombre, telefono, usuario, password, direccion) 
                    values ('$nom', '$telf', '$usua', '$usu_pass_hash', '$dir')";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}	

		public function modifica_empleado($id, $nom, $telf, $usua, $pass, $dir){
            //gerando hash de password
            $usu_pass_hash = password_hash ($pass, PASSWORD_DEFAULT);
			$sql = "update empleados set
			nombre ='$nom',
			telefono ='$telf',
            usuario = '$usua',
            password = '$usu_pass_hash',
            direccion = '$dir'
			where idEmpleado ='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}	
			
		public function modifica_password($id, $pass){
            //gerando hash de password
            $usu_pass_hash = password_hash ($pass, PASSWORD_DEFAULT);
			$sql = "update empleados set
            password = '$usu_pass_hash'
			where idEmpleado ='$id'";
			
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}


		public function borrar($id){
			$sql = "DELETE FROM empleados WHERE idEmpleado=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function lee_datos($usu){
			$sql = "SELECT * FROM empleados where usuario='$usu'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_array($res);
			return $return ;
		}	
	}	
?>