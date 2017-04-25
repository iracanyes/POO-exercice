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
            $sql="INSERT INTO isl_POO_test.Personne(personne_id, nom, prenom, adresse, codePostal, pays, societe) VALUES";
            
            
            
            if(count($data)>1){
                //Insertion multiple
                $cpt=0;
                foreach($data as $key=> $value){
                    $sql.="(:personne_id".$cpt.", :nom".$cpt.", :prenom".$cpt.", :adresse".$cpt.", :cp".$cpt.", :pays".$cpt.", :societe".$cpt.")";
                    
                    $insertData[":personne_id".$cpt]=$conn->lastInsertId()+$cpt;
                    $insertData[":nom".$cpt]=$value->getNom();
                    $insertData[":prenom".$cpt]=$value->getPrenom();
                    $insertData[":adresse".$cpt]=$value->getAdresse();
                    $insertData[":cp".$cpt]=$value->getCodePostal();
                    $insertData[":pays".$cpt]=$value->getPays();
                    $insertData[":societe".$cpt]=$value->getSociete();
                    
                    $cpt++;
                }
                $requetePrepareMulti=$conn->prepare($sql);
                $requetePrepareMulti->execute($insertData);
            }else{
                //Insertion unique
                $sql.="(:personne_id, :nom, :prenom, :adresse, :cp, :pays, :societe)";
                $requetePrepare=$conn->prepare($sql);
                $requetePrepare->execute([
                    ":personne_id"=>$conn->lastInsertId(),
                    ":nom"=>$data->getNom(),
                    ":prenom"=>$data->getPrenom(),
                    ":adresse"=>$data->getAdresse(),
                    ":cp"=>$data->getCodePostal(),
                    ":pays"=>$data->getPays(),
                    ":societe"=>$data->getSociete()
                ]);
            }
            
            //Définir la transaction comme définitif
            $conn->commit();
            
            $conn=null;
        }catch(PDOException $e){
            //Si échec, annuler la transaction avec la DB
            $conn->rollback();
            throw $e;
        }
    }
    
    public function affichePersonne(int $id) {
        try{
            $conn=$this->getConnection();
            
            $conn->beginTransaction();
            
            switch($id){
                case $id>0:
                    $sql="SELECT * FROM Personne WHERE personne_id= :personne_id";
                    
                    $requetePrepare=$conn->prepare($sql);
                    $requetePrepare->execute([":personne_id"=>$id]);
                    
                    
                    $data=[];
                    while($donneeDB=$requetePrepare->fetch(PDO::FETCH_ASSOC)){
                        if(DEBUG){
                            echo "Requête préparé:";
                            var_dump($requetePrepare);
                        }

                        $data[]=$donneeDB;
                        $conn=null;
                        if(DEBUG){
                            echo "Donnée serveur DB:";
                            var_dump($data);
                        }
                        return $data;
                    }
                    break;
                
                case 0:
                    $sql="SELECT * FROM Personne ORDER BY personne_id";
                    
                    $requetePrepare=$conn->query($sql);
                    $data=[];
                    while($ligneDB=$requetePrepare->fetch(PDO::FETCH_ASSOC)){
                        foreach($ligneDB as $key=>$value){
                            //$data[]
                        }
                    }
                    break;
            }
            //table des reponses DB
            $data=[];
            if()
            
        }catch(PDOException $e){
            
            $conn->rollback();
            
            throw $e;
        }
    }
    
    public function updatePersonne(int $id=-1,Personne $data) {
        
        try{
            $conn=$this->getConnection();
            
            $conn->beginTransaction();
            
            if($id !== -1 ){
                $sql="UPDATE Personne SET "
                        . "nom= :nom,"
                        . "prenom= :prenom,"
                        . "adresse= :adresse,"
                        . "codePostal= :cp,"
                        . "pays= :pays,"
                        . "societe= :societe "
                        . "WHERE personne_id= :personne_id";
                
                $requetePrepare=$conn->prepare($sql);
                
                $requetePrepare->execute([
                    ":nom"=>$data->getNom(),
                    ":prenom"=>$data->getPrenom(),
                    ":adresse"=>$data->getAdresse(),
                    ":cp"=>$data->getCodePostal(),
                    ":pays"=>$data->getPays(),
                    ":societe"=>$data->getSociete()
                    
                ]);
                
                $conn->commit();
                $conn=null;
            }
            
            $conn->commit();
        }catch(PDOException $e){
            
            $conn->rollback();
            
            throw $e;
        }
    }
    
    public function deletePersonne(int $id) {
        try{
            $conn=  $this->getConnection();
            
            $conn->beginTransaction();
            
            if($id > 0){
                $sql="DELETE FROM Personne WHERE personne_id= :personne_id";
                $requetePrepare=$conn->prepare($sql);
                
                $requetePrepare->execute([":personne_id"=>$id]);
                
                $conn->commit();
                $conn=null;
            }
        }catch(PDOException $e){
            
            $conn->rollback();
            throw $e;
        }
    }
    
    private function securiteInput(Personne $data){
        
        
        $flags="ENT_QUOTES";
        $charSet="UTF-8";
        
        if(count($data)>1){
            $tab=[];
            foreach($data as $key=>$value){
                //Nom
                $nom=  htmlentities($value->getNom(), $flags,$charSet);
                $value->setNom($nom);
                //Prénom
                $prenom=  htmlentities($value->getPrenom(), $flags,$charSet);
                $value->setPrenom($prenom);
                //Adresse
                $adresse=  htmlentities($value->getAdresse(), $flags,$charSet);
                $value->setAdresse($adresse);
                //Code postal
                $codePostal=  htmlentities($value->getCodePostal(), $flags,$charSet);
                $value->setCodePostal($codePostal);
                
                //Pays
                $pays=  htmlentities($value->getPays(), $flags,$charSet);
                $value->setPays($pays);
                //Societe
                $societe=  htmlentities($value->getSociete(), $flags,$charSet);
                $value->setSociete($societe);
                
                $tab[$key]=$value;
            }
            return $tab;
        }else{
            //Nom
            $nom=  htmlentities($data->getNom(), $flags,$charSet);
            $data->setNom($nom);
            //Prénom
            $prenom=  htmlentities($data->getPrenom(), $flags,$charSet);
            $data->setPrenom($prenom);
            //Adresse
            $adresse=  htmlentities($data->getAdresse(), $flags,$charSet);
            $data->setAdresse($adresse);
            //Code postal
            $codePostal=  htmlentities($data->getCodePostal(), $flags,$charSet);
            $data->setCodePostal($codePostal);

            //Pays
            $pays=  htmlentities($data->getPays(), $flags,$charSet);
            $data->setPays($pays);
            //Societe
            $societe=  htmlentities($data->getSociete(), $flags,$charSet);
            $data->setSociete($societe);

            return $data;
        }
        
    }
}
