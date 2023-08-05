<?php
class Ventas
{
	//private $idproducto;
	//private $nomproducto;
	//private $unimed;
	//private $stock;
	//private $preuni;
	//private $cosuni;
	private $con;

	public function conectar_db($cn)
	{
		$this->con = $cn;
	}

	public function sanitize($var)
	{
		$valor = mysqli_real_escape_string($this->con, $var);
		return $valor;
	}

	public function listavent()
	{
		$sql = "SELECT * FROM ventas";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function listaventfech(){
		$sql = "SELECT * FROM ventas ORDER BY fecha DESC";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function listaventrank(){
		$sql = "SELECT * FROM ventas ORDER BY totalventa DESC";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function consulta($id)
	{
		$sql = "SELECT * FROM ventas where idVenta=$id";
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_array($res);
		return $return;
	}

	public function obtener_ultidventa()
	{
		$sql = "SELECT idVenta
					FROM ventas
					ORDER BY idVenta DESC
					LIMIT 1";

		$res = mysqli_query($this->con, $sql);

		if ($res && mysqli_num_rows($res) > 0) {
			$row = mysqli_fetch_assoc($res);
			return $row['idVenta'];
		} else {
			// Manejo de errores si no hay registros
			return null;
		}
	}

	public function agrega_vent($fech, $idCli, $idEmpl, $idDoc, $tipoventa, $totalven)
	{
		$fechformat = date('Y-m-d', strtotime($fech));
		$sql = "insert into ventas(fecha,idCliente,idEmpleado,idDocumento,tipo_venta,totalventa) values ('$fechformat',$idCli,$idEmpl,$idDoc,'$tipoventa',$totalven)";

		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}
	public function modifica_vent($id, $fech, $idCli, $idEmpl, $idDoc, $tipoventa, $totalven)
	{
		$sql = "update ventas set
			fecha='$fech',
			idCliente='$idCli',
			idEmpleado=$idEmpl, 
			idDocumento=$idDoc,
			tipo_venta='$tipoventa'
			totalventa=$totalven
			where idVenta='$id'";

		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}
	public function borrar($id)
	{
		$sql = "DELETE FROM ventas WHERE idVenta=$id";
		$res = mysqli_query($this->con, $sql);
		if ($res) {
			return true;
		} else {
			return false;
		}
	}
}
