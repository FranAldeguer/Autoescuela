<?php
include '../clases/Profesor.php';
$id = $_POST['inputid'];

$dni = $_POST['inputdni'];
$nom = $_POST['inputnom'];
$ape = $_POST['inputape'];
$telf = $_POST['inputtelf'];
$mail = $_POST['inputmail'];
$enc = $_POST['inputencargado'];
$prac = $_POST['inputpractico'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_prof = $_REQUEST['id_prof'];
//Borrar un Alumno
if($js == "borrar_usuario"){
    $prof = Profesor::selecProf($id_prof);
    $prof->eliminar();
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        if($telf == ''){
            $telf = 0;
        }
        $prof = new Profesor($dni, $nom, $ape, $mail, $telf, $prac, $enc);
        
        
        echo $prof->insertar();
    }
    else{
        $prof = Profesor::selecProf($id);
        $prof->set_dni($dni);
        $prof->set_nombre($nom);
        $prof->set_apellidos($ape);
        $prof->set_telefono($telf);
        $prof->set_mail($mail);
        $prof->set_encargado($enc);
        $prof->set_practico($prac);
        $prof->modificar();
    }
}

?>