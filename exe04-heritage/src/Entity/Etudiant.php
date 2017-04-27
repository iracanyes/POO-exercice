<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\Entity;
class Etudiant extends Personne{
    private $personneId;
    private $coursSuivis;
    private $niveau;
    private $dateInscription;
    
    public function getPersonneId() {
        return $this->personneId;
    }

    public function setPersonneId($personneId) {
        $this->personneId = $personneId;
    }

        public function getCoursSuivis() {
        return $this->coursSuivis;
    }

    public function getNiveau() {
        return $this->niveau;
    }

    public function getDateInscription() {
        return $this->dateInscription;
    }

    public function setCoursSuivis(array $coursSuivis) {
        $this->coursSuivis = $coursSuivis;
    }

    public function setNiveau(string $niveau) {
        $this->niveau = $niveau;
    }

    public function setDateInscription(\DateTime $dateInscription) {
        $this->dateInscription = $dateInscription;
    }
    
    public function __toString() {
        $format="%s %s \n %s %s \n %s \n %s \n %s \n %s \n %s";
        $nom=  $this->getNom();
        $prenom=  $this->getPrenom();
        $adresse=  $this->getAdresse();
        $cp= $this->getCodePostal();
        $pays=  $this->getPays();
        $societe=  $this->getSociete();
        $coursSuivi=  $this->getCoursSuivis();
        $niveau=  $this->getNiveau();
        $dateInscription=  $this->getDateInscription();
        
        return sprintf($format, $nom, $prenom, $adresse, $cp, $pays, $societe, $coursSuivi, $niveau, $dateInscription);
    }

}
