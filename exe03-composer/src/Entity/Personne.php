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
    private $nom;
    private $prenom;
    private $adresse;
    private $ville;
    private $cp;
    private $pays;
    private $societe;
    
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
    public function getVille() {
        return $this->ville;
    }
    public function setVille($param) {
        $this->ville=$param;
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
        $ville=  $this->getVille();
        $cp=  $this->getCodePostal();
        $pays = $this->getPays();
        $societe= $this->getSociete();
        echo sprintf($format, $nom, $prenom, $adresse, $cp, $ville, $pays,$societe);
        echo "<br />";
        echo $nom." ".$prenom.",<br />".$adresse."<br />".$cp." ".$ville."<br />".$pays."<br />".$societe;
    }
}
