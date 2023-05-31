<?php

class DB {
   private $hostName = "localhost";
   private $hostUser = "root";
   private $hostPass = "";
   private $hostDB = "e_library";
 
   public $db;
   public function __construct(){
      $this->db = mysqli_connect($this->hostName,$this->hostUser,$this->hostPass,$this->hostDB);
      if(!$this->db) echo "Gagal Terkoneksi Ke Database";
   }
    

}





?>