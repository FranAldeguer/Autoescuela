<?php
//Dependencias
require_once ("DB.php");

class CDBalumno{

	var $id;
	var $dni;
	var $nombre;
	var $apellidos;
	var $fecha_nac;
	var $telefono;
	var $mail;
	var $id_profesor;
	var $pass;


	/**
	 *Constructor de la clase CDBalumno
	 */
	public function CDBalumno(){
		$this->ini();
	}

	/**
   	 * Funcion para insertar un nuevo objeto en la base de datos
   	 * @throws Exception -> Si hay un fallo al insertar el obj en la BD
   	 * @return int -> Id del utlimo registro insertado || int -> 0
   	 */
	public function insert(){
		try{
			//Crea la query
			$sql = "INSERT INTO alumno"; 
			$sql .= "(id, dni, nombre, apellidos, fecha_nac, telefono, mail, id_profesor, pass)";
			$sql .= "VALUES(";
			$sql .= "'".$this->id."'";
			$sql .= ",'".$this->dni."'";
			$sql .= ",'".$this->nombre."'";
			$sql .= ",'".$this->apellidos."'";
			$sql .= ",'".$this->fecha_nac."'";
			$sql .= ",'".$this->telefono."'";
			$sql .= ",'".$this->mail."'";
			$sql .= ",'".$this->id_profesor."'";
			$sql .= ",'".$this->pass."'";
			$sql .= ")";

			//Ejecuta la query
			$q = DB::get()->exec($sql);

			//Comprueba que no hay errores en la inserción
			if ($q->errorInfo[0] != 00000) throw new Exception("Error al insertar");

			//Pone el id correctamten al objeto insertado
			$this->id = DB::get()->lastInsertId();

			//Devuelve el ultimo id
			return $this->id;

		}catch(Excepction $e){
			//Muestra el mensaje de error de la excepción
			$e->getMessage();
			return false;
		}catch (PDOException $e){
			$e->getMessage();
			return false;
		}
	}



	/**
	 * Funcion para eliminar un objeto
	 * @return boolean
	 */
	public function delete(){
		//Llama al metodo estatico de borrar y le pasa el id del objeto actual
		self::__delete($this->id);
	}



	/**
	 * Funcion para eliminar un objeto
	 * @param int $id_prueba
	 * @throws Exception
	 * @return boolean
	 */
	public static function __delete($id){
		try{
			//Ejecucion de la query
			$sql = "DELETE FROM alumno WHERE id = ".$id;

			$q = DB::get()->exec($sql);

			//Comprobación de fallos
			if($q != 1) throw new Exception("Fallo al eliminar");

			return true;

		}catch (Exception $e){

			//Muestra el mensaje de error
			echo $e->getMessage();

			return false;
		}
	}



	/**
	 * Actualiza los parametros de un objeto
	 * @throws Exception
	 * @return boolean
	 */
	public function update(){
		try{
			//Ejecución de la query
			$sql = "UPDATE alumno SET";

			$sql.= " id='".$this->id."'";
			$sql.= ",  dni='".$this->dni."'";
			$sql.= ",  nombre='".$this->nombre."'";
			$sql.= ",  apellidos='".$this->apellidos."'";
			$sql.= ",  fecha_nac='".$this->fecha_nac."'";
			$sql.= ",  telefono='".$this->telefono."'";
			$sql.= ",  mail='".$this->mail."'";
			$sql.= ",  id_profesor='".$this->id_profesor."'";
			$sql.= ",  pass='".$this->pass."'";
			$sql.= " WHERE 1=1";
			$sql.= " and id = '".$this->id."'";

			//Ejecución de la query
			$q = DB::get()->exec($sql);

			//Comprobación de errores
			if($q != 1) throw new Exception("No se ha modificado.");

			return true;

		}catch (Exception $e){

			//Muestra el mensaje de error
			echo $e->getMessage();
			
			return false;
		}
	}



	/**
	 * Inicializa un objeto con los valores que se le pasen como parametros
	 * @param Array $arrValores
	 * @return Calumno
	 */
	protected static function _inicializar($arrValores){
		//Estanciar el objeto
		$temp = new Calumno();
		//Asignarle los valores que se le pasan
		$temp->id= $arrValores["id"];
		$temp->dni= $arrValores["dni"];
		$temp->nombre= $arrValores["nombre"];
		$temp->apellidos= $arrValores["apellidos"];
		$temp->fecha_nac= $arrValores["fecha_nac"];
		$temp->telefono= $arrValores["telefono"];
		$temp->mail= $arrValores["mail"];
		$temp->id_profesor= $arrValores["id_profesor"];
		$temp->pass= $arrValores["pass"];
		return $temp;
	}



	/**
	 * Inicializa las propiedades del objeto
	 */
	private function ini(){
		$this->id= "";
		$this->dni= "";
		$this->nombre= "";
		$this->apellidos= "";
		$this->fecha_nac= "0000-00-00";
		$this->telefono= "0";
		$this->mail= "";
		$this->id_profesor= "";
		$this->pass= "passwd";
	}



	/**
	 * Mostrar el contenido del objeto
	 */
	public function mostrar(){
		echo "id => ".  $this->id."<br>";
		echo "dni => ".  $this->dni."<br>";
		echo "nombre => ".  $this->nombre."<br>";
		echo "apellidos => ".  $this->apellidos."<br>";
		echo "fecha_nac => ".  $this->fecha_nac."<br>";
		echo "telefono => ".  $this->telefono."<br>";
		echo "mail => ".  $this->mail."<br>";
		echo "id_profesor => ".  $this->id_profesor."<br>";
		echo "pass => ".  $this->pass."<br>";
	}



}
?>