<?php
include '../clases/Alumno.php';
$id = $_POST['inputid'];

$dni = $_POST['inputdni'];
$nom = $_POST['inputnom'];
$ape = $_POST['inputape'];
$fnac = $_POST['inputfecha_nac'];
$telf = $_POST['inputtelf'];
$mail = $_POST['inputmail'];
$id_prof = $_POST['selectidprof'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_alu = $_REQUEST['id_alu'];
//Borrar un Alumno
if($js == "borrar_usuario"){
    $alu = Alumno::__selecAlum($id_alu);
    $alu->eliminar();
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        if($telf == ''){
            $telf = 0;
        }
        $alu = new Alumno($dni, $nom, $ape, $fnac, $telf, $mail);
        $alu->set_id_prof($id_prof);

        echo $alu->insertar();
    }
    //Modificar un Alumno
    if($id != 0){
        $alu = Alumno::__selecAlum($id);
        $alu->set_dni($dni);
        $alu->set_nombre($nom);
        $alu->set_apellidos($ape);
        $alu->set_fecha_nac($fnac);
        $alu->set_telefono($telf);
        $alu->set_mail($mail);
        $alu->set_id_prof($id_prof);
        $alu->modificar();
    }
}
?>