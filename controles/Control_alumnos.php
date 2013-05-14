<?php
include '../clases/Alumno.php';
$id      = $_POST['inputid'];
$dni     = $_POST['inputdni'];
$nom     = $_POST['inputnombre'];
$ape     = $_POST['inputapellidos'];
$fnac    = $_POST['inputfecha_nac'];
$telf    = $_POST['inputtelefono'];
$mail    = $_POST['inputmail'];
$id_prof = $_POST['selectid_profesor'];

$js        = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_borrar = $_REQUEST['id_borrar'];

//Borrar un Alumno
if($js == "borrar_registro"){
    $objBorrar = Alumno::__selecAlum($id_borrar);
    $objBorrar->eliminar();
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        if($telf == ''){
            $telf = 0;
        }
        $objInsertar = new Alumno($dni, $nom, $ape, $fnac, $telf, $mail);
        $objInsertar->set_id_prof($id_prof);

        echo $objInsertar->insertar();
    }
    //Modificar un Alumno
    if($id != 0){
        $objModificar = Alumno::__selecAlum($id);
        $objModificar->set_dni($dni);
        $objModificar->set_nombre($nom);
        $objModificar->set_apellidos($ape);
        $objModificar->set_fecha_nac($fnac);
        $objModificar->set_telefono($telf);
        $objModificar->set_mail($mail);
        $objModificar->set_id_prof($id_prof);
        $objModificar->modificar();
    }
}
?>