<?php

class Test{
    
    public $id;
    public $numero;
    public $id_coleccion;
    public $num_preguntas; //int
    
    static public $arrList = Array('id' => 'Código', 'numero'=>'Número', 'id_coleccion'=>'Colección', 'num_preguntas'=>'Nº de preguntas');
    static private $db;
    
    public function Test($num_test="", $idcolec="", $num_pre="", $id=""){
        //Funciona
        $this->id = $id;
        $this->numero = $num_test;
        $this->num_preguntas = $num_pre;
        $this->id_coleccion = $idcolec;
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
    }
    
    public function insertar(){
        //Funciona
        $sql = "INSERT INTO test(numero, id_coleccion, num_preguntas) VALUES(".$this->numero.", ".$this->id_coleccion.", ".$this->num_preguntas.")";
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
        $sql = "DELETE FROM test WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }
    
    public function modificar(){
    	//Funciona
        $sql = "UPDATE test SET numero = ".$this->numero.", id_coleccion = ".$this->id_coleccion.", num_preguntas = ".$this->num_preguntas." WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }
    
    static function __selecTest($idSel){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM test WHERE id=".$idSel;
        $con = self::$db->query($sql);
        foreach($con as $row){ 
        //Aquí hay que rellenar el alumno creando uno nuevo
            $returnTest = new Test($row['numero'], $row['id_coleccion'], $row['num_preguntas'], $row['id']);
        }
        return $returnTest;
    }
    
    public function mostrar(){
        echo $this->id."<br>";
        echo $this->numero."<br>";
        echo $this->id_coleccion."<br>";
        echo $this->num_preguntas."<br>";
    }
    
    static function __getTest($arr_obj){
    	//Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM test WHERE 1 = 1";
        if(isset($arr_obj['id'])){
            $sql.=" and id = ".$arr_obj['id'];
        }
        if(isset($arr_obj['numero'])){
            $sql.=" and numero = ".$arr_obj['numero'];
        }
        if(isset($arr_obj['id_coleccion'])){
            $sql.=" and id_coleccion = ".$arr_obj['id_coleccion'];
        }
        if(isset($arr_obj['num_preguntas'])){
            $sql.=" and num_preguntas = ".$arr_obj['num_preguntas'];
        }
        $sql.=" ORDER BY id_coleccion ASC";
        $array_return = array(); //Creamos el array que vamos a devolver
        $con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
        foreach($con as $row){ 
            $newTest = new Test($row['numero'], $row['id_coleccion'], $row['num_preguntas'], $row['id']);
            //$returnAlu->mostrar();
            $array_return[] = $newTest;
        }
        return $array_return;
    }
    
    public function set_id($set){
        $this->id = $set;
    }
    public function set_numero($set){
        $this->numero = $set;
    }
    public function set_id_colecion($set){
        $this->id_coleccion = $set;
    }
    public function set_num_preguntas($set){
        $this->num_preguntas = $set;
    }
    
    public function get_id(){
        return $this->id;
    }
    public function get_numero(){
        return $this->numero;
    }
    public function get_id_colecion(){
        return $this->id_coleccion;
    }
    public function get_num_preguntas(){
        return $this->num_preguntas;
    }
}
?>
