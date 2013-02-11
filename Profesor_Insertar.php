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
        <form action="controles/Control_profesores.php" method="post" align ="center" name ="forminsertar" id="forminsertar" >
            <h2>INSERTAR PROFESOR</h2>
            <table align = "center">
                <tr><td>DNI:</td><td> <input type="text" name ="inputdni" id="inputdni"> </td></tr>
                <tr><td>Nombre:</td><td> <input type="text" name="inputnombre" id="inputnombre"></td></tr>
                <tr><td>Apellidos:</td><td> <input type="text" name="inputapellidos" id="inputapellidos"> </td></tr>
                <tr><td>Telefono:</td><td> <input type="text" name="inputtelefono" id="inputtelefono"></td></tr>
                <tr><td>E-Mail:</td><td> <input type="text" name="inputmail" id="inputmail"></td></tr>
                <tr><td>Practico:</td><td><input type="checkbox" name="inputpractico" id="inputpractico"></td></tr>
                <tr><td>Encargado:</td><td><input type="checkbox" name="inputencargado" id="inputencargado"></td></tr>
            </table>
            <input type="button" value="Insertar" id="btninsert" onclick="insertar_modificar()">
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

                $listObj = Profesor::__getProfesores();
                //Con esto se puede usar el objeto del array
                foreach ($listObj as $obj){
                    //Convertir un objeto a un array asociativo
                   // $arrayobj = get_class_vars(get_class($obj));
                    //Crear los tr y le pone la id del objeto como class
                    $tabla.= "<tr id='".$obj->{'id'}."'>";
                    foreach (Profesor::$arraylist as $key => $value){
                        //Aquí se rellenan los <td> con los datos del objeto
                        //Y se le pone al class del <td> el nombre del valor que contiene
                        $tabla.="<td class='".$key."' >".$obj->{$key}."</td>";
                        
                    }
                    
                    if($obj->practico == 0){
                            $tabla.="<td class='practico' align='center' value = '".$obj->get_practico()."'><img src='img/cross.png' height='25px' width='25px'></td>";
                    }else{
                            $tabla.="<td class='practico' align='center' value = '".$obj->get_practico()."'><img src='img/tick.png' height='25px' width='25px'></td>";
                    }
                    if($obj->encargado == 0){
                            $tabla.="<td class='encargado' align='center' value = '".$obj->get_encargado()."'><img src='img/cross.png' height='25px' width='25px'></td>";
                    }else{
                            $tabla.="<td class='encargado' align='center' value = '".$obj->get_encargado()."'><img src='img/tick.png' height='25px' width='25px'></td>";
                    }
                    
                    //Añade el botón de borrar y modificar
                    $tabla.="<td align='center'><img src='img/borrar.jpg' onclick='borrar(".$obj->{'id'}.", \"".$obj->{'nombre'}."\", this)' height='25px' width='25px'></td>";
                    $tabla.="<td align='center'><img src='img/modificar.png' onclick='cargardatos(".$obj->{'id'}.")' height='25px' width='25px'></td>";
                    $tabla.="</tr>";
                }
                echo $tabla;
            ?>
        </table>
    </div>
</body>
</html>