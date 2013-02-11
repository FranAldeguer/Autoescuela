<?php include 'clases/Alumno.php';
      include 'clases/Entrega.php';?>
     
<html>
<head>
    <title>Insertar Entregas</title>
    <script src="lib/entrega_scripts.js" type="text/javascript"></script>
    <script src="lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <meta charset="UTF-8" />
</head>
<body>
 	<?
    include 'header_paneldecontrol.php';
    ?>
    <div class="formulario">
        <form action="controles/Control_entregas.php" method="post" align ="center" name ="forminsertar" id="forminsertar">
            <h2>INSERTAR ENTREGA</h2>
            <table align ="center">
                <tr><td>Fecha:</td><td> <input type="text" name="inputfecha" id="inputfecha"></td></tr>
                <tr><td>Cantidad:</td><td> <input type="text" name="inputcantidad" id="inputcantidad"></td></tr>
                <tr><td>Profesor:</td><td>
                    <select name="selectid_alumno" id="selectid_alumno">
                        <option value="0">--SIN ALUMNO--</option>
                        <?php                            
                            $list_alu = Alumno::__getAlumnos();
                            foreach ($list_alu as $objAlu){
                                echo "<option value='".$objAlu->get_id()."'>".$objAlu->get_nombre()." ". $objAlu->get_apellidos()."</option>";
                            }
                        ?>
                    </select>
                </td></tr>
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
                foreach(Entrega::$arrList as $key => $value){
                    $tabla.="<th>".$value."</th>";
                }
                $tabla.="<th>Eliminar</th><th>Modificar</th>";

                $listObj = Entrega::__getEntrega();
                //Con esto se puede usar el objeto del array
                foreach ($listObj as $obj){
                    //Convertir un objeto a un array asociativo
                   // $arrayobj = get_class_vars(get_class($obj));
                    //Crear los tr y le pone la id del objeto como class
                    $tabla.= "<tr id='".$obj->{'id'}."'>";
                    foreach (Entrega::$arrList as $key => $value){
                        //Aquí se rellenan los <td> con los datos del objeto
                        //Y se le pone al class del <td> el nombre del valor que contiene
                        $tabla.="<td class='".$key."' style='cursor: pointer' onClick='alert(".$obj->{'id'}.")'>".$obj->{$key}."</td>";
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