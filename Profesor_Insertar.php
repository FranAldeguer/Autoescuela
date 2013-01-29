<?php
include 'clases/Profesor.php';
?>
<html>
<head>
    <title>Insertar Profesores</title>
    <script src="lib/prof_scripts.js" type="text/javascript"></script>
    <script src="lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <meta charset="UTF-8" />
</head>
<body>
    <?php
    include 'header_paneldecontrol.php';
    ?>
    <div class="formulario">
        <form action="controles/Control_profesores.php" method="post" align ="center" name ="formprof" id="formprof">
            <h2>INSERTAR PROFESOR</h2>
            <table style="text-align: center">
                <tr><td>DNI:</td><td> <input type="text" name ="inputdni" id="inputdni"> </td></tr>
                <tr><td>Nombre:</td><td> <input type="text" name="inputnom" id="inputnombre"></td></tr>
                <tr><td>Apellidos:</td><td> <input type="text" name="inputape" id="inputapellidos"> </td></tr>
                <tr><td>Telefono:</td><td> <input type="text" name="inputtelf" id="inputtelefono"></td></tr>
                <tr><td>E-Mail:</td><td> <input type="text" name="inputmail" id="inputmail"></td></tr>
                <tr><td>Practico:</td><td><input type="checkbox" name="inputpractico" id="inputpractico"></td></tr>
                <tr><td>Encargado:</td><td><input type="checkbox" name="inputencargado" id="inputencargado"></td></tr>
            </table>
            <input type="button" value="Insertar" id="insertprof" onclick="insertar_modificar()">
            <input type="reset" value="Cancelar" onclick="cancelar()">
            <input type="hidden" id="inputid" name ="inputid" value="0">
        </form>
    </div>
    
    <div class="listado">
        <table border = 1 cellspacing=0 cellpadding=2 align="center" id="listadotabla">
            <?php
                //Esto muestra el encabezado de la tabla con los valores que se le pasan en el array de la clase Alumno
                foreach(Profesor::$arraylist as $key => $value){
                    $tabla.="<th>".$value."</th>";
                }
                $tabla.="<th>Práctico</th><th>Encargado</th><th>Eliminar</th><th>Modificar</th>";

                $list_prof = Profesor::__getProfesores();
                //Con esto se puede usar el objeto del array
                foreach ($list_prof as $objProf){
                    //Convertir un objeto a un array asociativo
                   // $arrayobj = get_class_vars(get_class($objProf));
                    //Crear los tr y le pone la id del objeto como class
                    $tabla.= "<tr id='".$objProf->{'id'}."'>";
                    foreach (Profesor::$arraylist as $key => $value){
                        //Aquí se rellenan los <td> con los datos del objeto
                        //Y se le pone al class del <td> el nombre del valor que contiene
                        $tabla.="<td class='".$key."' >".$objProf->{$key}."</td>";
                        
                    }
                    
                    if($objProf->practico == 0){
                            $tabla.="<td class='practico' align='center' value = '".$objProf->get_practico()."'><img src='img/cross.png' height='25px' width='25px'></td>";
                    }else{
                            $tabla.="<td class='practico' align='center' value = '".$objProf->get_practico()."'><img src='img/tick.png' height='25px' width='25px'></td>";
                    }
                    if($objProf->encargado == 0){
                            $tabla.="<td class='encargado' align='center' value = '".$objProf->get_encargado()."'><img src='img/cross.png' height='25px' width='25px'></td>";
                    }else{
                            $tabla.="<td class='encargado' align='center' value = '".$objProf->get_encargado()."'><img src='img/tick.png' height='25px' width='25px'></td>";
                    }
                    
                    //Añade el botón de borrar y modificar
                    $tabla.="<td align='center'><img src='img/borrar.jpg' onclick='borrar(".$objProf->{'id'}.", \"".$objProf->{'nombre'}."\", this)' height='25px' width='25px'></td>";
                    $tabla.="<td align='center'><img src='img/modificar.png' onclick='cargardatos(".$objProf->{'id'}.")' height='25px' width='25px'></td>";
                    $tabla.="</tr>";
                }
                echo $tabla;
            ?>
        </table>
    </div>
</body>
</html>