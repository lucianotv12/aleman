<?php 
 class Conexion extends PDO { 
   private $tipo_de_base = 'mysql';
   private $host = ROOT;
   private $nombre_de_base = DATABASE;
   private $usuario = USER;
   private $contrasena = PASS; 
   public function __construct($db=0) {
      if($db):
         $db = $db;
      else:
         $db = DATABASE;

      endif;   

      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$db, $this->usuario, $this->contrasena);
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   } 
 } 