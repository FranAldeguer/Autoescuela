<?php
$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');

$dni = $_REQUEST['userDNI'];
$pass = $_REQUEST['userPASS'];

//$dni = "dniFran";
//$pass = "passwd";

$sql = "SELECT * FROM alumno WHERE dni = '".$dni."' and pass = '".$pass."'";
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

?>