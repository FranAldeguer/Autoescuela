<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$id_alum_car = $_REQUEST['alumcar'];
//$id_colec = $_REQUEST['colec'];

//$id_alum_car =7;
//$id_colec =3;

$sql = "SELECT t.*, min(alt.fallos) as fallos FROM alum_test as alt, test as t where id_alum_carnet= ".$id_alum_car." AND t.id = alt.id_test GROUP BY id_test order by fallos desc LIMIT 0, 10";

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