<?php

include ("../clases/Calumno.php");
include ("../clases/CRandom.php");

$cr = new CRandom();

try{
	//Preparación
	DB::get()->beginTransaction();
	
	DB::get()->exec("DELETE FROM alumno");
	
	$num = 10;
	for($i = 0; $i < $num; $i++){
		$cAlu = new Calumno();
		$cAlu->dni = $cr->genNumeroRng(10000000, 99999999).$cr->genCadena(1);
		$cAlu->nombre = $cr->genNombre(1);
		$cAlu->apellidos = $cr->genNombre(2)." ".$cr->genNombre(2);
		$cAlu->fecha_nac = $cr->genFecha();
		$cAlu->telefono = $cr->genNumeroRng(600000000, 799999999);
		$cAlu->mail = $cr->genEmail();
		$cAlu->pass = $cr->genCadena(4);
	
		$cAlu->insert();
	}
	
	echo "Creación : OK<br>";

	//Consulta
	$arrList = Calumno::__getListado($info);
	if($info["num"]!=$num)throw new Exception("Error en el numero de resultados");
	
	echo "Listado : OK<br>";
	
	$arrList[3]->nombre = "pepe paja";
	$arrList[3]->update();
	
	$arrList2 = Calumno::__getListado($info,"id",Array("nombre"=>"pepe paja"));
	if($info["num"]!=1)throw new Exception("Error al realizar la consulta por titulo");
	if($arrList2[0]->nombre!="pepe paja") throw new Exception("Error al actualizar los datos");
	
	echo "Modificaión : OK<br>";
	
	//Eliminar
	Calumno::__delete($arrList2[0]->id);
	$arrList2 = Calumno::__getListado($info, "id", Array("nombre"=>"pepe paja"));
	if($info["num"]==1)throw new Exception("Error al eliminar");
	
	echo "Eliminar : OK";
	
	
	DB::get()->rollBack();
	
}catch (Exception $e){
	echo $e->getMessage();
	DB::get()->rollBack();
}