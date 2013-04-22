<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$sql = "SELECT * FROM autoescuela";

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