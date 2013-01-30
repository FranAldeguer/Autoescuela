<?php
    include 'clases/Coleccion.php';
    include 'clases/Carnet.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Insertar Colección</title>
    <script src="lib/coleccion_scripts.js" type="text/javascript"></script>
    <script src="lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <meta charset="UTF-8" />
</head>
<body>
    <?
        include 'header_paneldecontrol.php';
    ?>
    <div class="formulario">
        <form action="controles/Control_colecciones.php" method="post" align ="center" name ="formcol" id="form_col">
            <h2>INSERTAR COLECCION</h2>
            <table align ="center">
                <tr><td>Nombre:</td><td> <input type="text" name="inputnom" id="inputnombre"></td></tr>
                <tr><td>Carnet:</td><td>
                    <select name="selectidcar" id="selectidcar">
                        <option value="0">--SELECCIONA UN CARNET--</option>
                        <?php                            
                            $list_carnet = Carnet::__getCarnets();
                            foreach ($list_carnet as $objcar){
                                echo "<option value='".$objcar->get_id()."'>".$objcar->get_nombre()."</option>";
                            }
                        ?>
                    </select>
                </td></tr>
            </table>
            <input type="button" value="Insertar" id="insertcol" onclick="insertar_modificar()">
            <input type="reset" value="Cancelar" onclick="cancelar()">
            <input type="hidden" id="inputid" name ="inputid" value="0">
        </form>
    </div>
    <br>
    <div class="listado">
        <table border = 1 cellspacing=0 cellpadding=2 align="center" id="listadotabla">
            <?php
                //Esto muestra el encabezado de la tabla con los valores que se le pasan en el array de la clase Coleccion
                foreach(Coleccion::$arrList as $key => $value){
                    $tabla.="<th>".$value."</th>";
                }
                $tabla.="<th>Eliminar</th><th>Modificar</th>";

                $list_col = Coleccion::__getColecciones();
                //Con esto se puede usar el objeto del array
                foreach ($list_col as $objCol){
                    //Convertir un objeto a un array asociativo
                    //Crear los tr y le pone la id del objeto como class
                    $tabla.= "<tr id='".$objCol->{'id'}."'>";
                    foreach (Coleccion::$arrList as $key => $value){
                        //Aquí se rellenan los <td> con los datos del objeto
                        //Y se le pone al class del <td> el nombre del valor que contiene
                        $tabla.="<td class='".$key."'>".$objCol->{$key}."</td>";
                    }
                    //Añade el botón de borrar y modificar
                    $tabla.="<td align='center'><img src='img/borrar.jpg' onclick='borrar(".$objCol->{'id'}.", \"".$objCol->{'nombre'}."\", this)' height='25px' width='25px'></td>";
                    $tabla.="<td align='center'><img src='img/modificar.png' onclick='cargardatos(".$objCol->{'id'}.")' height='25px' width='25px'></td>";
                    $tabla.="</tr>";
                }
                echo $tabla;
            ?>
        </table>
    </div>
    
    
</body>
</html>
