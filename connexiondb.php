<?php

class ConnexionDB{
private $host = 'localhost';
private $name = 'site1';
private $user ='root';
private $pass = '';
private $connexion;

function __construct(){
  /*  $this->host = $host;
   $this->name = $name;
   $this->user = $user;
   $this->pass = $pass; */

   try{
      $this->connexion = new PDO('mysql:host='. $this->host.';dbname=' . $this->name . ';', $this->user , $this->pass );
      $this->connexion(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch (Exception $e){
      echo "Erreur : Impossible de se connecter à la BDD !" . $e->getMessage();
      die();
   }
}

   public function connexion(){
      return $this->connexion;
   }
}
$DB = new ConnexionDB;
$BDD = $DB->connexion();

?>