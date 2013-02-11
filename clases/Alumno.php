<?php

class Alumno{
	
    public $id;
    public $dni;
    public $nombre;
    public $apellidos;
    public $fecha_nac;
    public $telefono;
    public $mail;
    public $id_prof;
    public $pass;
    static private $db;
    static public $arrList = Array('id'=>'Código', 'dni'=>'DNI', 'nombre'=>'Nombre', 'apellidos'=>'Apellidos', 'fecha_nac'=>'Fecha de Nacimiento', 'telefono'=>'Teléfono', 'mail'=>"Correo Electronico", 'id_prof'=>'Profesor');

    public function Alumno($d="", $nom="", $ape="", $fnac="", $tel="", $email="", $id="", $id_p=null){
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $this->dni = $d;
        $this->nombre = $nom;
        $this->apellidos = $ape;
        $this->fecha_nac = $fnac;
        $this->telefono = $tel;
        $this->mail = $email;
        $this->id = $id;
        $this->id_prof = $id_p;
        $this->pass = "autoescuela";
        
    }

    public function insertar(){
    	
    	$contra = md5($this->pass);
         
        //Funciona
        $sql= "INSERT INTO alumno(dni, nombre, apellidos, fecha_nac, telefono, mail, pass";
        
        if($this->id_prof != 0){
            $sql.=", id_profesor";
        }
        
        $sql.=") VALUES('".$this->dni."', '".$this->nombre."', '".$this->apellidos."', '".$this->fecha_nac."', ".$this->telefono.", '".$this->mail."','".$contra."'";
        
        if($this->id_prof != 0){
            $sql.=",".$this->id_prof."";
        }
        
        $sql.=")";
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
        $sql = "DELETE FROM alumno WHERE id = ".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
    }

    public function  modificar(){
    	$contra = md5($this->pass);
        //Funciona
        if($this->id_prof == 0){
            $this->id_prof = "";
        }
        $sql = "UPDATE alumno SET dni='".$this->dni."', nombre='".$this->nombre."', apellidos='".$this->apellidos."', fecha_nac='".$this->fecha_nac."', telefono=".$this->telefono.", mail='".$this->mail."', pass = '".$contra."', id_profesor=".$this->id_prof." WHERE id =".$this->id;
        $consulta = self::$db->prepare($sql);
        $consulta->execute();
        return $sql;
    }

    //********************************************
    //*  EN UN METODO ESTATICO NO SE USA THIS!!! *
    //********************************************
    static function __selecAlum($idSel){
        //Funciona
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM alumno WHERE id=".$idSel;
        $con = self::$db->query($sql);
        foreach($con as $row){ 
        //Aquí hay que rellenar el alumno creando uno nuevo
            $returnAlu = new Alumno($row['dni'], $row['nombre'], $row['apellidos'], $row['fecha_nac'], $row['telefono'], $row['mail'], $row['id'], $row['id_profesor']);
        }
        return $returnAlu;
    }

    public function mostrar(){
        echo $this->id."<br>";
        echo $this->dni."<br>";
        echo $this->nombre."<br>";
        echo $this->apellidos."<br>";
        echo $this->fecha_nac."<br>";
        echo $this->telefono."<br>";
        echo $this->mail."<br>";
        echo $this->id_prof."<br>";
    }

    /**
     * Devuelve un array con todos los alumnos
     * @return array
     */
    static function __getAlumnos($arr_obj){
        self::$db = new PDO('mysql:host=localhost;dbname=Autoescuela', 'root', 'root');
        $sql = "SELECT * FROM alumno WHERE 1 = 1";
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
        if(isset($arr_obj['fecha_nac'])){
            $sql.=" and fecha_nac = '".$arr_obj['fecha_nac']."'";
        }
        if(isset($arr_obj['telefono'])){
            $sql.=" and telefono = ".$arr_obj['telefono'];
        }
        if(isset($arr_obj['mail'])){
            $sql.=" and mail LIKE '%".$arr_obj['mail']."%'";
        }
        if(isset($arr_obj['id_profesor'])){
            $sql.=" and id_profesor = ".$arr_obj['id_profesor'];
        }
        $array_return = array(); //Creamos el array que vamos a devolver
        $con = self::$db->query($sql); //Ejecutamos la query y guardamos lo que nos devuelve en $con
        foreach($con as $row){ 
            $newAlu = new Alumno($row['dni'], $row['nombre'], $row['apellidos'], $row['fecha_nac'], $row['telefono'], $row['mail'], $row['id'], $row['id_profesor']);
            //$returnAlu->mostrar();
            $array_return[] = $newAlu;
        }
        return $array_return;
    }
    
    public function seleccionarCarnets(){
    	
    }

    //Metodos para modificar los parametros de las variables de la clase!!
    //Todos los geter y seter funcionan!!
    public function set_id($setid){
        $this->id = $setid;
    }
    public function set_dni($setdni){
        $this->dni = $setdni;
    }
    public function set_nombre($setnom){
        $this->nombre = $setnom;
    }
    public function set_apellidos($setape){
        $this->apellidos = $setape;
    }
    public function set_fecha_nac($setfecha){
        $this->fecha_nac = $setfecha;
    }
    public function set_telefono($settelf){
        $this->telefono = $settelf;
    }
    public function set_mail($setmail){
        $this->mail = $setmail;
    }
    public function set_id_prof($setid_prof){
        $this->id_prof = $setid_prof;
    }


    //Metodos para devolver las variables de la clase
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
    public function get_fecha_nac(){
        return $this->fecha_nac;
    }
    public function get_telefono(){
        return $this->telefono;
    }
    public function get_mail(){
        return $this->mail;
    }    
    public function get_id_prof(){
        return $this->id_prof;
    }
}
?>