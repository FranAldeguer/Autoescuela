<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$id_colec = $_REQUEST['colec'];

//$id_colec =3;

$sql = "SELECT * FROM test WHERE id_coleccion = ".$id_colec;

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