<?php
include '../clases/Test.php';
$id = $_POST['inputid'];

$num = $_POST['inputnumero'];
$num_pre = $_POST['inputnum_preguntas'];
$id_col = $_POST['selectid_coleccion'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_borrar = $_REQUEST['id_borrar'];
//Borrar un Alumno
if($js == "borrar_registro"){
	$objBorrar = Test::__selecTest($id_borrar);
	$objBorrar->eliminar();
	return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        $objInsertar = new Test($num, $id_col, $num_pre);

        echo $objInsertar->insertar();
    }
    if($id != 0){
    	$objModificar = Test::__selecTest($id);
    	$objModificar->set_numero($num);
    	$objModificar->set_num_preguntas($num_pre);
    	$objModificar->set_id_colecion($id_col);
    	$objModificar->modificar();
    }
}

?>