<?php include "clases/ExamenTeorico.php"?>
<html>
<head>
    <title>Insertar Alumnos</title>
    <script src="lib/examteorico_scripts.js" type="text/javascript"></script>
    <script src="lib/jquery-1.8.2.min.js" type="text/javascript"></script>
    <meta charset="UTF-8" />
</head>
<body>
	<?
    include 'header_paneldecontrol.php';
    ?>
    <div class="formulario">
        <form action="controles/Control_examenteorico.php" method="post" align ="center" name ="forminsertar" id="forminsertar">
            <h2>INSERTAR ALUMNO</h2>
            <table align ="center">
                <tr><td>Fecha:</td><td> <input type="text" name ="inputfecha" id="inputfecha"> </td></tr>
                <tr><td>Fallos:</td><td> <input type="text" name="inputfallos" id="inputfallos"></td></tr>
                <tr><td>Profesor:</td><td>
                    <select name="selectid_alum_carnet" id="selectid_alum_carnet">
                        <option value="0">--SIN ID_ALUM_CARNET--</option>
                        <?php                            
                            $list_prof = Profesor::__getProfesores();
                            foreach ($list_prof as $objprof){
                                echo "<option value='".$objprof->get_id()."'>".$objprof->get_nombre()." ". $objprof->get_apellidos()."</option>";
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
</body>
</html>