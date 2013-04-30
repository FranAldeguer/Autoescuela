<?php
class ExamenTeorico{
	
	public $id;
	public $fecha;
	public $fallos;
	public $id_alum_carnet;
	
	static public $arrList = Array('id' => 'Código', 'fecha' => 'Fecha', 'fallos' => 'Fallos', 'id_alum_carnet' => 'Carnet / Alumno');
	static private $db;
	
	public function ExamenTeorico($fec="", $fal="", $alum_car="", $id=""){
		$this->id = $id;
		$this->fecha = $fec;
		$this->fallos = $fal;
		$this->id_alum_carnet = $alum_car;
		
		self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
	}
	
	public function insertar(){
		//Funciona
		$sql= "INSERT INTO examen_teorico(fecha, fallos, id_alum_carnet) VALUES('".$this->fecha."', ".$this->fallos.", ".$this->id_alum_carnet.")";
		$consulta = self::$db->prepare($sql);
		$consulta->execute();
		 
		if ($consulta->errorInfo[0] == 00000) {
			//Devuelve el id del ultimo registro insertado si ha insertado correctamente
			return self::$db->lastInsertId();
		} else {
			//Error en la inserción
			return 0;
		}
	}
	
	public function eliminar(){
		//Funciona
		$sql = "DELETE FROM examen_teorico WHERE id = ".$this->id;
		$consulta = self::$db->prepare($sql);
		$consulta->execute();
	}
	
	public function modificar(){
		//Funciona
		$sql = "UPDATE examen_teorico SET fecha = '".$this->fecha."', fallos = ".$this->fallos.", id_alum_carnet = ".$this->id_alum_carnet." WHERE id = ".$this->id;
		$consulta = self::$db->prepare($sql);
		$consulta->execute();
	}
	
	static function __selectExamen($idSel){
		//Funciona
		self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
		$sql = "SELECT * FROM examen_teorico WHERE id = ".$idSel;
		$con = self::$db->query($sql);
		foreach($con as $row){
			$returnExam = new ExamenTeorico($row['fecha'], $row['fallos'], $row['id_alum_carnet'], $row['id']);
		}
		return $returnExam;
	}
	
	public function mostrar(){
		//Funciona
		echo "<br>EXAMEN TEORICO<br>";
		echo $this->id."<br>";
		echo $this->fecha."<br>";
		echo $this->fallos."<br>";
		echo $this->id_alum_carnet."<br>";
	}
	
	static function __getExamen($arr_obj){
		//Funciona
		self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
		$sql = "SELECT * FROM examen_teorico WHERE 1=1";
		if(isset($arr_obj['id'])){
			$sql.= " and id = ".$arr_obj['id'];
		}
		if(isset($arr_obj['fecha'])){
			$sql.= " and fecha = '".$arr_obj['fecha']."'";
		}
		if(isset($arr_obj['fallos'])){
			$sql.=" and fallos = ".$arr_obj['fallos'];
		}
		if(isset($arr_obj['id_alum_carnet'])){
			$sql.=" and id_alum_carnet = ".$arr_obj['id_alum_carnet'];
		}
		$array_return = array();
		$con = self::$db->query($sql);
		foreach ($con as $row){
			$newExam = new ExamenTeorico($row['fecha'], $row['fallos'], $row['id_alum_carnet'], $row['id']);
			$array_return[] = $newExam;
		}
		return $array_return;
	}
	
	public function set_id($set){
		$this->id = $set;
	}
	public function set_fecha($set){
		$this->fecha = $set;
	}
	public function set_fallos($set){
		$this->fallos = $set;
	}
	public function set_id_alum_carnet($set){
		$this->id_alum_carnet = $set;
	}
	
	public function get_id(){
		return $this->id;
	}
	public function get_fecha(){
		return $this->fecha;
	}
	public function get_fallos(){
		return $this->fallos;
	}
	public function get_id_alum_carnet(){
		return $this->id_alum_carnet;
	}
}