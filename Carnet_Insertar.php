<?php include 'clases/Carnet.php'; ?>
<html>
<head>
    <title>Insertar Carnets</title>
    <script src="lib/carnet_scripts.js" type="text/javascript"></script>
    <script src="lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <?php
    include 'header_paneldecontrol.php';
    ?>
    <div class="formulario">
        <form action="controles/Control_carnet.php" method="post" align ="center" name ="forminsertar" id="forminsertar">
            <h2>INSERTAR CARNET</h2>
            <table align ="center">
                <tr><td>Nombre:</td><td> <input type="text" name ="inputnombre" id="inputnombre"> </td></tr>
                <tr><td>Precio:</td><td> <input type="text" name="inputprecio" id="inputprecio"> </td></tr>
                <tr><td>Descripción:</td><td> <textarea name="inputdescripcion" id="inputdescripcion" cols="25" rows="10"></textarea></td></tr>
            </table>
            <input type="button" value="Insertar" id="btninsert" onclick="insertar_modificar()">
            <input type="button" value="Cancelar" onclick="cancelar()">
            <input type="hidden" id="inputid" name ="inputid" value="0">
        </form>
    </div>
    
    <div class="listado">
        <table border = 1 cellspacing=0 cellpadding=2 align="center" id="listadotabla">
            <?php
                //Esto muestra el encabezado de la tabla con los valores que se le pasan en el array de la clase Alumno
                foreach(Carnet::$arrlist as $key => $value){
                    $tabla.="<th>".$value."</th>";
                }
                $tabla.="<th>Eliminar</th><th>Modificar</th>";

                $listObj = Carnet::__getCarnets();
                //Con esto se puede usar el objeto del array
                foreach ($listObj as $obj){
                    //Convertir un objeto a un array asociativo
                   // $arrayobj = get_class_vars(get_class($obj));
                    //Crear los tr y le pone la id del objeto como class
                    $tabla.= "<tr id='".$obj->{'id'}."'>";
                    foreach (Carnet::$arrlist as $key => $value){
                        //Aquí se rellenan los <td> con los datos del objeto
                        //Y se le pone al class del <td> el nombre del valor que contiene
                        $tabla.="<td class='".$key."'>".$obj->{$key}."</td>";
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
