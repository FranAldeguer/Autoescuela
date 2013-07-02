<?
ob_start();?>
Et quid erat, quod me delectabat, nisi amare et amari? sed non tenebatur modus ab animo usque ad animum, quatenus est luminosus limes amicitiae, sed exhalabantur nebulae de limosa concupiscentia carnis et scatebra pubertatis, et obnubilabant atque obfuscabant cor meum, ut non discerneretur serenitas dilectionis a caligine libidinis. utrumque in confuso aestuabat et rapiebat inbecillam aetatem per abrupta cupiditatum atque mersabat gurgite flagitiorum. invaluerat super me ira tua, et nesciebam. obsurdueram stridore catenae mortalitatis meae, poena superbiae animae meae, et ibam longius a te, et sinebas, et iactabar et effundebar et diffluebam et ebulliebam per fornicationes meas, et tacebas. o tardum gaudium meum! tacebas tunc, et ego ibam porro longe a te in plura et plura sterilia semina dolorum superba deiectione et inquieta lassitudine. Quis mihi modularetur aerumnam meam et novissimarum rerum fugaces pulchritudines in usum verteret earumque suavitatibus metas praefigeret, ut usque ad coniugale litus exaestuarent fluctus aetatis meae, si tranquillitas in eis non poterat esse fine procreandorum liberorum contenta, sicut praescribit lex tua, domine, qui formas etiam propaginem mortis nostrae, potens inponere lenem manum ad temperamentum spinarum a paradiso tuo seclusarum? non enim longe est a nobis omnipotentia tua, etiam cum longe sumus a te. aut certe sonitum nubium tuarum vigilantius adverterem: tribulationem autem carnis habebunt huius modi, ego autem vobis parco; et: bonum est homini mulierem non tangere; et: qui sine uxore est, cogitat ea quae sunt dei, quomodo placeat deo, qui autem matrimonio iunctus est, cogitat ea quae sunt mundi, quomodo placeat uxori. has ergo voces exaudirem vigilantior, et abscisus propter regnum caelorum felicior expectarem amplexus tuos. Sed efferbui miser, sequens impetum fluxus mei relicto te, et excessi omnia legitima tua, nec evasi flagella tua: quis enim hoc mortalium? nam tu semper aderas misericorditer saeviens, et amarissimis aspargens offensionibus omnes illicitas iucunditates meas, ut ita quaererem sine offensione iucundari, et ubi hoc possem, non invenirem quicquam praeter te, domine, praeter te, qui fingis dolorem in praecepto et percutis, ut sanes, et occidis nos, ne moriamur abs te. ubi eram, et quam longe exulabam a deliciis domus tuae, anno illo sexto decimo aetatis carnis meae, cum accepit in me sceptrum, et totas manus ei dedi, vesania libidinis licentiosae per dedecus humanum, inlicitae autem per leges tuas? non fuit cura meorum ruentem excipere me matrimonio, sed cura fuit tantum, ut discerem sermonem facere quam optimum et persuadere dictione
<?
$texto = ob_get_contents();
$texto = str_replace("'", "",$texto);
ob_end_clean();




class CRandom {
   
    var $digitos ;
    var $caracter ;
    var $nombres ;
    var $apellidos ;
    var $palabras ;
    var $articulos ;
    var $poblaciones ;
   
