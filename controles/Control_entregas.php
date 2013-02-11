<?php
include '../clases/Entrega.php';
$id = $_POST['inputid'];

$fecha = $_POST['inputfecha'];
$cant = $_POST['inputcantidad'];
$id_alu = $_POST['selectid_alumno'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_borrar = $_REQUEST['id_borrar'];
//Borrar un Alumno
if($js == "borrar_registro"){
    $objBorrar = Entrega::__selectEntrega($id_borrar);
    $objBorrar->eliminar();
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        if($cant == ''){
            $cant = 0;
        }
        $objInsertar = new Entrega($fecha, $cant, $id_alu);

        echo $objInsertar->insertar();
    }
    //Modificar un Alumno
    if($id != 0){
        $objModificar = Entrega::__selectEntrega($id);
        $objModificar->set_fecha($fecha);
        $objModificar->set_cantidad($cant);
        $objModificar->set_id_alumno($id_alu);
        $objModificar->modificar();
    }
}
?>