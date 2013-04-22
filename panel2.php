<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php

        include "conexion.php";
        
        $usuario=$_POST['user'];
        $pass=$_POST['pass'];


$sentencia="SELECT * FROM login WHERE usuario='".$usuario."' AND contrasena='".$pass."'";

$registro=mysql_query($sentencia,$conexion);

$registros=mysql_num_rows ($registro);

echo "la cantidad de registros son:".$registros;

if ($registros > 0)
{
	//Se ha identificado correctamente.
	session_start();
	$_SESSION[usuario]=$usuario;
	header ("Location: control.php");
}
else {
	//No se ha identificado correctamente.
	header ("Location: panelcontrol.php?error=si");
	}
        
        ?>
    </body>
</html>