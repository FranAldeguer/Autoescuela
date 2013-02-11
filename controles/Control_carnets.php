<?php
include '../clases/Carnet.php';
$id = $_POST['inputid'];

$nom = $_POST['inputnombre'];
$desc = $_POST['inputdescripcion'];
$pre = $_POST['inputprecio'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_borrar = $_REQUEST['id_borrar'];
//Borrar un Carnet
if($js == "borrar_registro"){
    $objBorrar = Carnet::__selecCarnet($id_borrar);
    $objBorrar->eliminar();
    return;
}else{
    //Insertar un nuevo carnet desde Carnet_Insertar.php
    if($id == 0){
        $objInsertar = new Carnet($nom, $desc, $pre);

        echo $objInsertar->insertar();
    }
    //Modificar un Alumno
    if($id != 0){
        $objModificar = Carnet::__selecCarnet($id);

        $objModificar->set_nombre($nom);
        $objModificar->set_descripcion($desc);
        $objModificar->set_precio($pre);
        $objModificar->modificar();
    }
}
?>