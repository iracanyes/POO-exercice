<?php

/* 
 * Contenu: Créez une classe ISL\Entity\EntityManager qui comprendra les méthodes communes
à la gestion de toutes les entités
 * Date: 28/03/2017
 */
namespace ISL\Manager;

use \PDO;

class EntityManager{
    protected $dsn="mysql:host=localhost;dbname=isl_POO_test";
    protected $user="isl_iracanyes";
    protected $password="";
    protected $connection;
    
    protected function getDsn() {
        return $this->dsn;
    }

    protected function getUser() {
        return $this->user;
    }

    protected function getPassword() {
        return $this->password;
    }

    protected function getConnection() {
        return $this->connection;
    }
    
   
    protected static function setDsn($dsn) {
        $this->dsn = $dsn;
    }

    protected static function setUser($user) {
        $this->user = $user;
    }

    protected static function setPassword($password) {
        $this->password = $password;
    }

    protected static function setConnection() {
        try{
            $conn= new PDO($this->dsn,$this->user, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->connection=$conn;
        }catch(PDOException $e){
            throw $e;
        }
    }
    
    public static function __construct() {
        
        EntityManager::setConnection();
        
    }
    
    protected function resultatRequete($sql,$param=null){
        try{
            $conn=  $this->getConnection();
            
            $conn->beginTransaction();
            
            $requetePrepare=$conn->prepare($sql);
            
            $requetePrepare->execute($param);
            
            $conn->commit();
            $data=[];
            while($ligneDB=$requetePrepare->fetchAll(PDO::FETCH_ASSOC)){
                $data[]=$ligneDB;
            }
            $conn=null;
            
            return $data;
            
        }catch(PDOException $e){
            if($conn->inTransaction()){
                $conn->rollback();
            }
            throw $e;
            
        }
    }
    
    protected function execRequete($sql, $param) {
        try{
            $conn=  $this->getConnection();
            
            $conn->beginTransaction();
            
            $requetePrepare=$conn->prepare($sql);
            
            $requetePrepare->execute($param);
            
            $conn->commit();
            
            return true;
            
        }catch(PDOException $e){
            
            if($conn->inTransaction()){
                $conn->rollback();
            }
            throw $e;
        }
    }
    
    
    


}

