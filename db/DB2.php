 <?php
// FUNCIÓN DE CONEXIÓN CON LA BASE DE DATOS MYSQL
function conectaDb($DB)
{
	try {
		//$db = new PDO('mysql:host=localhost;dbname=Autoescuela', root, root);
		$db = new PDO('mysql:host=localhost;dbname='.$BD, 'root', 'root');
		$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
		return($db);
	} catch (PDOException $e) {
		cabecera('Error grave');
		print "<p>Error: No puede conectarse con la base de datos.</p>\n";
		//      print "<p>Error: ".$e->getMessage()."</p>\n";
		pie();
		exit();
	}
}
?>