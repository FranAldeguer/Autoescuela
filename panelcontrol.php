<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
session_start();
session_destroy();
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <script>
        function validar(formulario){

           

            if(formulario.user.value==''){
            alert('Inserta tu nombre de usuario');
            formulario.user.focus();
            return false;
        }
        

        if(formulario.pass.value==''){
            alert('Inserta tu contraseña');
            formulario.pass.focus();
            return false;
        }
        return true;
        }


        
       
        </script>
        <h1 align="center">Panel de Control</h1>

        <table align="center" border="0" width="300">
            <form action="panel2.php" method="post" onsubmit="return validar(this)">
            <tr>
                <td>
                    Usuario:
                </td>
                <td>
                    <input type="text" name="user">
                </td>
            </tr>
            <tr>
                <td>
                    Contrase&ntilde;a:
                </td>
                <td>
                    <input type="password" name="pass">
                </td>
            </tr>
            <tr align="center">
                <td>
                    <input  type="submit" value="Enviar">
                </td>
                <td>
                    <input type="reset" value="Borrar">
                </td>
            </tr>
            </form>
        </table>

        <?php
        // put your code here
        ?>
    </body>
</html>
