<?php
//Dependencias
require_once ("clases_db/CDBalumno.php");

class Calumno extends CDBalumno{

	static $arrList = Array('id' => 'id','dni' => 'dni','nombre' => 'nombre','apellidos' => 'apellidos','fecha_nac' => 'fecha_nac','telefono' => 'telefono','mail' => 'mail','id_profesor' => 'id_profesor','pass' => 'pass');

	/**
	 *Constructor de la clase Calumno
	 */
	public function Calumno(){
		parent::CDBalumno();
	}

	/**
	 * Devuelve un objeto de tipo Calumno
	 * @param int $id
	 * @return Calumno
	 */
	public static function __getObj($id){
		//Recoger los resultados de la BD
		//Solo debe de devolver 1
		$sql = "SELECT * FROM alumno WHERE id = ".$id;

		$q = DB::get()->query($sql, PDO::FETCH_ASSOC);

		//Inicializar un objeto con los valores devueltos
		foreach ($q as $arr){
			$temp = self::_inicializar($arr);
		}

		return $temp;
	}



	/**
	 * Devuelve un listado con objetos  según los parametros que le pasemos
	 * @param array $info
	 * @param string $order
	 * @param array $filtros
	 * @return array Calumno
	 */
	public static function __getListado(&$info, $order = "id asc", $filtros=""){
		//Query
		$sql = "SELECT * FROM alumno WHERE 1 = 1";

		//Filtros de busqueda
		if(isset($filtros["id"])) $sql.=" and id = '".$filtros["id"]."'";
		if(isset($filtros["dni"])) $sql.=" and dni = '".$filtros["dni"]."'";
		if(isset($filtros["nombre"])) $sql.=" and nombre = '".$filtros["nombre"]."'";
		if(isset($filtros["apellidos"])) $sql.=" and apellidos = '".$filtros["apellidos"]."'";
		if(isset($filtros["fecha_nac"])) $sql.=" and fecha_nac = '".$filtros["fecha_nac"]."'";
		if(isset($filtros["telefono"])) $sql.=" and telefono = '".$filtros["telefono"]."'";
		if(isset($filtros["mail"])) $sql.=" and mail = '".$filtros["mail"]."'";
		if(isset($filtros["id_profesor"])) $sql.=" and id_profesor = '".$filtros["id_profesor"]."'";
		if(isset($filtros["pass"])) $sql.=" and pass = '".$filtros["pass"]."'";

		//Filtros de orden
		$sql.=" ORDER BY ".$order;

		//Recoger los valores de la BD
		$q = DB::get()->query($sql, PDO::FETCH_ASSOC);
		$info["num"] = $q->rowCount();

		//Creamos un array de pruebas vacío
		$arrPru = Array();

		//Recogemos los datos e inicializamos objetos con esos valores
		//Cada objeto lo metemos dentro del array
		foreach ($q as $cObj){
			$temp = self::_inicializar($cObj);
			$arrPru[] = $temp;
		}

		return $arrPru;
	}
}
?>