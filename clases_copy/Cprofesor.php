<?php

class Profesor{

    public $id;
    public $dni;
    public $nombre;
    public $apellidos;
    public $mail;
    public $telefono;
    public $practico; //boolean
    public $encargado; //boolean
    static public $arraylist = Array('id' => 'Código', 'dni' => 'DNI', 'nombre' => 'Nombre', 'apellidos' => 'Apellidos', 'mail' => 'Correo Electrónico', 'telefono'=>'Teléfono');

    static private $db;

    public function Profesor($d="", $nom="", $ape="", $ma="", $telf="", $prac="", $enc="", $id=""){
        $this->id = $id;
        $this->dni = $d;
        $this->nombre = $nom;
        $this->apellidos = $ape;
        $this->mail = $ma;
        $this->telefono = $telf;
        $this->practico = $prac;
        $this->encargado = $enc;

        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
    }

    public function insertar(){
        //Funciona
        $sql="INSERT INTO profesor(dni, nombre, apellidos, email, telefono, practico, encargado) VALUES('".$this->dni."', '".$this->nombre."', '".$this->apellidos."', '".$this->mail."', '".$this->telefono."',".$this->practico.", ".$this->encargado.")";
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
        $sql = "DELETE FROM profesor WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute(); 
    }
    
    public function  modificar(){
        //Funciona
        $sql="UPDATE profesor SET dni='".$this->dni."', nombre='".$this->nombre."', apellidos='".$this->apellidos."', email='".$this->mail."', telefono='".$this->telefono."', practico=".$this->practico.", encargado=".$this->encargado." WHERE id =".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
        return $sql;
    }
    
    static function selecProf($idSel){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM profesor WHERE id=".$idSel;
        $con = self::$db->query($sql);
        foreach($con as $row){ 
        //Aquí hay que rellenar el alumno creando uno nuevo
            $returnProf = new Profesor($row['dni'], $row['nombre'], $row['apellidos'], $row['email'],$row['telefono'], $row['practico'], $row['encargado'], $row['id']);
        }
        return $returnProf;
    }
    
    public function mostrar(){
        //Funciona
        echo $this->id."<br>";
        echo $this->dni."<br>";
        echo $this->nombre."<br>";
        echo $this->apellidos."<br>";
        echo $this->practico."<br>";
        echo $this->encargado."<br>";
        echo $this->mail."<br>";
        echo $this->telefono."<br>";
    }
    
    static function __getProfesores($arr_obj){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM profesor WHERE 1 = 1";
        if(isset($arr_obj['id'])){
            $sql.=" and id = ".$arr_obj['id'];
        }
        if(isset($arr_obj['dni'])){
            $sql.=" and dni = ".$arr_obj['dni'];
        }
        if(isset($arr_obj['nombre'])){
            $sql.=" and nombre LIKE '%".$arr_obj['nombre']."%'";
        }
        if(isset($arr_obj['apellidos'])){
            $sql.=" and apellidos LIKE '%".$arr_obj['apellidos']."%'";
        }
        if(isset($arr_obj['telefono'])){
            $sql.=" and telefono = ".$arr_obj['telefono'];
        }
        if(isset($arr_obj['mail'])){
            $sql.=" and email LIKE '%".$arr_obj['mail']."%'";
        }
        if(isset($arr_obj['practico'])){
            $sql.=" and practico = ".$arr_obj['practico'];
        }
        if(isset($arr_obj['encargado'])){
            $sql.=" and encargado = ".$arr_obj['encargado'];
        }
        $array_return = array(); //Creamos el array que vamos a devolver
        $con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
        foreach($con as $row){ 
            $returnProf = new Profesor($row['dni'], $row['nombre'], $row['apellidos'], $row['email'],$row['telefono'], $row['practico'], $row['encargado'], $row['id']);
            //$returnAlu->mostrar();
            $array_return[] = $returnProf;
        }
        return $array_return;
    }
    
    public function set_id($set){
        $this->id = $set;
    }
    public function set_dni($set){
        $this->dni = $set;
    }
    public function set_nombre($set){
        $this->nombre = $set;
    }
    public function set_apellidos($set){
        $this->apellidos = $set;
    }
    public function set_mail($set){
        $this->mail = $set;
    }
    public function set_telefono($set){
        $this->telefono = $set;
    }
    public function set_practico($set){
        $this->practico = $set;
    }
    public function set_encargado($set){
        $this->encargado = $set;
    }
    
    public function get_id(){
        return $this->id;
    }
    public function get_dni(){
        return $this->dni;
    }
    public function get_nombre(){
        return $this->nombre;
    }
    public function get_apellidos(){
        return $this->apellidos;
    }
    public function get_mail(){
        return $this->mail;
    }
    public function get_telefono(){
        return $this->telefono;
    }
    public function get_practico(){
        return $this->practico;
    }
    public function get_encargado(){
        return $this->encargado;
    }
}
?>