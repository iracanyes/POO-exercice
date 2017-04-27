<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ISL\Manager;

use ISL\Manager\EntityManager;
use ISL\Entity\Enseignant;

class EnseignantManager extends EntityManager{
    protected $enseignants;
    
    public function getEnseignants() {
        return $this->enseignants;
    }

    public function setEnseignants($enseignants) {
        $this->enseignants = $enseignants;
    }
    
    public static function __construct() {
        parent::__construct();
        
    }
    public function insertEnseignant(Enseignant $data){
        try{
            $conn=  $this->getConnection();
            
            if(count($data)>1){
                $sql="INSERT INTO Enseignant(personne_id,cours_donnee, date_entree_service, anciennete) VALUES";
                
                //Compteur nombre nouveau entrée
                $cpt=0;
                
                foreach ($data as $key => $value) {
                    $sql .="(:personne_id".$cpt.", :cours_donnee".$cpt.", :date_entree_service".$cpt.", :anciennete".$cpt." )";
                    
                    $insertData[":personne_id".$cpt]=$conn->lastInsertId()+$cpt;
                    $insertData[":cours_donnee".$cpt]=$value->getCoursDonnee();
                    $insertData[":date_entree_service".$cpt]=$value->getDateEntreeService();
                    $insertData[":anciennete".$cpt]=$value->getAnciennete();
                    
                    return $this->execRequete($sql,$insertData);


                            
                }
            }else{
                $sql="INSERT INTO Enseignant(personne_id, cours_donnee, date_entree_service, anciennete) VALUES(:personne_id, :cours_donnee, :date_entree_service, :anciennete)";
                
                $insertData=[
                    ":personne_id"=>$data->getPersonneId(), 
                    ":cours_donnee"=>$data->getCoursDonnee(), 
                    ":date_entree_service"=>$data->getDateEntreeService(), 
                    ":anciennete"=>$data->getAnciennete()
                ];
                
                return $this->execRequete($sql,$insertData);
            }
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function afficheEnseignant($id,$param) {
        try{
            if($id>0){
                $sql="SELECT ".$param
                        ." FROM Enseignant "
                        ."WHERE enseignant_id=:enseignant_id";
                
                $afficheData=[":enseignant_id"=>$id];
                
                return $this->resultatRequete($sql,$afficheData);
            }else{
                $sql="SELECT ".$param." "
                        ."FROM Enseignant "
                        . "ORDER BY enseignant_id";
                
                return $this->execRequete($sql);
            }
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function updateEnseignant($id,Enseignant $param) {
        try{
            $sql="UPDATE Enseignant "
                    . "SET personne_id=:personne_id,"
                    . " cours_donnee=:cours_donnee,"
                    . " date_entree_service=:date_entree_service,"
                    . " anciennete=:anciennete"
                    . " WHERE enseignant_id=:enseignant_id";
            
            $updateData=[
                ":personne_id"=>$id,
                ":cours_donnee"=>$param->getCoursDonnee(),
                ":date_entree_service"=>$param->getDateEntreeService(),
                ":anciennete"=>$param->getAnciennete(),
                ":enseignant_id"=>$param->getEnseignantId()
            ];
            
            return $this->execRequete($sql,$updateData);
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function deleteEnseignant($id) {
        
        try{
            int($id);
            $sql="DELETE FROM Enseignant WHERE enseignant_id=:enseignant_id";
            $deleteData=[":enseignant_id"=>$id];
            
            return $this->execRequete($sql,$deleteData);
            
        }catch(Exception $e){
            throw $e;
        }
    }
}