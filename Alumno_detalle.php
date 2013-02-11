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
	<input type="button" onclick ="window.location='Alumno_insertar.php'" value="Volver">
	<?php 
	$user = $_GET['usuario'];
	$alu = Alumno::__selecAlum($user);
	//$alu->mostrar();
	?>
	<table>
	<tr><th colspan="2">Datos del alumno</th></tr>
	<?php 
	foreach (Alumno::$arrList as $key => $value){
		if($key == 'id_prof'){
		$pro = Profesor::selecProf($alu->{$key});
			echo "<tr><td>".$value."</td><td>".$pro->get_nombre()." ".$pro->get_apellidos()."</td></tr>";
		}else{
			echo "<tr><td>".$value."</td><td>".$alu->{$key}."</td></tr>";
		}
	}
	?>
	</table>
	
	<table id = "lista_carnet_alumno">
	<tr><th colspan="4">Carnets</th></tr>
	<tr><th>Carnet</th><th>¿Terminado?</th><!-- <th>Examen Teórico</th><th>Fallos</th>-->
	<?php 
	$arr_alumcar = Alum_carnet::__getAlum_carnet(array('id_alumno' => $user));
	foreach ($arr_alumcar as $obj){
		$car = Carnet::__selecCarnet($obj->get_id_carnet());
		$term = $obj->get_terminado();
		if($term == 1){
			$term = "SI";
		}else{
			$term = "NO";
		}
			echo "<tr value='".$obj->get_id()."'>";
			echo "<td>".$car->get_nombre()."</td><td align = 'center'>".$term."</td>";//."<td>".$examteo->get_fecha()."</td><td>".$examteo->get_fallos()."</td>";
			echo "</tr>";
	}
	?>
	</table>
	
	<table id="lista_examen_carnet">
	<tr><th colspan="4">Examen teórico</th></tr>
	<?php 
		$idalumnocarnet = $_REQUEST['idalumnocarnet'];
		$idalumnocarnet = 1;
		$arr_teor = array('id_alum_carnet'=> $idalumnocarnet);
		echo "<tr onclick = >";
		foreach(ExamenTeorico::$arrList as $key=>$value){
			echo "<th>".$value."</th>";
		}
		echo "</tr>";
		
		$listObj = ExamenTeorico::__getExamen($arr_teor);
		//Con esto se puede usar el objeto del array
		foreach ($listObj as $obj){
			//Crear los tr y le pone la id del objeto como id del tr
			echo "<tr id='".$obj->{'id'}."'>";
			foreach (ExamenTeorico::$arrList as $key => $value){
				//Aquí se rellenan los <td> con los datos del objeto
				//Y se le pone al class del <td> el nombre del valor que contiene'alert()'
				echo "<td class='".$key."' align = 'center'>".$obj->{$key}."</td>";
		
			}
			echo "</tr>";
		}
	?>
	</table>
	
</body>
</html>