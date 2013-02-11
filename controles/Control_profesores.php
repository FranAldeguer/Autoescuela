<?php
include '../clases/Profesor.php';
$id = $_POST['inputid'];

$dni = $_POST['inputdni'];
$nom = $_POST['inputnombre'];
$ape = $_POST['inputapellidos'];
$telf = $_POST['inputtelefono'];
$mail = $_POST['inputmail'];
$enc = $_POST['inputencargado'];
$prac = $_POST['inputpractico'];

$js = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_borrar = $_REQUEST['id_borrar'];
//Borrar un Alumno
if($js == "borrar_registro"){
    $objBorrar = Profesor::selecProf($id_borrar);
    $objBorrar->eliminar();
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        if($telf == ''){
            $telf = 0;
        }
        $objInsertar = new Profesor($dni, $nom, $ape, $mail, $telf, $prac, $enc);
        
        
        echo $objInsertar->insertar();
    }
    else{
        $objModificar = Profesor::selecProf($id);
        $objModificar->set_dni($dni);
        $objModificar->set_nombre($nom);
        $objModificar->set_apellidos($ape);
        $objModificar->set_telefono($telf);
        $objModificar->set_mail($mail);
        $objModificar->set_encargado($enc);
        $objModificar->set_practico($prac);
        $objModificar->modificar();
    }
}

?>