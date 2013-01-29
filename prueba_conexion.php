<?php

include 'clases/Test.php';
//$test = new Test(1,5,30);
//$test->insertar();
/*
$test = Test::__selecTest(8);
$test->mostrar();
$test->set_numero(4);
$test->set_id_colecion(7);
$test->set_num_preguntas(40);
$test->mostrar();
$test->modificar();
 * 
 */
//$test->eliminar();
/*
$list_test = Test::__getTest();
foreach ($list_test as $obj){
    $obj->mostrar();
    echo "<br>";
}*/


include 'clases/Coleccion.php';
include 'clases/Carnet.php';
include 'clases/Alumno.php';
/*
echo "<h1> CARNET </h1>";
$arr = Array('descripcion'=>'es el');
$list_carnet = Carnet::__getCarnets($arr);
foreach ($list_carnet as $objCar){
    $objCar->mostrar();
    echo "<br>";
}



echo "<h1> ALUMNOS </h1>";
$arr = Array('nombre'=>'f');
$list_alu = Alumno::__getAlumnos($arr);
foreach ($list_alu as $objAlu){
    $objAlu->mostrar();
    echo "<br>";
}
*/
echo "<h1> COLECCION </h1>";
//$arr = Array('nombre'=>'', 'id_carnet'=>4);
$list_colec = Coleccion::__getColecciones();
foreach($list_colec as $objCol){
    $objCol->mostrar();
}


/*
$arr = Array('nombre'=>'ar');
echo $carnet = Carnet::__getCarnets($arr);
foreach($carnet as $c){
    $c->mostrar();
}
*/

$nom = "colecsao 2";
$id_car = 4;

$col = Coleccion::__selecColeccion(4);
$col->set_idCarnet(6);
$col->set_nombre("Colecsion 11");
$col->modificar();

$colec = new Coleccion($nom, $id_car);
$col->mostrar();
$colec->insertar();

/*include 'clases/Carnet.php';

$nombre = "carnet1";
$desc = "Este es el carnet 1";
$pre = 23;

$arr = Array('descripcion' => '', 'nombre'=>'b');
echo $carnet = Carnet::__getCarnets($arr);
foreach($carnet as $c){
    $c->mostrar();
}*/
//$carnet = new Carnet($nombre, $desc, $pre);
/*$carnet->mostrar();

$carnet->set_descripcion("DESCRIPCIOOOOOON");
$carnet->set_nombre("NOMBREEEEE");
$carnet->set_precio(1234577);
$carnet->mostrar();
$carnet->eliminar()*/
//$carnet->modificar();
//$carnet->insertar();
//include 'clases/Profesor.php';

/*
$arrprof = Profesor::__getProfesores();

foreach($arrprof as $objpr){
    $objpr->mostrar();
}
 * 
 */
/*$prof = Profesor::selecProf(6);
$prof->mostrar();

$prof->set_dni(1213);
$prof->set_apellidos("acho1");
$prof->set_encargado(1);
$prof->set_mail("acho1");
$prof->set_nombre("Acho1");
$prof->set_practico(1);
$prof->set_telefono(9876);

$prof->mostrar();
echo $prof->modificar();*/

/*$dni = "9876dni";
$nom = "profenom";
$ape = "profeape";
$telf = 987656789;
$mail = "prueba@prueba.com";
$prac = 0;
$enc = 1;

$prof = new Profesor($dni, $nom, $ape, $mail, $telf, $prac, $enc);
$prof->mostrar();
$prof->insertar();*/





//Codigo de las pruebas de alumno

/*include 'clases/Alumno.php';

$id = 0;

$dni = "9876";
$nom = "Prueba2";
$ape = "Prueba1";
$fnac = "2013-12-01";
$telf = 987656789;
$mail = "prueba@prueba.com";
$id_prof = 0;

    $newAlu = new Alumno($dni, $nom, $ape, $fnac, $telf, $mail);
    $newAlu->set_id_prof($id_prof);
    $result = $newAlu->insertar();
    $newAlu->insertar();
    $newAlu->insertar();
    $newAlu->insertar();
    $newAlu->insertar();
    $newAlu->insertar();
    $newAlu->insertar();
    echo $result;
*/
/*
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



/*$arr = Alumno::__selecAlum(1);
$arr->mostrar();

$arrayobj = get_class_vars(get_class($arr));

*/
/*
$list_alu = Alumno::__getAlumnos();
foreach ($list_alu as $objAlu){
    //$arrayobj = get_class_vars(get_class($objAlu));
    foreach (Alumno::$arrList as $key => $value){
        echo $value .": ". $objAlu->{$key}." - ";
    }
    echo "<br>";
}*/

?>