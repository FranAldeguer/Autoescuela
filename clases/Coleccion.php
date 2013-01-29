<?php

class Coleccion{
    
    public $id;
    public $nombre;
    public $id_carnet;
    
    private static $db;
    public static $arrList = Array('id'=>'Código', 'nombre'=>'Nombre', 'id_carnet'=>'Carnet');
    
    public function Coleccion($nom="", $idcar="", $id=""){
        $this->id = $id;
        $this->nombre = $nom;
        $this->id_carnet = $idcar;
        
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
    }
    
    public function insertar(){
       $sql = "INSERT INTO coleccion(nombre, id_carnet) VALUES('".$this->nombre."',".$this->id_carnet.")";
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
        $sql = "DELETE FROM coleccion WHERE id = ". $this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }
    
    public function modificar(){
        $sql = "UPDATE coleccion SET  nombre='".$this->nombre."', id_carnet=".$this->id_carnet." WHERE id =".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }
    
    static function __selecColeccion($idSel){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM coleccion WHERE id=".$idSel;
        $con = self::$db->query($sql);
        foreach($con as $row){ 
        //Aquí hay que rellenar el alumno creando uno nuevo
            $returnCarnet = new Coleccion($row['nombre'], $row['id_carnet'], $row['id']);
        }
        return $returnCarnet;
    }
    
    public function mostrar(){
        echo $this->id."<br>";
        echo $this->nombre."<br>";
        echo $this->id_carnet."<br>";
    }
    
    static function __getColecciones($arr_obj){
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM coleccion WHERE 1 = 1";
        if(isset($arr_obj['id'])){
            $sql.=" and id = ".$arr_obj['id'];
        }
        if(isset($arr_obj['nombre'])){
            $sql.=" and nombre LIKE '%".$arr_obj['nombre']."%'";
        }
        if(isset($arr_obj['id_carnet'])){
            $sql.=" and id_carnet = ".$arr_obj['id_carnet'];
        }
        $array_return = array(); //Creamos el array que vamos a devolver
        $con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
        foreach($con as $row){ 
            $newColeccion = new Alumno($row['nombre'], $row['id_carnet'], $row['id']);
            $array_return[] = $newColeccion;
        }
        return $array_return;
    }
    
    public function get_id(){
        return $this->id;
    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_idCarnet(){
        return $this->id_carnet;
    }
    
    public function set_id($set){
        $this->id = $set;
    }
    public function set_nombre($set){
        $this->nombre = $set;
    }
    public function set_idCarnet($set){
        $this->id_carnet = $set;
    }

}
?>
