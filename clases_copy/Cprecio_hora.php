<?php

class Precio_hora{
	
    public $id;
    public $precio;
    public $hora;
    static private $db;
    static public $arrList = Array('id'=>'Código', 'precio'=>'Precio', 'hora'=>'Hora');

    public function Precio_hora($pre="", $hor="",$id=""){
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
       	$this->precio = $pre;
        $this->id = $id;
        $this->hora = $hor;
        
    }

    public function insertar(){
    	//Funciona
        $sql = "INSERT INTO precio_hora(precio, hora) VALUES(".$this->precio.",'".$this->hora."')";
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

    public function eliminar(){
    	//Funciona
        $sql = "DELETE FROM precio_hora WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
        return $sql;
    }

    public function  modificar(){
    	//Funciona
    	$sql = "UPDATE precio_hora SET precio = ".$this->precio.", hora = '".$this->hora."' WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
        return $sql;
    }

    
    static function __selecPrecio($idSel){
    	//Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM precio_hora WHERE id=".$idSel;
        $con = self::$db->query($sql);
        foreach($con as $row){ 
        //Aquí hay que rellenar el alumno creando uno nuevo
			$returnPre = new Precio_hora($row['precio'], $row['hora'], $row['id']);
        }
        return $returnPre;
    }

    public function mostrar(){
        echo $this->id."<br>";
        echo $this->precio."<br>";
        echo $this->hora."<br>";
    }

    /**
     * Devuelve un array con todos los alumnos
     * @return array
     */
    static function __getPrecios($arr_obj){
    	//Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM precio_hora WHERE 1 = 1";
        if(isset($arr_obj['id'])){
            $sql.=" and id = ".$arr_obj['id'];
        }
        if(isset($arr_obj['precio'])){
            $sql.=" and precio = ".$arr_obj['precio'];
        }
        if(isset($arr_obj['hora'])){
            $sql.=" and hora = '".$arr_obj['hora']."'";
        }
        $array_return = array(); //Creamos el array que vamos a devolver
        $con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
        foreach($con as $row){ 
            $newPre = new Precio_hora($row['precio'], $row['hora'], $row['id']);
            //$returnAlu->mostrar();
            $array_return[] = $newPre;
        }
        return $array_return;
    }

    //Metodos para modificar los parametros de las variables de la clase!!
    //Todos los geter y seter funcionan!!
    public function set_id($set){
        $this->id = $setid;
    }
    public function set_precio($set){
        $this->precio = $set;
    }
    public function set_hora($set){
        $this->hora = $set;
    }

    //Metodos para devolver las variables de la clase
    public function get_id(){
        return $this->id;
    }
    public function get_precio(){
        return $this->precio;
    }
    public function get_hora(){
        return $this->hora;
    }
}
?>