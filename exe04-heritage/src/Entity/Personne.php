<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace ISL\Entity;
class Personne{
    protected $nom;
    protected $prenom;
    protected $adresse;
    protected $codePostal;
    protected $pays;
    protected $societe;
    
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCodePostal() {
        return $this->codePostal;
    }

    public function getPays() {
        return $this->pays;
    }

    public function getSociete() {
        return $this->societe;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setCodePostal($codePostal) {
        $this->codePostal = $codePostal;
    }

    public function setPays($pays) {
        $this->pays = $pays;
    }

    public function setSociete($societe) {
        $this->societe = $societe;
    }
    
    public function __toString() {
        $format="%s %s \n %s \n %s %s \n %s \n %s ";
        $nom = $this->getNom();
        $prenom=  $this->getPrenom();
        $adresse= $this->getAdresse();
        $cp=  $this->getCodePostal();
        $pays = $this->getPays();
        $societe= $this->getSociete();
        echo sprintf($format, $nom, $prenom, $adresse, $cp, $pays,$societe);
        echo "<br />";
        echo $nom." ".$prenom.",<br />".$adresse."<br />".$cp."<br />".$pays."<br />".$societe;
    }


}
