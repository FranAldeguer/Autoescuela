<?php
include '../clases/Precio_hora.php';
$id = $_POST['inputid'];

$precio = $_POST['inputprecio'];
$hora = $_POST['inputhora'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_borrar = $_REQUEST['id_borrar'];
//Borrar un Alumno
if($js == "borrar_registro"){
	$objBorrar = Precio_hora::__selecPrecio($id_borrar);
	$objBorrar->eliminar();
	return;
}else{
	//Insertar un nuevo alumno desde Alumnos_Insertar.php
	if($id == 0){
		$objInsertar = new Precio_hora($precio, $hora);

		echo $objInsertar->insertar();
	}
	//Modificar un Alumno
	if($id != 0){
		$objModificar = Precio_hora::__selecPrecio($id);
		$objModificar->set_precio($precio);
		$objModificar->set_hora($hora);
		$objModificar->modificar();
	}
}