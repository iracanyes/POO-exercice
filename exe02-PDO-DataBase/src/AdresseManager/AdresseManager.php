<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\POO\exe2\AdresseManager;

class AdresseManager{
    private $dsn="mysql:host=localhost;";
    private $user;
    private $password;
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
            $this->connection = new PDO($this->dsn,  $this->username,  $this->password);
        }catch(PDOException $e){
           throw $e;
        }
        
    }
    public function setAttributeException(PDO $conn){
        return $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    }

    public function insertData(array $data){
        $conn = $this->getConnection();
        try{
            $conn->beginTransation();
            //Requête preparée
            $sql="INSERT INTO adresse(adressse_id, rue, numero, localite, codePostal, pays)VALUES";
            
            
            if($data.length === 1){
                $sql .="(:adresse_id ,:rue, :numero, :localite, :codePostal, :pays)";
                $requetePrepare= $conn->prepare($sql);
                $requetePrepare->execute([
                    ":adresse_id"=>$conn->lastInsertId(),
                    ":rue"=>$data[0]["rue"],
                    ":numero"=>$data[0]["numero"],
                    ":localite"=>$data[0]["localite"],
                    ":codePostal"=>$data[0]["codePostal"],
                    ":pays"=>$data[0]["pays"]
                ]);
            }else{
                $nb_ajout=0;
                foreach($data as $adresse_id => $value){
                    $sql.="(:adresse_id".$adresse_id.", :rue".$adresse_id.", :numero".$adresse_id.", :localite".$adresse_id.", :codePostal".$adresse_id.", :pays".$adresse_id.")";
                    
                    //Table d'insertion de donnée dont les clés correspondent aux placeholders des requêtes preparées
                    $insertParametre[":adresse_id".$adresse_id] = $adresse_id;
                    $insertParametre[":rue".$adresse_id] = $value["rue"];
                    $insertParametre[":numero".$adresse_id] = $value["numero"];
                    $insertParametre[":localite".$adresse_id] = $value["localite"];
                    $insertParametre[":codePostal".$adresse_id] = $value["codePostal"];
                    $insertParametre[":pays".$adresse_id] = $value["pays"];
                    ++$nb_ajout;
                }
                
                //Insertion multiple dans la base de donnée de la commande
                $requetePrepare= $conn->prepare($sql);
                $requetePrepare->execute($insertParametre);
            }
            //Définir les changements par transaction comme permanente dans la DB
            $conn->commit();
            
        }catch(PDOException $e){
            //Si échec, annulation des changements par transactions 
            
            $conn->rollback();
            throw $e;
            
        }
        
        
        
    }
}