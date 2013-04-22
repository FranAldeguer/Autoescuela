<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$id_alum_test = $_REQUEST['alumcar'];

//$id_alum_test =7;

$sql = "SELECT * FROM practica WHERE id_alum_carnet = ".$id_alum_test." ORDER BY fecha desc";

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