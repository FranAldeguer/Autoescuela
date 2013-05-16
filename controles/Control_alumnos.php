<?php
include '../clases/Calumno.php';
$id      = $_POST['inputid'];
$dni     = $_POST['inputdni'];
$nom     = $_POST['inputnombre'];
$ape     = $_POST['inputapellidos'];
$fnac    = $_POST['inputfecha_nac'];
$telf    = $_POST['inputtelefono'];
$mail    = $_POST['inputmail'];
$id_prof = $_POST['selectid_profesor'];

$accion        = $_REQUEST['funcion']; //Esta variable comprueba a que función hay que ir (borrar, modificar…)
$id_borrar = $_REQUEST['id_borrar'];

//Borrar un Alumno
if($accion == "borrar_registro"){
    Calumno::__delete($id_borrar);
    return;
}else{
    //Insertar un nuevo alumno desde Alumnos_Insertar.php
    if($id == 0){
        if($telf == ''){
            $telf = 0;
        }
        $objInsertar = new Calumno();
        $objInsertar->dni         = $dni;
        $objInsertar->nombre      = $nom;
        $objInsertar->apellidos   = $ape;
        $objInsertar->fecha_nac   = $fnac;
        $objInsertar->telefono    = $telf;
        $objInsertar->mail        = $mail;
        $objInsertar->id_profesor = $id_prof;

        echo $objInsertar->insert();
    }
    //Modificar un Alumno
    if($id != 0){
        $objModificar = Calumno::__getObj($id);
        $objModificar->dni         = $dni;
        $objModificar->nombre      = $nom;
        $objModificar->apellidos   = $ape;
        $objModificar->fecha_nac   = $fnac;
        $objModificar->telefono    = $telf;
        $objModificar->mail        = $mail;
        $objModificar->id_profesor = $id_prof;
        $objModificar->update();
    }
}
?>