<?	include 'clases/Alumno.php';
	include 'clases/Profesor.php';?>

<html>
<head>
    <title>Insertar Alumnos</title>
    <script src="lib/alum_scripts.js" type="text/javascript"></script>
    <script src="lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/base.css" type="text/css" media="all"> 
    <meta charset="UTF-8" />
</head>
<body>
    <?
    include 'header_paneldecontrol.php';
    ?>
    <div class="formulario">
        <form action="controles/Control_alumnos.php" method="post" align ="center" name ="forminsertar" id="forminsertar">
            <h2>INSERTAR ALUMNO</h2>
            <div class = "registro_fila">
                <div class = "registro_form_eti">DNI:</div>
                <div class = "registro_form_campo"><input type="text" name ="inputdni" id="inputdni"></div>
            </div>
            <div class="registro_fila">
            	<div class="registro_form_eti">Nombre:</div>
            	<div class="registro_form_campo"><input type="text" name="inputnombre" id="inputnombre"></div>
            </div>
            <div class="registro_fila">
            	<div class="registro_form_eti">Apellidos:</div>
            	<div class="registro_form_campo"><input type="text" name="inputapellidos" id="inputapellidos"></div>
            </div>
            <div class="registro_fila">
            	<div class="registro_form_eti">Fecha de nacimiento:</div>
            	<div class="registro_form_campo"><input type="text" name="inputfecha_nac" id="inputfecha_nac"></div>
            </div>
            <div class="registro_fila">
            	<div class="registro_form_eti">Telefono:</div>
            	<div class="registro_form_campo"><input type="text" name="inputtelefono" id="inputtelefono"></div>
            </div>
            <div class="registro_fila">
            	<div class="registro_form_eti">E-Mail:</div>
            	<div class="registro_form_campo"><input type="text" name="inputmail" id="inputmail"></div>
            </div>
            <div class="registro_fila">
            	<div class="registro_form_eti">Profesor:</div>
            	<div class="registro_form_campo">
                	<select name="selectid_profesor" id="selectid_profesor">
                        <option value="0">--SIN PROFESOR--</option>
                        <?
                        	$arr = Array('practico' => '1');
                            $list_prof = Profesor::__getProfesores($arr);
                            foreach ($list_prof as $objprof){
                                echo "<option value='".$objprof->get_id()."'>".$objprof->get_nombre()." ". $objprof->get_apellidos()."</option>";
                            }
                        ?>
                    </select>
            	</div>
            </div>
            
            <div class="form_btns">
                <button type="button" id="btninsert" onclick="insertar_modificar()">Insertar</button>
	            <button type="reset" onclick="cancelar()">Cancelar</button>
            </div>
                
           
            <input type="hidden" id="inputid" name ="inputid" value="0">
        </form>
    </div>
    
    <div class="listado">
        <table border = 1 cellspacing=0 cellpadding=2 align="center" id="listadotabla">
            <?php
            	// TODO En vez de hacerlo por tabla, hacerlo por divs
                //Esto muestra el encabezado de la tabla con los valores que se le pasan en el array de la clase Alumno
                foreach(Alumno::$arrList as $key => $value){
                    $tabla.="<th>".$value."</th>";
                }
                $tabla.="<th>Eliminar</th><th>Modificar</th>";

                $listObj = Alumno::__getAlumnos();
                //Con esto se puede usar el objeto del array
                foreach ($listObj as $obj){
                    //Crear los tr y le pone la id del objeto como id del tr
                    $tabla.= "<tr id='".$obj->{'id'}."'>";
                    foreach (Alumno::$arrList as $key => $value){
                        //Aquí se rellenan los <td> con los datos del objeto
                        //Y se le pone al class del <td> el nombre del valor que contiene'alert()'
                        //if ($key == "id_prof"){
                        	//$prof = Profesor::selecProf($obj->{$key});
                        	//$tabla.="<td class='".$key."' style='cursor: pointer'  onclick= \"window.location='http://localhost/ProyectoAutoescuela/Alumno_detalle.php?usuario=".$obj->{'id'}."'\" value =".$prof->get_id().">".$prof->get_nombre()." ".$prof->get_apellidos()."</td>";
                        //}else{
							$tabla.="<td class='".$key."' style='cursor: pointer'  onclick= \"window.location='http://localhost/ProyectoAutoescuela/Alumno_detalle.php?usuario=".$obj->{'id'}."'\">".$obj->{$key}."</td>";
						//}
						
                    }
                    //Añade el botón de borrar y modificar
                    $tabla.="<td align='center'><img src='img/borrar.jpg' onclick='borrar(".$obj->{'id'}.", \"".$obj->{'nombre'}."\", this)' height='25px' width='25px' style='cursor: pointer'></td>";
                    $tabla.="<td align='center'><img src='img/modificar.png' onclick='cargardatos(".$obj->{'id'}.")' height='25px' width='25px' style='cursor: pointer'></td>";
                    $tabla.="</tr>";
                }
                echo $tabla;
            ?>
        </table>
    </div>
</body>
</html>