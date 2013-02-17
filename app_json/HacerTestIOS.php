<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$id_alum_car = $_REQUEST['alumcar'];
$id_test = $_REQUEST['test'];
$fallos = $_REQUEST['fallos'];
/*
$id_alum_car =7;
$id_test = 10;
$fallos = 4;*/

$sql = "INSERT into alum_test(id_alum_carnet, id_test, fallos, fecha) VALUES(".$id_alum_car.", ".$id_test.", ".$fallos.", NOW())";

//$consulta = $db->prepare($sql);
//$consulta->execute();

$consulta = $db->exec($sql);

//if ($consulta->errorInfo[0] == 00000) {

if($consulta != 0){
	echo 1;
	
} else {
	echo 0;
}

//echo json_encode($r);
?>