    function CRandom() {
        global $texto;
        global $dir_motor_class;
        //srand( getmicrotime() ) ;
        $this-> digitos = "0123456789" ;
        $this-> caracter = "abcdefghijklmnopqrstuvxyz" ;
       	
        //$this-> palabras = split(" " ,$texto);
       
        $this-> nombres[0]="Jose" ;
        $this-> nombres[1]="Manuel" ;
        $this-> nombres[2]="Javier" ;
        $this-> nombres[3]="Jose" ;
        $this-> nombres[4]="Encarni" ;
        $this-> nombres[5]="Francisco" ;
        $this-> nombres[6]="Angelina" ;
        $this-> nombres[7]="Maribel" ;
        $this-> nombres[8]="Celeste" ;
        $this-> nombres[9]="Juan" ;
        $this-> nombres[10]="Antonio" ;
        $this-> nombres[11]="Felipe" ;
        $this-> nombres[12]="Raul" ;
        $this-> nombres[13]="Enrique" ;
        $this-> nombres[14]="Miguel" ;
        $this-> nombres[15]="Ramon" ;
        $this-> nombres[16]="Cesar" ;
        $this-> nombres[17]="Guillermo" ;
	$this-> nombres[18]="Lolo";
	$this-> nombres[19]="Vero";
       	$this-> nombres[20]="Marta";
	$this-> nombres[21]="Adrian";
	
        $this-> apellidos[0] = "Gomez" ;
        $this-> apellidos[1] = "Perez" ;
        $this-> apellidos[2] = "Abellan" ;
        $this-> apellidos[3] = "Ortega" ;
        $this-> apellidos[4] = "Viñes" ;
        $this-> apellidos[5] = "Fernandez" ;
        $this-> apellidos[6] = "Martinez" ;
        $this-> apellidos[7] = "Lopez" ;
        $this-> apellidos[8] = "Guzman" ;
        $this-> apellidos[9] = "Asensi" ;
        $this-> apellidos[10] = "Mas" ;
        $this-> apellidos[11] = "Macia" ;
        $this-> apellidos[12] = "Iborra" ;
        $this-> apellidos[13] = "Hernandez" ;
        $this-> apellidos[14] = "Pleguezuelos" ;
        $this-> apellidos[15] = "Guillan" ;
        $this-> apellidos[16] = "Tortosa" ;
        $this-> apellidos[17] = "Galvan" ;
   
        $this-> poblaciones[0] = "ALBACETE" ;
        $this-> poblaciones[1] = "ALICANTE" ;
        $this-> poblaciones[2] = "ALMERIA" ;
        $this-> poblaciones[3] = "AVILA" ;
        $this-> poblaciones[4] = "BADAJOZ" ;
        $this-> poblaciones[5] = "BARCELONA" ;
        $this-> poblaciones[6] = "BILBAO" ;
        $this-> poblaciones[7] = "BURGOS" ;
        $this-> poblaciones[8] = "CÁCERES" ;
        $this-> poblaciones[9] = "CÁDIZ" ;
        $this-> poblaciones[10] = "CASTELLÓN DE LA PLANA" ;
        $this-> poblaciones[11] = "CEUTA" ;
        $this-> poblaciones[12] = "CIUDAD REAL" ;
        $this-> poblaciones[13] = "CÓRDOBA" ;
        $this-> poblaciones[14] = "CUENCA" ;
        $this-> poblaciones[15] = "GERONA" ;
        $this-> poblaciones[16] = "GRANADA" ;
        $this-> poblaciones[17] = "GUADALAJARA" ;
        $this-> poblaciones[18] = "HUELVA" ;
        $this-> poblaciones[19] = "HUESCA" ;
        $this-> poblaciones[20] = "JAEN" ;
        $this-> poblaciones[21] = "A CORUÑA" ;
        $this-> poblaciones[22] = "LEÓN" ;
        $this-> poblaciones[23] = "LLEIDA" ;
        $this-> poblaciones[24] = "LOGROÑO" ;
        $this-> poblaciones[25] = "LUGO" ;
        $this-> poblaciones[26] = "MADRID" ;
        $this-> poblaciones[27] = "MÁLAGA" ;
        $this-> poblaciones[28] = "MELILLA" ;
        $this-> poblaciones[29] = "MURCIA" ;
        $this-> poblaciones[30] = "ORENSE" ;
        $this-> poblaciones[31] = "OVIEDO" ;
        $this-> poblaciones[32] = "PALENCIA" ;
        $this-> poblaciones[33] = "PALMA DE MALLORCA" ;
        $this-> poblaciones[34] = "PALMAS DE GRAN CANARIA" ;
        $this-> poblaciones[35] = "PAMPLONA" ;
        $this-> poblaciones[36] = "PONTEVEDRA" ;
        $this-> poblaciones[37] = "SALAMANCA" ;
        $this-> poblaciones[38] = "SAN SEBASTIAN" ;
        $this-> poblaciones[39] = "SANTA CRUZ DE TENERIFE" ;
        $this-> poblaciones[40] = "SANTANDER" ;
        $this-> poblaciones[41] = "SEGOVIA" ;
        $this-> poblaciones[42] = "SEVILLA" ;
        $this-> poblaciones[43] = "SORIA" ;
        $this-> poblaciones[44] = "TARRAGONA" ;
        $this-> poblaciones[45] = "TERUEL" ;
        $this-> poblaciones[46] = "TOLEDO" ;
        $this-> poblaciones[47] = "VALENCIA" ;
        $this-> poblaciones[48] = "VALLADOLID" ;
        $this-> poblaciones[49] = "VITORIA" ;
        $this-> poblaciones[50] = "ZAMORA" ;
        $this-> poblaciones[51] = "ZARAGOZA" ;
 
        $this-> provincias[0] = "ALBACETE" ;
        $this-> provincias[1] = "ALICANTE" ;
        $this-> provincias[2] = "ALMERIA" ;
        $this-> provincias[3] = "AVILA" ;
        $this-> provincias[4] = "BADAJOZ" ;
        $this-> provincias[5] = "BARCELONA" ;
        $this-> provincias[6] = "BILBAO" ;
        $this-> provincias[7] = "BURGOS" ;
        $this-> provincias[8] = "CÁCERES" ;
        $this-> provincias[9] = "CÁDIZ" ;
        $this-> provincias[10] = "CASTELLÓN DE LA PLANA" ;
        $this-> provincias[11] = "CEUTA" ;
        $this-> provincias[12] = "CIUDAD REAL" ;
        $this-> provincias[13] = "CÓRDOBA" ;
        $this-> provincias[14] = "CUENCA" ;
        $this-> provincias[15] = "GERONA" ;
        $this-> provincias[16] = "GRANADA" ;
        $this-> provincias[17] = "GUADALAJARA" ;
        $this-> provincias[18] = "HUELVA" ;
        $this-> provincias[19] = "HUESCA" ;
        $this-> provincias[20] = "JAEN" ;
        $this-> provincias[21] = "A CORUÑA" ;
        $this-> provincias[22] = "LEÓN" ;
        $this-> provincias[23] = "LLEIDA" ;
        $this-> provincias[24] = "LOGROÑO" ;
        $this-> provincias[25] = "LUGO" ;
        $this-> provincias[26] = "MADRID" ;
        $this-> provincias[27] = "MÁLAGA" ;
        $this-> provincias[28] = "MELILLA" ;
        $this-> provincias[29] = "MURCIA" ;
        $this-> provincias[30] = "ORENSE" ;
        $this-> provincias[31] = "OVIEDO" ;
        $this-> provincias[32] = "PALENCIA" ;
        $this-> provincias[33] = "PALMA DE MALLORCA" ;
        $this-> provincias[34] = "PALMAS DE GRAN CANARIA" ;
        $this-> provincias[35] = "PAMPLONA" ;
        $this-> provincias[36] = "PONTEVEDRA" ;
        $this-> provincias[37] = "SALAMANCA" ;
        $this-> provincias[38] = "SAN SEBASTIAN" ;
        $this-> provincias[39] = "SANTA CRUZ DE TENERIFE" ;
        $this-> provincias[40] = "SANTANDER" ;
        $this-> provincias[41] = "SEGOVIA" ;
        $this-> provincias[42] = "SEVILLA" ;
        $this-> provincias[43] = "SORIA" ;
        $this-> provincias[44] = "TARRAGONA" ;
        $this-> provincias[45] = "TERUEL" ;
        $this-> provincias[46] = "TOLEDO" ;
        $this-> provincias[47] = "VALENCIA" ;
        $this-> provincias[48] = "VALLADOLID" ;
        $this-> provincias[49] = "VITORIA" ;
        $this-> provincias[50] = "ZAMORA" ;
        $this-> provincias[51] = "ZARAGOZA" ;
            
   
      $this-> zonas[0] = "Zona Sur" ;
      $this-> zonas[1] = "Zona Centro" ;
      $this-> zonas[2] = "Zona Playa" ;
      $this-> zonas[3] = "Zona rural" ;
    }
   
