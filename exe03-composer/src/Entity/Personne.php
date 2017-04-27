<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Personne
 *
 * @author isk
 */
namespace ISL\Entity;

class Personne {
    protected $personneId;
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $cp;
    protected $pays;
    protected $societe;
    
    public function getPersonneId() {
        return $this->personne_id;
    }

    public function setPersonneId($personne_id) {
        $this->personne_id = $personne_id;
    }

        public function getNom() {
        return $this->nom;
    }
    public function setNom($param) {
        $this->nom=$param;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    public function setPrenom($param) {
        $this->prenom=$param;
    }
    public function getAdresse() {
        return $this->adresse;
    }
    public function setAdresse($param) {
        $this->adresse=$param;
    }
    
    public function getCodePostal() {
        return $this->cp;
    }
    public function setCodePostal($param) {
        $this->cp=$param;
    }
    public function getPays() {
        return $this->pays;
    }
    public function setPays($param) {
        $this->pays=$param;
    }
    public function getSociete() {
        return $this->societe;
    }
    public function setSociete($param) {
        $this->societe=$param;
    }
    public function __toString() {
        $format="%s %s \n %s \n %s %s \n %s \n %s ";
        $nom = $this->getNom();
        $prenom=  $this->getPrenom();
        $adresse= $this->getAdresse();
        $cp=  $this->getCodePostal();
        $pays = $this->getPays();
        $societe= $this->getSociete();
        
        echo "<br />";
        echo $nom." ".$prenom.",<br />".$adresse."<br />".$cp."<br />".$pays."<br />".$societe;
        return sprintf($format, $nom, $prenom, $adresse, $cp, $pays,$societe);
    }
}
