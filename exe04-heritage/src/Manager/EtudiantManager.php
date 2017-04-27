<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ISL\Manager;

use ISL\Manager\EntityManager;
use ISL\Entity\Etudiant;

class EtudiantManager extends EntityManager{
    
    protected $etudiants;
    
    public function getEtudiants() {
        return $this->etudiants;
    }
    
    public function setEtudiants($etudiants) {
        $this->etudiants = $etudiants;
    }
    
    public function __construct() {
        parent::__construct();
        
    }
    public function insertEtudiant(Etudiant $data){
        try{
            $conn=$this->getConnection();
            if(count($data)>1){
                $sql='INSERT INTO Etudiant(etudiant_id, personne_id, cours_suivi, niveau, dateInscription) VALUES';

                $cpt=0;
                
                foreach ($data as $key => $value) {
                    $sql.="(:etudiant_id".$cpt.", :personne_id".$cpt.", :cours_suivis".$cpt.", :niveau".$cpt.", :date_inscription".$cpt.")";
                    
                    $insertData[":etudiant_id".$cpt]=$conn->lastInsertId()+$cpt;
                    $insertData[":personne_id".$cpt]=$value->getPersonneId();
                    $insertData[":cours_suivi".$cpt]=$value->getCoursSuivi();
                    $insertData[":niveau".$cpt]=$value->getNiveau();
                    $insertData[":date_inscription".$cpt]=$value->getDateInscription();
                }
                $this->execRequete($sql,$insertData);
                
                
            }else{
                $sql='INSERT INTO Etudiant(etudiant_id, personne_id, cours_suivi, niveau, dateInscription) VALUES(:etudiant_id, :personne_id, :cours_suivi, :niveau, :date_inscription)';
                
                $insertData=[
                    ":etudiant_id"=>$conn->lastInsertId(),
                    ":personne_id"=>$data->getPersonneId(),
                    ":cours_suivi"=>$data->getCoursSuivi(),
                    ":niveau"=>$data->getNiveau(),
                    ":date_inscription"=>$data->getDateInscription()
                ];
                
                $this->execRequete($insertData,$sql);
            }
            
        }catch(Exception $e){
            throw $e;
        }
    }
    
    public function afficheEtudiant($id,$param="*") {
        try{
            if($id>0){
                $sql="SELECT ".$param." FROM Etudiant WHERE etudiant_id=:etudiant_id";
                $afficheData=[":etudiant_id"=>$id];
                
                $resultat=  $this->resultatRequete($sql,$afficheData);
                
                return $resultat;
            }else{
                $sql="SELECT ".$param." FROM Etudiant ORDER BY etudiant_id";
                
                $resultat=  $this->resultatRequete($sql);
            }
            
            return $resultat;
        }catch(Exception $e){
            throw $e; 
        }
    }
    
    public function updateEtudiant($id,Etudiant $param) {
        try{
            $sql="UPDATE Etudiant SET "
                    . "personne_id=:personne_id,"
                    . "cours_suivi=:cours_suivi,"
                    . "niveau=:niveau,"
                    . "date_inscription=:date_inscription "
                    . "WHERE etudiant_id=:etudiant_id";
            
            $updateData=[
                ":personne_id"=>$param->getPersonneId(),
                ":cours_suivi"=>$param->getCoursSuivi(),
                ":niveau"=>$param->getNiveau(),
                ":date_inscription"=>$param->getDateInscription(),
                ":etudiant_id"=>$id
            ];
            
            return $this->execRequete($sql,$updateData);
            
        }catch (Exception $e){
            throw $e; 
        }
    }
    
    public function deletePersonne($id){
        try{
            $sql = "DELETE FROM Etudiant WHERE etudiant_id=:etudiant_id";
            
            $deleteData=[":etudiant_id"=>$id];
            
            return $this->execRequete($sql,$deleteData);
            
        }  catch (Exception $e){
            throw $e;
        }
    }
    
    public function sanitizeEtudiant(Etudiant $data) {
        $flags="ENT_QUOTES";
        $charSet="UTF-8";
        
        if(count($data)>1){
            $tab=[];
            foreach($data as $key=>$value){
                //Personne ID
                $personne_id=  htmlentities($value->getPersonneId(), $flags,$charSet);
                $value->setPersonneId($personne_id);
                //Etudiant ID
                $etudiant_id=  htmlentities($value->getEtudiantId(), $flags,$charSet);
                $value->setEtudiantId($etudiant_id);
                //Cours suivis
                $coursSuivi=  htmlentities($value->getCoursSuivi(), $flags,$charSet);
                $value->setCoursSuivi($coursSuivi);
                //Niveau
                $niveau=  htmlentities($value->getNiveau(), $flags,$charSet);
                $value->setNiveau($niveau);
                
                //Date Inscription 
                $dateInscription=  htmlentities($value->getDateInscription(), $flags,$charSet);
                $value->setDateInscription($dateInscription);
                
                
                $tab[$key]=$value;
            }
            return $tab;
        }else{
            //Personne ID
                $personne_id=  htmlentities($data->getPersonneId(), $flags,$charSet);
                $data->setPersonneId($personne_id);
                //Etudiant ID
                $etudiant_id=  htmlentities($data->getEtudiantId(), $flags,$charSet);
                $data->setEtudiantId($etudiant_id);
                //Cours suivis
                $coursSuivi=  htmlentities($data->getCoursSuivi(), $flags,$charSet);
                $data->setCoursSuivi($coursSuivi);
                //Niveau
                $niveau=  htmlentities($data->getNiveau(), $flags,$charSet);
                $data->setNiveau($niveau);
                
                //Date Inscription 
                $dateInscription=  htmlentities($data->getDateInscription(), $flags,$charSet);
                $data->setDateInscription($dateInscription);

            return $data;
        }
    }
}