    function genDireccion() {
      $cadena = $this->genFrase(3);
      $cadena .= ",".$this->genNumeroRng(1,100);      
    }
   
    function genURL() {
      return "http://www." .trim($this->genFrase(1)).".com"; 
    }
   
    function genNumero( $size ) {
        $cadena = "";
        for( $i=0;$i<$size;$i++ ) {
            $cadena.= $this-> digitos[ rand(0 , strlen($this->digitos )-1 )];
        }
        return $cadena;
    }
   
    function genNumeroRng($i=0,$f=99999999) {
        return rand($i,$f);
    }
   
    function genZona() {
      return $this-> zonas[rand(0,count($this->zonas )-1)];
    } 
   
    function genCadena( $size ) {
        $cadena = "";
        for( $i=0;$i<$size;$i++ ) {
            $cadena.= $this-> caracter[ rand(0 , strlen($this->caracter )-1 )];
        }
        return $cadena;
    }
    function genFrase( $size ) {
        $cadena = "";
        for( $i=0;$i<$size;$i++ ) {
            $cadena.= trim($this->palabras [rand(0,count($this->palabras)-1)]). " ";
        }
        return $cadena;
    }
    function genNombre( $tipo = 0  ) {
        $cadena = "";
        if ( $tipo == 0 ) {
            $cadena.= $this-> nombres[ rand(0, count($this->nombres )-1) ]." ".$this->apellidos [ rand(0, count($this->apellidos)-1) ]. " ".$this->apellidos[ rand(0, count($this-> apellidos)-1) ] ;
        } else if ( $tipo == 1)  {
            $cadena.= $this-> nombres[ rand(0, count($this->nombres )-1) ];
        } else if ( $tipo == 2)  {
            $cadena.= $this-> apellidos[ rand(0, count($this->apellidos )-1) ];
        }
        return $cadena;
    }
   
   
    function genNombreArticulo() {
        return trim($this->articulos [ rand(0,count($this->articulos)-1) ]);
    }
    function genEmail() {
        $cadena= "";
        $cadena = $this->genCadena( rand(2,10) ). "@".$this->genCadena( rand(2,5) )."." .$this->genCadena(rand(2,3));
        return $cadena;
    }   
    function genBoolean($porc=50) {
        return $this->genNumeroRng(0,100)>$porc? 1 : 0;
    }
    function genPrecio( $min , $max) {
        $min *= 1000;
        $max *= 1000;
        return str_replace("," ,"." ,formatnumber( rand( $min, $max )/1000 ));
       
    }
    function genImagen( $ruta ) {
        $ficheros = Archivos($ruta);
        return $ficheros[ rand ( 0 , count($ficheros)-1 ) ][0];
    }
   
