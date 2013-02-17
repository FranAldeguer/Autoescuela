<?php
include 'clases/Alumno.php';
include 'clases/Carnet.php';
include 'clases/Profesor.php';
include 'clases/Alum_carnet.php';
include 'clases/ExamenTeorico.php';
include 'clases/Test.php';

for($i = 5; $i<20; $i++){
$test = new Test($i, 8, 30);
$test->insertar();
$test->mostrar();
}

?>