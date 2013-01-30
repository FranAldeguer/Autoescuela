<?php
include '../clases/Test.php';
$id = $_POST['inputid'];

$num = $_POST['inputnum'];
$num_pre = $_POST['inputpre'];
$id_col = $_POST['selectidCol'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_alu = $_REQUEST['id_alu'];
//Borrar un Alumno
if($js == "borrar_usuario"){
	$test = Test::__selecTest($id_alu);
	$test->eliminar();
	return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        $test = new Test($num, $id_col, $num_pre);

        echo $test->insertar();
    }
}

?>