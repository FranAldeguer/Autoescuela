<?php
include '../clases/Carnet.php';
$id = $_POST['inputid'];

$nom = $_POST['inputnom'];
$desc = $_POST['inputdesc'];
$pre = $_POST['inputpre'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_car = $_REQUEST['id_car'];
//Borrar un Carnet
if($js == "borrar_usuario"){
    $car = Carnet::__selecCarnet($id_car);
    $car->eliminar();
    return;
}else{
    //Insertar un nuevo carnet desde Carnet_Insertar.php
    if($id == 0){
        $car = new Carnet($nom, $desc, $pre);

        echo $car->insertar();
    }
    //Modificar un Alumno
    if($id != 0){
        $car = Carnet::__selecCarnet($id);

        $car->set_nombre($nom);
        $car->set_descripcion($desc);
        $car->set_precio($pre);
        $car->modificar();
    }
}
?>