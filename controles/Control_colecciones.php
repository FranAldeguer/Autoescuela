<?php

include '../clases/Coleccion.php';
$id = $_POST['inputid'];

$nom = $_POST['inputnom'];
$id_Carnet = $_POST['selectidCar'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que funci√≥n hay que ir (borrar, modificar‚...)
$id_col = $_REQUEST['id_col'];
//Borrar un Alumno
if($js == "borrar_usuario"){
    $col = Coleccion::__selecColeccion($id_col);
    $col->eliminar();
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        $newcol = new Coleccion($nom, $id_Carnet);

        echo $newcol->insertar();
    }
    //Modificar un Alumno
    if($id != 0){
        $col = Coleccion::__selecColeccion($id);
        $col->set_nombre($nom);
        $col->set_id_prof($id_prof);
        $col->modificar();
    }
}
?>