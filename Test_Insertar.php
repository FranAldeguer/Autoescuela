<?php
	include "clases/Test.php";
	include "clases/Coleccion.php";
?>
<html>
<head>
    <title>Insertar Alumnos</title>
    <script src="lib/test_scripts.js" type="text/javascript"></script>
    <script src="lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <meta charset="UTF-8" />
</head>
<body>
	<?
    include 'header_paneldecontrol.php';
    ?>
    <div class="formulario">
        <form action="controles/Control_tests.php" method="post" align ="center" name ="formtest" id="formtest">
            <h2>INSERTAR TEST</h2>
            <table align ="center">
                <tr><td>Número del test:</td><td> <input type="text" name="inputnum" id="inputnum"></td></tr>
                <tr><td>Número de preguntas:</td><td> <input type="text" name="inputpre" id="inputpre"> </td></tr>
                <tr><td>Colección:</td><td>
                    <select name="selectidCol" id="selectidCol">
                        <option value="0">--SIN COLECCIÓN--</option>
                        <?php                            
                            $list_col = Coleccion::__getColecciones();
                            foreach ($list_col as $objprof){
                                echo "<option value='".$objprof->get_id()."'>".$objprof->get_nombre()."</option>";
                            }
                        ?>
                    </select>
                </td></tr>
            </table>
            <input type="button" value="Insertar" id="inserttest" onclick="insertar_modificar()">
            <input type="reset" value="Cancelar" onclick="cancelar()">
            <input type="hidden" id="inputid" name ="inputid" value="0">
        </form>
    </div>
    
    <div class="listado">
        <table border = 1 cellspacing=0 cellpadding=2 align="center" id="listadotabla">
            <?php
                //Esto muestra el encabezado de la tabla con los valores que se le pasan en el array de la clase Alumno
                foreach(Test::$arrList as $key => $value){
                    $tabla.="<th>".$value."</th>";
                }
                $tabla.="<th>Eliminar</th><th>Modificar</th>";

                $list_test = Test::__getTest();
                //Con esto se puede usar el objeto del array
                foreach ($list_test as $objAlu){
                    //Convertir un objeto a un array asociativo
                   // $arrayobj = get_class_vars(get_class($objAlu));
                    //Crear los tr y le pone la id del objeto como class
                    $tabla.= "<tr id='".$objAlu->{'id'}."'>";
                    foreach (Test::$arrList as $key => $value){
                        //Aquí se rellenan los <td> con los datos del objeto
                        //Y se le pone al class del <td> el nombre del valor que contiene
                        $tabla.="<td class='".$key."' style='cursor: pointer' onClick='alert(".$objAlu->{'id'}.")'>".$objAlu->{$key}."</td>";
                    }
                    //Añade el botón de borrar y modificar
                    $tabla.="<td align='center'><img src='img/borrar.jpg' onclick='borrar(".$objAlu->{'id'}.", \"".$objAlu->{'numero'}."\", this)' height='25px' width='25px'></td>";
                    $tabla.="<td align='center'><img src='img/modificar.png' onclick='cargardatos(".$objAlu->{'id'}.")' height='25px' width='25px'></td>";
                    $tabla.="</tr>";
                }
                echo $tabla;
            ?>
        </table>
    </div>
</body>
</html>