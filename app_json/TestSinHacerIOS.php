<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$id_alum_car = $_REQUEST['alumcar'];
$id_colec = $_REQUEST['colec'];

//$id_alum_car =7;
//$id_colec =3;

$sql = "SELECT * FROM test WHERE id_coleccion = ".$id_colec." AND id NOT IN (SELECT id_test FROM alum_test WHERE id_alum_carnet = ".$id_alum_car.")";

$con = $db->query($sql, PDO::FETCH_ASSOC);

$arr = array();
foreach($con as $row){
	$arr[] = $row;
}
if(count($arr) != 0){
	echo json_encode($arr);
}else{
	return "vacio";
}