<?php

class Carnet{
    public $id;
    public $nombre;
    public $descripcion;
    public $precio;
    static public $arrlist = Array('id'=>'Código', 'nombre'=>'Nombre', 'descripcion'=>'Descripción', 'precio'=>'Precio');
    static private $db;

    public function Carnet($nom="", $desc="", $pre="", $id=""){
        $this->id = $id;
        $this->nombre = $nom;
        $this->descripcion = $desc;
        $this->precio = $pre;
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
    }

    public function insertar(){
        //Funciona
        $sql = "INSERT INTO carnet(nombre, descripcion, precio) VALUES ('".$this->nombre."', '".$this->descripcion."', ".$this->precio.")";
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
        $sql = "DELETE FROM carnet WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }

    public function modificar(){
        //Funciona
        $sql = "UPDATE carnet SET nombre = '".$this->nombre."', descripcion = '".$this->descripcion."', precio = ".$this->precio." WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }
    
    public function mostrar(){
        echo $this->id."<br>";
        echo $this->nombre."<br>";
        echo $this->descripcion."<br>";
        echo $this->precio."<br>";
    }
    
    static function __selecCarnet($idSel){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM carnet WHERE id=".$idSel;
        $con = self::$db->query($sql);
        foreach($con as $row){ 
        //Aquí hay que rellenar el alumno creando uno nuevo
            $returnCarnet = new Carnet($row['nombre'], $row['descripcion'], $row['precio'], $row['id']);
        }
        return $returnCarnet;
    }
    
    static function __getCarnets($arr_obj){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM carnet WHERE 1 = 1";
        if(isset($arr_obj['id'])){
            $sql.=" and id = ".$arr_obj['id'];
        }
        if(isset($arr_obj['nombre'])){
            $sql.=" and nombre LIKE '%".$arr_obj['nombre']."%'";
        }
        if(isset($arr_obj['descripcion'])){
            $sql.=" and descripcion LIKE '%".$arr_obj['descripcion']."%'";
        }
        if(isset($arr_obj['precio'])){
            $sql.=" and precio = ".$arr_obj['precio'];
        }
        $array_return = array(); //Creamos el array que vamos a devolver
        $con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
        foreach($con as $row){ 
            $returnCarnet = new Carnet($row['nombre'], $row['descripcion'], $row['precio'], $row['id']);
            $array_return[] = $returnCarnet;
        }
        return $array_return;
    }
    
    
    public function set_id($set){
        $this->id = $set;
    }
    public function set_nombre($set){
        $this->nombre = $set;
    }
    public function set_descripcion($set){
        $this->descripcion = $set;
    }
    public function set_precio($set){
        $this->precio = $set;
    }
    
    
    public function get_id(){
        return $this->id;
    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_descripcion(){
        return $this->descripcion;
    }
    public function get_precio(){
        return $this->precio;
    }
    
    
}