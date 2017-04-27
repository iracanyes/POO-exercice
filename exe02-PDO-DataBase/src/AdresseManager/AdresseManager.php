<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\AdresseManager;
use \PDO;
use ISL\Entity\Adresse;

class AdresseManager{
    private $dsn="mysql:host=localhost;dbname=isl_POO_test";
    private $user="isl_iracanyes";
    private $password="";
    private $connection;
    
    
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

    public function setDsn($dsn) {
        $this->dsn = $dsn;
    }

    public function setUser($user) {
        $this->user = $user;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setConnection() {
        try {
            $connection = new PDO($this->dsn,  $this->user,  $this->password);
            $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connection=$connection;
        }catch(PDOException $e){
           throw $e;
        }
        
    }

    
    public function __construct() {
        $this->setConnection();
        
        
    }
    public function insertAdresse(Adresse $data){
        $conn = $this->getConnection();
        try{
            //$conn->beginTransation(); Erreur rechercher son namespace
            //Requête preparée
            $sql="INSERT INTO isl_POO_test.Adresse(adresse_id, rue, numero, localite, codePostal, pays)VALUES";
            
            
            
            $sql .="(:adresseId ,:rue, :numero, :localite, :codePostal, :pays)";
            $requetePrepare= $conn->prepare($sql);
            $requetePrepare->execute([
                ":adresseId"=>$conn->lastInsertId(),
                ":rue"=>$data->getRue(),
                ":numero"=>$data->getNumero(),
                ":localite"=>$data->getLocalite(),
                ":codePostal"=>$data->getCodePostal(),
                ":pays"=>$data->getPays()
            ]);
            
            //Définir les changements par transaction comme permanente dans la DB
            //$conn->commit();
            
        }catch(PDOException $e){
            //Si échec, annulation des changements par transactions 
            
            //$conn->rollback();
            throw $e;
            
            
        }
        
        
        
    }
    
    public function afficheAdresse(int $id=0){
        //$id=  htmlentities(stripslashes(trim($id)), ENT_QUOTES, "UTF-8");
        try{
            //Connéxion DB
            $conn = $this->getConnection();
            
            
            switch($id){
                case $id>0:
                    $sql="SELECT * FROM Adresse WHERE adresse_id= :adresseId";
                    $requetePrepare= $conn->prepare($sql);
                    $requetePrepare->execute([":adresseId"=>$id]);
                    break;
            
                case 0:
                    echo "ok";
                    $sql1="SELECT * FROM Adresse ORDER BY adresse_id";
                    $requetePrepare= $conn->query($sql1);
                    
                    if(DEBUG){
                        var_dump($requetePrepare);
                    }
                    
                    break;
                
            }
            //Création table (associatif: nomColonne=>valeurChamp)de résultat 
            $data=[];
            foreach($requetePrepare->fetch(PDO::FETCH_ASSOC) as $row){
                print_r($row);
                $data[]=$row;
            }
            $conn=null;
            return $data;
            
        }catch(PDOException $e){
            throw $e;
        }
    }
    
    public function updateAdresse(Adresse $data) {
        
        $conn = $this->getConnection();
        
        
        try{
            //$conn->beginTransation(); Erreur rechercher son namespace
            //Requête preparée
            $sql="UPDATE isl_POO_test.Adresse  "
                    . "SET "
                    . "rue= :rue,"
                    . "numero= :numero,"
                    . "localite= :localite,"
                    . "codePostal= :codePostal,"
                    . "pays= :pays "
                    . "WHERE adresse_id= :adresseId";
            
            
            
            
            $requetePrepare= $conn->prepare($sql);
            $requetePrepare->execute([
                ":adresseId"=>$data->getAdresseId(),
                ":rue"=>$data->getRue(),
                ":numero"=>$data->getNumero(),
                ":localite"=>$data->getLocalite(),
                ":codePostal"=>$data->getCodePostal(),
                ":pays"=>$data->getPays()
            ]);
            
            //Définir les changements par transaction comme permanente dans la DB
            //$conn->commit();
            $conn=null;
        }catch(PDOException $e){
            //Si échec, annulation des changements par transactions 
            
            //$conn->rollback();
            throw $e;
            
            
        }
    }
    public function effaceAdresse(int $id){
        try{
            $conn=  $this->getConnection();
            
            $sql="DELETE FROM isl_POO_test.Adresse WHERE adresse_id= :adresseId";
            
            $requetePrepare=$conn->prepare($sql);
            $requetePrepare->execute([":adresseId"=>$id]);
            
            $conn=null;
        }catch(PDOException $e){
            throw $e;
        }
    }
}