<?php

include '../clases/Coleccion.php';
$id = $_POST['inputid'];

$nom = $_POST['inputnombre'];
$id_Carnet = $_POST['selectid_carnet'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que funci√≥n hay que ir (borrar, modificar‚...)
$id_borrar = $_REQUEST['id_borrar'];
//Borrar un Alumno
if($js == "borrar_registro"){
    $objBorrar = Coleccion::__selecColeccion($id_borrar);
    $objBorrar->eliminar();
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        $objInsertar = new Coleccion($nom, $id_Carnet);

        echo $objInsertar->insertar();
    }
    //Modificar un Alumno
    if($id != 0){
        $objModificar = Coleccion::__selecColeccion($id);
        $objModificar->set_nombre($nom);
        $objModificar->set_idCarnet($id_Carnet);
        $objModificar->modificar();
    }
}
?>