<?php
include 'clases/Test.php';
$arrtest = Test::__getTest();
foreach($arrtest as $objTest){
	$objTest->mostrar();
	echo "<br>";
}
?>