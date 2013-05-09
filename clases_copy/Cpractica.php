<?php

class Practica{
	
	public $id;
	public $id_alum_carnet;
	public $fecha;
	public $hora;
	public $tiempo;
	public $notas_profesor;
	public $precio;
	
	static private $db;
	static public $arrList = Array('id'=>'Código', 'id_alum_carnet'=>'Codigo Alumno', 'fecha'=>'Fecha', 'hora'=>'Hora', 'tiempo'=>'Tiempo', 'notas_profesor'=>'Notas del profesor', 'precio'=>"Precio");
	
	
	public function Practica($idAC = "", $fec = "", $h = "", $t = "", $not = "", $pre = "", $ident = ""){
		$this->id_alum_carnet = $idAC;
		$this->fecha = $fec;
		$this->hora = $h;
		$this->tiempo = $t;
		$this->notas_profesor = $not;
		$this->precio = $pre;
		$this->id = $ident;
		
		self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
	}
	
	
}