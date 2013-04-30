<?php
class Entrega{
	public $id;
	public $fecha;
	public $cantidad;
	public $id_alumno;
	
	static private $db;
	static public $arrList = Array('id'=>'Código', 'fecha'=>'Fecha', 'cantidad'=>'Cantidad', 'id_alumno'=>'Alumno');
	
	public function Entrega($fec = "", $cant = "", $id_alu = "", $id=""){
		$this->fecha = $fec;
		$this->cantidad = $cant;
		$this->id_alumno = $id_alu;
		$this->id = $id;
		
		self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
	}
	
	public function insertar(){
		$sql = "INSERT INTO entrega(fecha, cantidad, id_alumno) VALUES('".$this->fecha."', ".$this->cantidad.", ".$this->id_alumno.")";
		$consulta = self::$db->prepare($sql);
		$consulta->execute();
		 
		if ($consulta->errorInfo[0] == 00000) {
			//Devuelve el id del ultimo registro insertado si ha insertado correctamente
			return self::$db->lastInsertId();
			//return $sql;
		} else {
			//Error en la inserción
			return 0;
			//return $sql;
		}
	}
	
	public function eliminar(){
		$sql = "DELETE FROM entrega WHERE id = ".$this->id;
		$consulta = self::$db->prepare($sql);
		$consulta->execute();
	}
	
	public function modificar(){
		$sql = "UPDATE entrega SET fecha = '".$this->fecha."', cantidad = ".$this->cantidad.", id_alumno = ".$this->id_alumno." WHERE id = ".$this->id;
		$consulta = self::$db->prepare($sql);
		$consulta->execute();
	}
	
	static function __selectEntrega($idSel){
		self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
		$sql = "SELECT * FROM entrega WHERE id = ".$idSel;
		$con = self::$db->query($sql);
		foreach ($con as $row){
			$returnEntrega = new Entrega($row['fecha'], $row['cantidad'], $row['id_alumno'], $row['id']);
		}
		return $returnEntrega;
	}
	
	public function mostrar(){
		echo $this->id."<br>";
		echo $this->fecha."<br>";
		echo $this->cantidad."<br>";
		echo $this->id_alumno."<br>";
	}
	
	static function __getEntrega($arr_obj){
		self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
		$sql = "SELECT * FROM entrega WHERE 1 = 1";
		if(isset($arr_obj['id'])){
			$sql.=" and id = ".$arr_obj['id'];
		}
		if(isset($arr_obj['fecha'])){
			$sql.=" and fecha = ".$arr_obj['fecha'];
		}
		if(isset($arr_obj['cantidad'])){
			$sql.=" and cantidad LIKE '%".$arr_obj['cantidad']."%'";
		}
		if(isset($arr_obj['id_alumno'])){
			$sql.=" and id_alumno LIKE '%".$arr_obj['id_alumno']."%'";
		}
		$array_return = array(); //Creamos el array que vamos a devolver
		$con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
		foreach($con as $row){
			$newEntrega = new Entrega($row['fecha'], $row['cantidad'], $row['id_alumno'], $row['id']);
			//$returnAlu->mostrar();
			$array_return[] = $newEntrega;
		}
		return $array_return;
	}
	
	public function set_id($set){
		$this->id = $set;
	}
	public function  set_fecha($set){
		$this->fecha = $set;
	}
	public function set_cantidad($set){
		$this->cantidad = $set;
	}
	public function set_id_alumno($set){
		$this->id_alumno = $set;
	}
	
	public function get_id(){
		return $this->id;
	}
	public function get_fecha(){
		return $this->fecha;
	}
	public function get_cantidad(){
		return $this->cantidad;
	}
	public function get_id_alumno(){
		return $this->id_alumno;
	}
	
	
}