<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$id = $_REQUEST['alumno'];
//$id = 1;

$sql = "SELECT p.* FROM profesor as p, alumno as a WHERE p.id = a.id_profesor AND a.id =".$id;

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