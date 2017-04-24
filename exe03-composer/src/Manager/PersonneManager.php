<?php

/*
 * Contenu : .
 */

/**
 * Description of PersonneManager
 *
 * @author isk
 */

namespace ISL\Manager;

use Faker\Factory;
use \PDO;
use ISL\Entity\Personne;

class PersonneManager {
    private $dsn="mysql:host=localhost;dbname=isl_POO_test";
    private $user="isl_iracanyes";
    private $password="";
    private $connection;
    private $personnes=[];
    
    public function getDsn() {
        return $this->dsn;
    }

    public function getUser() {
        return $this->user;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getConnection() {
        return $this->connection;
    }
    
    
    public function getPersonnes() {
        return $this->personnes;
    }
    
    public function setDsn($dsn) {
        $this->dsn = $dsn;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    private function setConnection() {
        try{
            $conn= new PDO($this->dsn,$this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connection=$conn;
        }catch(PDOException $e){
            throw $e;
        }
    }
    
    public function __construct() {
        
        $this->setConnection();
        
    }
    public function setPersonnes($personne) {
        
        $this->personnes=$personne;
        
    }
        
    static public function create(int $nombre) {
        $data=[];
        for($i=0;$i<$nombre;$i++){
            $faker = Factory::create("fr_BE");
            
            $person="person".$i;
            $$person= new Personne();
            
            
            $$person->setNom($faker->lastName);
            
            $$person->setPrenom($faker->firstName);
            $$person->setAdresse($faker->streetAddress);
            $$person->setVille($faker->city);
            $$person->setCodePostal($faker->postcode);
            $$person->setPays($faker->country);
            //le faker "bs" ne fonctionne pas
            $$person->setSociete($faker->company);
            //$$person->__toString();
            $data[$person]=$$person;
            
            //Découpage adresse
        }
        //self::setPersonnes($data);
        return $data;
    }
    public function insertPersonne(Personne $data){
        
        
        try{
            $conn= $this->getConnection();
            
            $conn->beginTransaction();
            
            //Requête SQL
            $sql="INSERT INTO isl_POO_test.personne(personne_id, nom, prenom, adresse, codePostal, pays, societe) VALUES";
            
            
            
            if(count($data)>1){
                //Insertion multiple
                $cpt=0;
                foreach($data as $key=> $value){
                    $sql.="(:nom".$cpt.", :prenom".$cpt.", :adresse".$cpt.", :cp".$cpt.", :pays".$cpt.", :societe".$cpt.")";
                    
                    
                    $insertData[":nom".$cpt]=$data->getNom();
                    $insertData[":prenom".$cpt]=$data->getPrenom();
                    $insertData[":adresse".$cpt]=$data->getAdresse();
                    $insertData[":cp".$cpt]=$data->getCodePostal();
                    $insertData[":pays".$cpt]=$data->getPays();
                    $insertData[":societe".$cpt]=$data->getSociete();
                    
                    $cpt++;
                }
                $requetePrepareMulti=$conn->prepare($sql);
                $requetePrepareMulti->execute($insertData);
            }else{
                //Insertion unique
                $sql.="(:personne_id, :nom, :prenom, :adresse, :cp, :pays, :societe)";
                $requetePrepare=$conn->prepare($sql);
                $requetePrepare->execute([
                    ":nom"=>$nom,
                    ":prenom"=>$prenom,
                    ":adresse"=>$adresse,
                    ":cp"=>$cp,
                    ":pays"=>$pays,
                    ":societe"=>$societe,
                ]);
            }
            
            //Définir la transaction comme définitif
            $conn->commit();
            
        }catch(PDOException $e){
            //Si échec, annuler la transaction avec la DB
            $conn->rollback();
            throw $e;
        }
    }
}
