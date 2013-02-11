<?php
include 'clases/Alumno.php';
include 'clases/Carnet.php';
include 'clases/Profesor.php';
include 'clases/Alum_carnet.php';
include 'clases/ExamenTeorico.php';
?>

<html>
<head>
<meta charset="UTF-8" />
</head>
<body>
<table>
	<?php 
	$listObj = ExamenTeorico::__getExamen($arr_teor);
		foreach ($listObj as $obj){
			//Crear los tr y le pone la id del objeto como id del tr
			echo "<tr>";
			foreach (ExamenTeorico::$arrList as $key => $value){
				//Aquí se rellenan los <td> con los datos del objeto
				//Y se le pone al class del <td> el nombre del valor que contiene'alert()'
				echo "<td>".$obj->{$key}."</td>";
			}
			echo "</tr>";
		}
	?>
</table>
	
	
</body>
</html>