    function genOpciones( $cadena ) {
        $opciones = split( ",",$cadena);
        return trim( $opciones[ rand(0,count($opciones)-1) ] );
    }
   
    function genFecha($ano= '',$mes= '') {
        $dias[1] = 31;
        $dias[2] = 28;
        $dias[3] = 31;
        $dias[4] = 30;
        $dias[5] = 31;
        $dias[6] = 30;
        $dias[7] = 31;
        $dias[8] = 31;
        $dias[9] = 30;
        $dias[10] = 31;
        $dias[11] = 30;
        $dias[12] = 31;
        if ( !$ano  ) $ano = rand(2000,2010);
        if ( !$mes ) $mes = rand(1,12);
       
        return $ano."-" .$mes."-".rand(1,$dias[$mes]);
    }
   
    function genFechaMay($fecha,$diasDeMas) {
       
        $dias[1] = 31;
        $dias[2] = 28;
        $dias[3] = 31;
        $dias[4] = 30;
        $dias[5] = 31;
        $dias[6] = 30;
        $dias[7] = 31;
        $dias[8] = 31;
        $dias[9] = 30;
        $dias[10] = 31;
        $dias[11] = 30;
        $dias[12] = 31;


            $arr  = split( "-",$fecha);
        $dia = $arr[2];
        $mes = $arr[1];
        $ano = $arr[0];
       


        $time = mktime ( $this->genNumeroRng(0,23),  $this->genNumeroRng(0,59),  $this->genNumeroRng(0,59), $mes , $dia + $diasDeMas, $ano );
      
        return date("Y-m-d H:i:s" ,$time);
    }


 
   function genArray( $array ) {
       $numero = rand(0,count($array)-1);
       return ( isset ($array[ $numero ]["ID"] )) ? $array[ $numero ]["ID"] : "0" ;
   }
  
   function genSql( $sql ) {
       global $conexion;
       return $this->genArray( crear_tabla($sql,$conexion) );
   }
  
   function genIp() {
       return rand(1,255).".".rand(1,255). ".".rand(1,255)."." .rand(1,255);
   }


   function genPoblacion() {
       return ucwords(strtolower(($this->poblaciones [ rand(0, count($this->poblaciones )-1) ])));
   }
  
   function genClave($size) {
         $cadena = "ABCDEFGHIJKLMNOPQRSTUVXYZ0123456789" ;
         $clave = "";
         for($i=0;$i<$size;$i++) {
               $clave.= $cadena[ rand(0,strlen($cadena)-1) ];
         }
         return $clave;
   }
}


$cRandom = new CRandom();


?>
