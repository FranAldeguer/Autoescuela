<?php

class Alum_carnet{
	
    public $id;
    public $id_alumno;
    public $id_carnet;
    public $terminado;
    static private $db;
    static public $arrList = Array('id'=>'Código', 'id_alumno'=>'Alumno', 'id_carnet'=>'Carnet', 'terminado'=>'¿Terminado?');
	
	/**
	 * Constructor de la clase Alum_carnet
	 * @param string $alu
	 * @param string $car
	 * @param string $ter
	 * @param string $id
	 */
    public function Alum_carnet($alu="", $car="", $ter="", $id=""){
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $this->id_alumno = $alu;
        $this->id_carnet = $car;
        $this->terminado = $ter;
        $this->id = $id;
    }
	
    /**
     * Función de para insertar
     * @return string|number
     */
    public function insertar(){
        //Funciona
        $sql= "INSERT INTO alum_carnet(id_alumno, id_carnet, terminado) VALUES('".$this->id_alumno."', '".$this->id_carnet."', '".$this->terminado."')";
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
       
        if ($consulta->errorInfo[0] == 00000) {
            //Devuelve el id del ultimo registro insertado si ha insertado correctamente  
            return self::$db->lastInsertId();
        } else {
            //Error en la inserción
            return 0;            
        }
    }

    /**
     * Función para insertar
     */
    public function eliminar(){
        //Funciona
        $sql = "DELETE FROM alum_carnet WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }

    public function  modificar(){
        //Funciona
        $sql = "UPDATE alum_carnet SET id_alumno='".$this->id_alumno."', id_carnet='".$this->id_carnet."', terminado='".$this->terminado."' WHERE id =".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
        return $sql;
    }

    static function __selecAlumCarnet($idSel){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM alum_carnet WHERE id=".$idSel;
        $con = self::$db->query($sql);
        foreach($con as $row){ 
        //Aquí hay que rellenar el alumno creando uno nuevo
            $returnAlu = new Alum_carnet($row['id_alumno'], $row['id_carnet'], $row['terminado'], $row['id']);
        }
        return $returnAlu;
    }

    public function mostrar(){
        echo $this->id."<br>";
        echo $this->id_alumno."<br>";
        echo $this->id_carnet."<br>";
        echo $this->terminado."<br>";
    }

    /**
     * Devuelve un array con todos los alumnos
     * @return array
     */
    static function __getAlum_carnet($arr_obj){
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM alum_carnet WHERE 1 = 1";
        if(isset($arr_obj['id'])){
            $sql.=" and id = ".$arr_obj['id'];
        }
        if(isset($arr_obj['id_alumno'])){
            $sql.=" and id_alumno = ".$arr_obj['id_alumno'];
        }
        if(isset($arr_obj['id_carnet'])){
            $sql.=" and id_carnet = '".$arr_obj['id_carnet']."'";
        }
        if(isset($arr_obj['terminado'])){
            $sql.=" and terminado = '".$arr_obj['terminado']."'";
        }
        $array_return = array(); //Creamos el array que vamos a devolver
        $con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
        foreach($con as $row){ 
            $newAlu = new Alum_carnet($row['id_alumno'], $row['id_carnet'], $row['terminado'], $row['id']);
            //$returnAlu->mostrar();
            $array_return[] = $newAlu;
        }
        return $array_return;
    }
    

    //Metodos para modificar los parametros de las variables de la clase!!
    //Todos los geter y seter funcionan!!
    public function set_id($setid){
        $this->id = $setid;
    }
    public function set_id_alumno($set){
        $this->id_alumno = $set;
    }
    public function set_id_carnet($set){
        $this->id_carnet = $set;
    }
    public function set_terminado($set){
        $this->terminado = $set;
    }

    //Metodos para devolver las variables de la clase
    public function get_id(){
        return $this->id;
    }
    public function get_id_alumno(){
        return $this->id_alumno;
    }
    public function get_id_carnet(){
        return $this->id_carnet;
    }
    public function get_terminado(){
        return $this->terminado;
    }
}
?>