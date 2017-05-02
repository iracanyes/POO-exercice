<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\MvcExample\Model;

class ProjetManager extends AbstractManager{
    /**
     * @var \PDO $connexiion
     */
    private $connexion;
    
    public function setConnection(\PDO $pdo) {
        $this->connexion=$pdo;
    }
    
    public function getConnection() {
        return $this->connection;
    }
    public function create(BaseProjetEntity $entity) {
        
    }
    public function update(Projet $projet) {
        
    }
    public function delete(int $id) {
        
    }
    public function retrieve(int $id) {
        
    }
    public function retrieveAll() {
        try{
            $requetePrepare=  $this->connexion->query(
                            "SELECT * FROM projet"
                            );
        
            $requete->execute();
            
            $result=$requetePrepare->fetchAll(\PDO::FETCH_ASSOC);
            
            return $result;
        }catch(Doctrine\DBAL\Driver\PDOException $e){
            throw $e;
        }
        
    }
}
